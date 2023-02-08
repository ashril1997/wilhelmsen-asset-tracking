<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class VendorController extends Controller
{

    /**
     * @desc Get vendor details from vendor table
     * 
     * @return {Array} Returns array vendor details
     */
    public function get_vendor_detail(){

        $query_get_vendor_detail = \DB::table('vendor');
         //get account detail from db
         $query_get_vendor_detail = $query_get_vendor_detail->paginate(10);
         
         return view('manage_vendor',[     'vendors_detail'=>$query_get_vendor_detail,
                                            ]);
    }

    /**
     * @desc Store new vendor details to vendor table
     * 
     * @param Request data from manage_vendor views form
     * 
     * @return alert and redirect back
     */
    public function add_vendor(Request $request)
    {

        $query_get_vendor = Vendor::whereIn('VendorName',[$request->get("VendorName")]);
          $query_check_duplicate_PK =  $query_get_vendor->count();
          if($query_check_duplicate_PK > 0){
               Alert::error('Duplicate Data', 'Vendor name already taken!');
               return back();
           }
          else
          {
            $query_insert = DB::table('vendor')->insert([
                'VendorName'          => $request->get('VendorName'),
                'CreationDate'        => now(),
            ]);
    
            if($query_insert > 0){
                Alert::success('Adding Vendor', 'New Vendor Successfully Added!');
                return redirect()->back(); 
            }
            else
            {
                Alert::error('Actions Error', 'Sorry There\' A problem Inserting This Data');
                return back();
            }
    
          }


        
    }

    /**
     * @desc Delete selected vendor data in vendor table
     * 
     * @param $id from manage_vendor views form
     * 
     * @return redirect back
     */
    public function vendordelete($id){

        Asset::where('Vendor',$id)->delete();
        Vendor::where('Vendor_Id',$id)->delete();
        
        // toast('Update Successfully!','success');
        return redirect('/get_vendor_detail');

    }

    /**
     * @desc Export vendor details to vendor csv format file
     * 
     * @param Request data from manage_vendor views form
     * 
     * @return redirect back
     */
    public function vendorexportCsv(Request $request)
    {
        $fileName = 'vendor_data.csv';
        $tasks = Vendor::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Vendor Id', 'Vendor Name', 'Creation Date', 'Updation Date');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Vendor_Id']  = $task->Vendor_Id;
                $row['VendorName']    = $task->VendorName;
                $row['CreationDate']    = $task->CreationDate;
                $row['UpdationDate']  = $task->UpdationDate;

                fputcsv($file, array($row['Vendor_Id'], $row['VendorName'], $row['CreationDate'], $row['UpdationDate']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
