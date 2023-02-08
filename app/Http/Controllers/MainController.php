<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Vessel;
use App\Models\Reporting;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    /**
     * @desc return user to login/register page
     * 
     * @return user to login/register page
     */
    function index()
    {
        return view('login_register_page');
    }

    /**
     * @desc validate login info
     * 
     * @return alert (success/fail) and redirect to homepage
     */
    function checklogin(Request $request)
    {
        // validate if email and password have been inserted and follow the right syntax
        $this->validate($request,[
            'email'             => 'required|email',
            'password'          => 'required|string|min:3'
        ]);

        $user_data = array(
            'email'         => $request->get('email'),
            'password'      => $request->get('password')
        );

        // Validate user login data
        if(Auth::attempt($user_data)){
            // if user type is admin
            if(Auth::user()->position == 'admin'){
                alert()->success('Welcome Back!','Login Successfully!');
                return redirect('main/successlogin');
            }
            // if user type is staff
            elseif(Auth::user()->position == 'staff'){
                alert()->success('Welcome Back!','Login Successfully!');
                return redirect('main/staffsuccesslogin');
            }
            
        }
        // Validate fails
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    /**
     * @desc fetch required data for the dashboard and redirect admin to homepage
     * 
     * @return dashboard info to dashboard views
     */
    function successlogin()
    {
        $query_pendingdelivery = DB::select('SELECT COUNT(SerialNumber) AS TotalPending FROM reportinginfo WHERE State = "Pending Delivery"');

        //get total number of checkout from asset table
        $query_checkout = DB::select('SELECT COUNT(SerialNumber) AS TotalCheckout FROM reportinginfo WHERE State = "Delivered"');

       //get total number of over date parcel
       $query_over_date = DB::select('SELECT COUNT(SerialNumber) AS TotalOverDate FROM assets WHERE State="1" AND DelETA < now();');

        //get total number of checkout from vessel table
        $query_totalvessel = DB::select('SELECT COUNT(Vessel_Id) AS TotalVessel FROM vessel');

        //get total number of expired pc from table
        $query_expired_pc = DB::select('SELECT COUNT(Category) AS TotalExpiredPC FROM reportinginfo WHERE EXTRACT(YEAR FROM CURRENT_DATE) - reportinginfo.year > 5 ');

        //get total number of pc with wins 10/11
        $query_win1011_pc =  DB::select('SELECT COUNT(OS) AS Win1011OS FROM assets WHERE OS="Windows 10" OR OS="Windows 11"');

        //get total number of pc with wins 7
        $query_win7_pc = DB::select('SELECT COUNT(OS) AS Win7OS FROM assets WHERE OS="Windows 7"');

        //get total number of pc with wins xp
        $query_winXP_pc = DB::select('SELECT COUNT(OS) AS WinXPOS FROM assets WHERE OS="Windows XP"');

        //get notification(asset that in pending delivery which the ETA is less than 10 days)
        $query_notification = DB::select('SELECT * FROM assets INNER JOIN vessel ON assets.Vessel=vessel.Vessel_Id WHERE TIMESTAMPDIFF(day, now(), DelETA) <=10 AND DelETA >= now();');
        
        
        return View::make('dashboard',[     'pending'=>$query_pendingdelivery,
                                            'checkout'=>$query_checkout,
                                            'over_date'=>$query_over_date,
                                            'totalvessel'=>$query_totalvessel,
                                            'total_expiredPC'=>$query_expired_pc,
                                            'win1011'=>$query_win1011_pc,
                                            'win7'=>$query_win7_pc,
                                            'winXP'=>$query_winXP_pc,
                                            'notification'=>$query_notification]);
       
    }

    /**
     * @desc fetch required data for the dashboard and redirect staff to homepage
     * 
     * @return dashboard info to staff_homepage views
     */ 
    function staffsuccesslogin()
    {
        $query_pendingdelivery = DB::select('SELECT COUNT(SerialNumber) AS TotalPending FROM reportinginfo WHERE State = "Pending Delivery"');

        //get total number of checkout from asset table
        $query_checkout = DB::select('SELECT COUNT(SerialNumber) AS TotalCheckout FROM reportinginfo WHERE State = "Delivered"');

       //get total number of over date parcel
       $query_over_date = DB::select('SELECT COUNT(SerialNumber) AS TotalOverDate FROM assets WHERE State="1" AND DelETA < now();');

        //get total number of checkout from vessel table
        $query_totalvessel = DB::select('SELECT COUNT(Vessel_Id) AS TotalVessel FROM vessel');

        //get total number of expired pc from table
        $query_expired_pc = DB::select('SELECT COUNT(Category) AS TotalExpiredPC FROM reportinginfo WHERE EXTRACT(YEAR FROM CURRENT_DATE) - reportinginfo.year > 5 ');

        //get total number of pc with wins 10/11
        $query_win1011_pc =  DB::select('SELECT COUNT(OS) AS Win1011OS FROM assets WHERE OS="Windows 10" OR OS="Windows 11"');

        //get total number of pc with wins 7
        $query_win7_pc = DB::select('SELECT COUNT(OS) AS Win7OS FROM assets WHERE OS="Windows 7"');

        //get total number of pc with wins xp
        $query_winXP_pc = DB::select('SELECT COUNT(OS) AS WinXPOS FROM assets WHERE OS="Windows XP"');

        
        
        return View::make('staff_homepage',[     'pending'=>$query_pendingdelivery,
                                            'checkout'=>$query_checkout,
                                            'over_date'=>$query_over_date,
                                            'totalvessel'=>$query_totalvessel,
                                            'total_expiredPC'=>$query_expired_pc,
                                            'win1011'=>$query_win1011_pc,
                                            'win7'=>$query_win7_pc,
                                            'winXP'=>$query_winXP_pc,
                                            ]);
    }

    /**
     * @desc Sign out function
     * 
     * @return user to login/register page
     */
    function logout()
    {
        Auth::logout();
        return redirect('main');
    }

    /**
     * @desc store new user details in users table
     * 
     * @return redirect back with alert(success/fail)
     */
    function registeruser(Request $request){
        
        $validate_email = $this->validate($request, [
            'email'             =>'required|unique:users,email',
        ]);

        $query_insert = DB::table('users')->insert([
            'name'              => $request->get('name'),
            'email'             => $request->get('email'),
            'password'          => Hash::make($request->get('password')),
            'position'          => 'staff',
            'remember_token'    => Str::random(10),
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    
        if($query_insert > 0){
            return redirect()->back()->with('success', 'Register Succeed! Please login.'); 
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
        
        
    }

    /**
     * @desc update user password in users table
     * 
     * @return redirect main/back with alert(success/fail)
     */
    function updatepassword(Request $request){
       
        $password   =  Hash::make($request->get('password'));
        $name       =  $request->get('name');
        $email      =  $request->get('email');
        

        $query_update = DB::update('update users set password=?, updated_at=now() where name=? and email=?',[$password,$name,$email]);
    
        if($query_update > 0){
            return redirect('main')->with('success', 'Password has been reset! Please login.');;
        }
        else
        {
            return back()->with('error', 'Wrong Name or Email Details');
        }

            
        
        
    }

    

    /*
    |--------------------------------------------------------------------------
    | Manage Account Function
    |--------------------------------------------------------------------------
    */

    /**
     * @desc Get account details from users table
     * 
     * @return {Array} Returns array account details
     */
    public function get_account_detail(){

        $query_get_account_detail = \DB::table('users');
         //get account detail from db
         $query_get_account_detail = $query_get_account_detail->paginate(14);
         
         return view('manage_account',[     'users_detail'=>$query_get_account_detail,
                                            ]);
    }

    /**
     * @desc Update users position to admin from users table
     * 
     * @return redirect back
     */
    public function makesystemadmin($email){

        //update account detail in db
        DB::update('UPDATE users SET position="admin" WHERE email=?', [$email]);
        return redirect('/main/get_account_detail');

    }

    /**
     * @desc Delete selected account data in users table
     * 
     * @param $email from manage_account views table list
     * 
     * @return redirect back
     */
    public function systemadmindelete($email){

        //delete account detail in db
        DB::delete('DELETE FROM `users` WHERE email=?', [$email]);
        return redirect('/main/get_account_detail');
    }
}