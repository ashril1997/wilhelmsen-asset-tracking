<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\State;
use App\Models\Vendor;
use App\Models\Vessel;
use App\Models\Category;
use App\Models\Reporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class AssetController extends Controller
{
     /**
     * @desc get dropdown details
     * 
     * @return create asset views form
     */
     public function create(){
          //view dropdown
          $vessel_list= Vessel::all();
          $state_list= State::all();
          $vendor_list= Vendor::all();
          $category_list= Category::all();
          return view('assetx.create', compact('vessel_list', 'state_list', 'vendor_list', 'category_list'));
     }

     /**
     * @desc store new asset to assets table
     * 
     * @return alert and redirect back
     */
     function add(Request $request)
     {
          // Get data from asset table with condition
          $query_get_serial_number = Asset::whereIn('SerialNumber',[$request->get("SerialNumber")]);
          // Count data get from asset table
          $query_check_duplicate_PK =  $query_get_serial_number->count();
          // If count more than 0 (there's data using the same serial number) throw error
          if($query_check_duplicate_PK > 0){
               Alert::error('Duplicate Data', 'Serial number already taken!');
               return back();
           }
          //  Add new data
          else
          {
               $query_insert= DB::table('assets')->insert([
                    'SerialNumber'=>$request->get('SerialNumber'),
                    'PurchaseDate'=>$request->get('PurchaseDate'),
                    'VesselDesc'=>$request->get('VesselDesc'),
                    'DeviceName'=>$request->get('DeviceName'),
                    'DelPort'=>$request->get('DelPort'),
                    'DelETA'=>$request->get('DelETA'),
                    'DeliveryDetail'=>$request->get('DeliveryDetail'),
                    'WEDate'=>$request->get('WEDate'),
                    'Price'=>$request->get('Price'),
                    'Maker'=>$request->get('Maker'),
                    'Model'=>$request->get('Model'),
                    'Location'=>$request->get('Location'),
                    'SystemProvider'=>$request->get('SystemProvider'),
                    'Connectivity'=>$request->get('Connectivity'),
                    'SuppProv'=>$request->get('SuppProv'),
                    'Processor'=>$request->get('Processor'),
                    'OS'=>$request->get('OS'),
                    'WinKey'=>$request->get('WinKey'),
                    'IPAdd'=>$request->get('IPAdd'),
                    'Subnet'=>$request->get('Subnet'),
                    'Gateway'=>$request->get('Gateway'),
                    'CPUSpeed'=>$request->get('CPUSpeed'),
                    'HardDisk'=>$request->get('HardDisk'),
                    'RAM'=>$request->get('RAM'),
                    'Vessel'=>$request->get('Vessel'),
                    'State'=>$request->get('State'),
                    'Vendor'=>$request->get('Vendor'),
                    'Category'=>$request->get('Category'),
       
               ]);

               //sweetalert popup login successfull
               alert()->success('Success!','Asset Successfully Registered!');
               return redirect('/add-asset');
          }

          


     }

     /**
     * @desc Get asset details from assets table
     * 
     * @return {Array} Returns array assets details
     */
     public function get_asset_list(){

          //get report detail from db
          $query_getreport = \DB::table('reportinginfo');
          $query_total_asset =  $query_getreport->count();
          $query_getreport = $query_getreport->paginate(10);

          return view('assetx.asset_list',[       'reporting'=>$query_getreport,
                                                  'total_delivered_asset'=>$query_total_asset]);
     }

     /**
     * @desc Delete selected asset data in assets table
     * 
     * @param $id from list_asset views table list
     * 
     * @return assets edit views form
     */
     public function assetdelete($id){

          //delete asset detail in db
          DB::delete('DELETE FROM `assets` WHERE SerialNumber=?', [$id]);
          return redirect('/get_asset_list');
  
      }

     /**
     * @desc Get selected assets info
     * 
     * @param $id from list_asset views table list
     * 
     * @return redirect back
     */
     public function get_edit_info($id){
          //view dropdown
          $vessel_list= Vessel::all();
          $state_list= State::all();
          $vendor_list= Vendor::all();
          $category_list= Category::all();

          $query_get_SerialNumber       = $id;
           
          $query_get_PurchaseDate       = DB::table('assets')->where('SerialNumber', $id)->value('PurchaseDate');
          $query_get_VesselDesc         = DB::table('reportinginfo')->where('SerialNumber', $id)->value('VesselDesc');
          $query_get_DeviceName         = DB::table('reportinginfo')->where('SerialNumber', $id)->value('DeviceName');
          $query_get_DelPort            = DB::table('reportinginfo')->where('SerialNumber', $id)->value('DelPort');
          $query_get_DelETA             = DB::table('reportinginfo')->where('SerialNumber', $id)->value('DelETA');
          $query_get_DeliveryDetail     = DB::table('reportinginfo')->where('SerialNumber', $id)->value('DeliveryDetail');
          $query_get_WEDate             = DB::table('reportinginfo')->where('SerialNumber', $id)->value('WEDate');
          $query_get_Price              = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Price');
          $query_get_Maker              = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Maker');
          $query_get_Model              = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Model');
          $query_get_Location           = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Location');
          $query_get_SystemProvider     = DB::table('reportinginfo')->where('SerialNumber', $id)->value('SystemProvider');
          $query_get_Connectivity       = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Connectivity');
          $query_get_SuppProv           = DB::table('reportinginfo')->where('SerialNumber', $id)->value('SuppProv');
          $query_get_Processor          = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Processor');
          $query_get_OS                 = DB::table('reportinginfo')->where('SerialNumber', $id)->value('OS');
          $query_get_WinKey             = DB::table('reportinginfo')->where('SerialNumber', $id)->value('WinKey');
          $query_get_IPAdd              = DB::table('reportinginfo')->where('SerialNumber', $id)->value('IPAdd');
          $query_get_Subnet             = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Subnet');
          $query_get_Gateway            = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Gateway');
          $query_get_CPUSpeed           = DB::table('reportinginfo')->where('SerialNumber', $id)->value('CPUSpeed');
          $query_get_HardDisk           = DB::table('reportinginfo')->where('SerialNumber', $id)->value('HardDisk');
          $query_get_RAM                = DB::table('reportinginfo')->where('SerialNumber', $id)->value('RAM');
          $query_get_Vessel             = DB::table('reportinginfo')->where('SerialNumber', $id)->value('VesselName');
          $query_get_State              = DB::table('reportinginfo')->where('SerialNumber', $id)->value('State');
          $query_get_Vendor             = DB::table('reportinginfo')->where('SerialNumber', $id)->value('VendorName');
          $query_get_Category           = DB::table('reportinginfo')->where('SerialNumber', $id)->value('Category');

          $query_get_Vessel_Id          = DB::table('assets')->where('SerialNumber', $id)->value('Vessel');
          $query_get_State_Id           = DB::table('assets')->where('SerialNumber', $id)->value('State');
          $query_get_Category_Id        = DB::table('assets')->where('SerialNumber', $id)->value('Category');
          $query_get_Vendor_Id          = DB::table('assets')->where('SerialNumber', $id)->value('Vendor');


          return view('assetx.asset_edit',[       'SerialNumber'=>$query_get_SerialNumber,
                                                  'PurchaseDate'=>$query_get_PurchaseDate,
                                                  'VesselDesc'=>$query_get_VesselDesc,
                                                  'DeviceName'=>$query_get_DeviceName,
                                                  'DelPort'=>$query_get_DelPort,
                                                  'DelETA'=>$query_get_DelETA,
                                                  'DeliveryDetail'=>$query_get_DeliveryDetail,
                                                  'WEDate'=>$query_get_WEDate,
                                                  'Price'=>$query_get_Price,
                                                  'Maker'=>$query_get_Maker,
                                                  'Model'=>$query_get_Model,
                                                  'Location'=>$query_get_Location,
                                                  'SystemProvider'=>$query_get_SystemProvider,
                                                  'Connectivity'=>$query_get_Connectivity,
                                                  'SuppProv'=>$query_get_SuppProv,
                                                  'Processor'=>$query_get_Processor,
                                                  'OS'=>$query_get_OS,
                                                  'WinKey'=>$query_get_WinKey,
                                                  'IPAdd'=>$query_get_IPAdd,
                                                  'Subnet'=>$query_get_Subnet,
                                                  'Gateway'=>$query_get_Gateway,
                                                  'CPUSpeed'=>$query_get_CPUSpeed,
                                                  'HardDisk'=>$query_get_HardDisk,
                                                  'RAM'=>$query_get_RAM,
                                                  'Vessel'=>$query_get_Vessel,
                                                  'State'=>$query_get_State,
                                                  'Vendor'=>$query_get_Vendor,
                                                  'Category'=>$query_get_Category,

                                                  'Vessel_Id'=>$query_get_Vessel_Id,
                                                  'State_Id'=>$query_get_State_Id,
                                                  'Vendor_Id'=>$query_get_Vendor_Id,
                                                  'Category_Id'=>$query_get_Category_Id,
                                                  
                                                  'vessel_list'=>$vessel_list,
                                                  'state_list'=>$state_list,
                                                  'vendor_list'=>$vendor_list,
                                                  'category_list'=>$category_list
                                             ]);



     }

     /**
     * @desc Update asset details from assets table
     * 
     * @return alert and redirect back
     */
     public function update_asset(Request $request){

          Asset::where('SerialNumber', $request->get('SerialNumber'))
                    ->update([
                         'PurchaseDate'=>$request->get('PurchaseDate'),
                         'VesselDesc'=>$request->get('VesselDesc'),
                         'DeviceName'=>$request->get('DeviceName'),
                         'DelPort'=>$request->get('DelPort'),
                         'DelETA'=>$request->get('DelETA'),
                         'DeliveryDetail'=>$request->get('DeliveryDetail'),
                         'WEDate'=>$request->get('WEDate'),
                         'Price'=>$request->get('Price'),
                         'Maker'=>$request->get('Maker'),
                         'Model'=>$request->get('Model'),
                         'Location'=>$request->get('Location'),
                         'SystemProvider'=>$request->get('SystemProvider'),
                         'Connectivity'=>$request->get('Connectivity'),
                         'SuppProv'=>$request->get('SuppProv'),
                         'Processor'=>$request->get('Processor'),
                         'OS'=>$request->get('OS'),
                         'WinKey'=>$request->get('WinKey'),
                         'IPAdd'=>$request->get('IPAdd'),
                         'Subnet'=>$request->get('Subnet'),
                         'Gateway'=>$request->get('Gateway'),
                         'CPUSpeed'=>$request->get('CPUSpeed'),
                         'HardDisk'=>$request->get('HardDisk'),
                         'RAM'=>$request->get('RAM'),
                         'Vessel'=>$request->get('Vessel'),
                         'State'=>$request->get('State'),
                         'Vendor'=>$request->get('Vendor'),
                         'Category'=>$request->get('Category')
                    ]);

          //sweetalert popup login successfull
          alert()->success('Success!','Asset Info Updated!');
          return redirect('get_asset_list');

     }

     /**
     * @desc Get selected assets info
     * 
     * @param $id from list_asset views table list
     * 
     * @return redirect back
     */
    public function get_copy_info($id){
     //view dropdown
     $vessel_list= Vessel::all();
     $state_list= State::all();
     $vendor_list= Vendor::all();
     $category_list= Category::all();
     $reporting_info = Reporting::where('SerialNumber', $id)->first();
     $asset_info = Asset::where('SerialNumber', $id)->first();


     return view('assetx.asset_copy',[       'reporting_info'=>$reporting_info,
                                             'asset_info'=>$asset_info,
                                             
                                             'vessel_list'=>$vessel_list,
                                             'state_list'=>$state_list,
                                             'vendor_list'=>$vendor_list,
                                             'category_list'=>$category_list
                                        ]);
     }

     /**
     * @desc store new asset to assets table
     * 
     * @return alert and redirect back
     */
    function add_copy(Request $request)
    {
         // Get data from asset table with condition
         $query_get_serial_number = Asset::whereIn('SerialNumber',[$request->get("SerialNumber")]);
         // Count data get from asset table
         $query_check_duplicate_PK =  $query_get_serial_number->count();
         // If count more than 0 (there's data using the same serial number) throw error
         if($query_check_duplicate_PK > 0){
              Alert::error('Duplicate Data', 'Serial number already taken!');
              return back();
          }
         //  Add new data
         else
         {
              $query_insert= DB::table('assets')->insert([
                   'SerialNumber'=>$request->get('SerialNumber'),
                   'PurchaseDate'=>$request->get('PurchaseDate'),
                   'VesselDesc'=>$request->get('VesselDesc'),
                   'DeviceName'=>$request->get('DeviceName'),
                   'DelPort'=>$request->get('DelPort'),
                   'DelETA'=>$request->get('DelETA'),
                   'DeliveryDetail'=>$request->get('DeliveryDetail'),
                   'WEDate'=>$request->get('WEDate'),
                   'Price'=>$request->get('Price'),
                   'Maker'=>$request->get('Maker'),
                   'Model'=>$request->get('Model'),
                   'Location'=>$request->get('Location'),
                   'SystemProvider'=>$request->get('SystemProvider'),
                   'Connectivity'=>$request->get('Connectivity'),
                   'SuppProv'=>$request->get('SuppProv'),
                   'Processor'=>$request->get('Processor'),
                   'OS'=>$request->get('OS'),
                   'WinKey'=>$request->get('WinKey'),
                   'IPAdd'=>$request->get('IPAdd'),
                   'Subnet'=>$request->get('Subnet'),
                   'Gateway'=>$request->get('Gateway'),
                   'CPUSpeed'=>$request->get('CPUSpeed'),
                   'HardDisk'=>$request->get('HardDisk'),
                   'RAM'=>$request->get('RAM'),
                   'Vessel'=>$request->get('Vessel'),
                   'State'=>$request->get('State'),
                   'Vendor'=>$request->get('Vendor'),
                   'Category'=>$request->get('Category'),
      
              ]);

              //sweetalert popup login successfull
              alert()->success('Success!','Asset Successfully Registered!');
              return redirect('/get_asset_list');
         }

         


    }



     /*
    |--------------------------------------------------------------------------
    | Redeliver Asset Function
    |--------------------------------------------------------------------------
    */

    /**
     * @desc Update asset state details from delivered to pending in assets table
     * 
     * @return redirect delivered asset list views
     */
     public function redeliver_asset($serial_number){
          //sweetalert popup login successfull
          Asset::where('SerialNumber', $serial_number)
                    ->update([
                         'State'=>'1'
                    ]);
          return redirect('get_delivered_asset_list');

     }

     /**
     * @desc Get delivered assets details from assets table
     * 
     * @return {Array} Returns array delivered asset details
     */
     public function get_delivered_asset_list(){
          //get dropdown for search
          $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');
  
          //get report detail from db
          $query_getreport = Reporting::whereIn('State',['Delivered']);
          $query_total_asset =  $query_getreport->count();
          $query_getreport = $query_getreport->paginate(10);
          
          return view('delivered_asset',[    
                                             'selectedVessel'=>NULL,
                                             'selectedYear'=>NULL,
                                             'selectedMonth'=>NULL,
                                             'vesseldd'=>$query_vesseldd,
                                             'reporting'=>$query_getreport,
                                             'total_delivered_asset'=>$query_total_asset]);
     }


     /**
     * @desc Filter delivered asset details based on vessel,year,month
     * 
     * @param Request data from delivered asset views form
     * 
     * @return redirect back
     */
     public function delivered_asset_Searching(Request $request)
     {

        //get others data and store in variable
        $VesselName_var = $request->VesselName;
        $get_year_var = $request->get_year;
        $get_month_var = NULL;

          if ($request->get_month == '12'){
               $get_month_var = 'December';
          }
          elseif($request->get_month == '11'){
               $get_month_var = 'November';
          }
          elseif($request->get_month == '10'){
               $get_month_var = 'October';
          }
          elseif($request->get_month == '9'){
               $get_month_var = 'September';
          }
          elseif($request->get_month == '8'){
               $get_month_var = 'August';
          }
          elseif($request->get_month == '7'){
               $get_month_var = 'July';
          }
          elseif($request->get_month == '6'){
               $get_month_var = 'June';
          }
          elseif($request->get_month == '5'){
               $get_month_var = 'May';
          }
          elseif($request->get_monthr == '4'){
               $get_month_var = 'April';
          }
          elseif($request->get_month == '3'){
               $get_month_var = 'March';
          }
          elseif($request->get_month == '2'){
               $get_month_var = 'February';
          }
          elseif($request->get_month == '1'){
               $get_month_var = 'January';
          }


        //get dropdown for search
        $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');

        $query_getreport = Reporting::whereIn('State',['Delivered']);

          if($VesselName_var){
               $query_getreport = $query_getreport->where('VesselName', 'LIKE', "%" . $VesselName_var . "%");
          }
          if($get_year_var){
               $query_getreport = $query_getreport->where('year', 'LIKE', "%" . $get_year_var . "%");
          }
          if($request->get_month){
               $query_getreport = $query_getreport->where('month', 'LIKE', "%" . $request->get_month . "%");
          }
    
          $query_total_asset =  $query_getreport->count();
          $query_getfilterreport = $query_getreport->paginate(10);
           
          return view('delivered_asset',[ 
                                             'selectedVessel'=>$VesselName_var,
                                             'selectedYear'=>$get_year_var,
                                             'selectedMonth'=>$get_month_var,
                                             'selectedMonthValue'=>$request->get_month,

                                             
                                            
                                             'vesseldd'=>$query_vesseldd,
                                             'reporting'=>$query_getreport,
                                             'reporting'=>$query_getfilterreport,
                                             'total_delivered_asset'=>$query_total_asset ]);
     }

     /*
    |--------------------------------------------------------------------------
    | Pending Asset Function
    |--------------------------------------------------------------------------
    */

    /**
     * @desc Update asset state details from pending to delivered in assets table
     * 
     * @return redirect pending asset list views
     */
     public function deliver_asset($serial_number){
          //sweetalert popup login successfull
          Asset::where('SerialNumber', $serial_number)
                    ->update([
                         'State'=>'2'
                    ]);
          return redirect('get_pending_asset_list');

     }

     /**
     * @desc Get pending assets details from assets table
     * 
     * @return {Array} Returns array pending asset details
     */
     public function get_pending_asset_list(){
          //get dropdown for search
          $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');
  
          //get report detail from db
          $query_getreport = Reporting::whereIn('State',['Pending Delivery']);
          $query_total_asset =  $query_getreport->count();
          $query_getreport = $query_getreport->paginate(10);
          
          
  
          return view('pending_asset',[    
                                             'selectedVessel'=>NULL,
                                             'selectedYear'=>NULL,
                                             'selectedMonth'=>NULL,
                                             'vesseldd'=>$query_vesseldd,
                                             'reporting'=>$query_getreport,
                                             'total_delivered_asset'=>$query_total_asset]);
     }


     /**
     * @desc Filter pending asset details based on vessel,year,month
     * 
     * @param Request data from pending asset views form
     * 
     * @return redirect back
     */
     public function pending_asset_Searching(Request $request)
     {

        //get others data and store in variable
        $VesselName_var = $request->VesselName;
        $get_year_var = $request->get_year;
        $get_month_var = NULL;

          if ($request->get_month == '12'){
               $get_month_var = 'December';
          }
          elseif($request->get_month == '11'){
               $get_month_var = 'November';
          }
          elseif($request->get_month == '10'){
               $get_month_var = 'October';
          }
          elseif($request->get_month == '9'){
               $get_month_var = 'September';
          }
          elseif($request->get_month == '8'){
               $get_month_var = 'August';
          }
          elseif($request->get_month == '7'){
               $get_month_var = 'July';
          }
          elseif($request->get_month == '6'){
               $get_month_var = 'June';
          }
          elseif($request->get_month == '5'){
               $get_month_var = 'May';
          }
          elseif($request->get_monthr == '4'){
               $get_month_var = 'April';
          }
          elseif($request->get_month == '3'){
               $get_month_var = 'March';
          }
          elseif($request->get_month == '2'){
               $get_month_var = 'February';
          }
          elseif($request->get_month == '1'){
               $get_month_var = 'January';
          }


        //get dropdown for search
        $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');

        $query_getreport = Reporting::whereIn('State',['Pending Delivery']);

          if($VesselName_var){
               $query_getreport = $query_getreport->where('VesselName', 'LIKE', "%" . $VesselName_var . "%");
          }
          if($get_year_var){
               $query_getreport = $query_getreport->where('year', 'LIKE', "%" . $get_year_var . "%");
          }
          if($request->get_month){
               $query_getreport = $query_getreport->where('month', 'LIKE', "%" . $request->get_month . "%");
          }
    
          $query_total_asset =  $query_getreport->count();
          $query_getfilterreport = $query_getreport->paginate(10);
           
          return view('pending_asset',[ 
                                             'selectedVessel'=>$VesselName_var,
                                             'selectedYear'=>$get_year_var,
                                             'selectedMonth'=>$get_month_var,
                                             'selectedMonthValue'=>$request->get_month,

                                             
                                            
                                             'vesseldd'=>$query_vesseldd,
                                             'reporting'=>$query_getreport,
                                             'reporting'=>$query_getfilterreport,
                                             'total_delivered_asset'=>$query_total_asset ]);
     }

     /*
     |--------------------------------------------------------------------------
     | Overdue Asset Function
     |--------------------------------------------------------------------------
     */  

     /**
     * @desc Get overdue assets details from assets table
     * 
     * @return {Array} Returns array overdue asset details
     */
     public function overdate(){

          $query_getreport = \DB::table('reportinginfo');

          $query_overdate = $query_getreport->where('DelETA', '<', Carbon::now())->where('State','Pending Delivery');
          $query_total_asset =  $query_overdate->count();
          $query_overdate_data = $query_overdate->paginate(10);
          return View::make('overdate',['reporting'=>$query_overdate_data, 'total_delivered_asset'=>$query_total_asset]);
     }
}
