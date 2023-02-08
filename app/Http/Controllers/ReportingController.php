<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class ReportingController extends Controller
{

    /**
     * @desc Get reporting details from reporting table
     * 
     * @return {Array} Returns array reporting details
     */
    function reportinginfo(){
        
        //get dropdown for search
        $query_vendordd =  DB::select('SELECT * FROM `vendor`;');
        $query_statedd =  DB::select('SELECT * FROM `state`;');
        $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');

        //get report detail from db
        $query_getreport = \DB::table('reportinginfo');
        $query_total_asset =  $query_getreport->count();
        $query_getreport = $query_getreport->paginate(10);
        
        

        return view('reporting',[   'selectedVendor'=>NULL,
                                    'selectedVessel'=>NULL,
                                    'selectedYear'=>NULL,
                                    'selectedMonth'=>NULL,
                                    'selectedState'=>NULL,
                                    'vendordd'=>$query_vendordd,
                                    'statedd'=>$query_statedd,
                                    'vesseldd'=>$query_vesseldd,
                                    'reporting'=>$query_getreport,
                                    'total_delivered_asset'=>$query_total_asset]);
       
    }

    /**
     * @desc Filter/Export reporting details based on vendor, vessel,state,year,month
     * 
     * @param Request data from reporting views form
     * 
     * @return redirect back
     */
    public function advanceReportSearching(Request $request)
    {

        //get others data and store in variable
        $VendorName_var = $request->VendorName;
        $VesselName_var = $request->VesselName;
        $get_year_var = $request->get_year;
        $get_month_var = $request->get_month;
        $get_state_var = $request->get_state;

        //get dropdown for search
        $query_vendordd =  DB::select('SELECT * FROM `vendor`;');
        $query_statedd =  DB::select('SELECT * FROM `state`;');
        $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');

        $query_getreport = \DB::table('reportinginfo');

        //if user click on search button
        if($request->submit == 'Search'){

            if($VendorName_var){
                $query_getreport = $query_getreport->where('VendorName', 'LIKE', "%" . $VendorName_var . "%");
            }
            if($VesselName_var){
                $query_getreport = $query_getreport->where('VesselName', 'LIKE', "%" . $VesselName_var . "%");
            }
            if($get_year_var){
                $query_getreport = $query_getreport->where('year', 'LIKE', "%" . $get_year_var . "%");
            }
            if($get_month_var){
                $query_getreport = $query_getreport->where('month', 'LIKE', "%" . $get_month_var . "%");
            }
            if($get_state_var){
                $query_getreport = $query_getreport->where('State', 'LIKE', "%" . $get_state_var . "%");
            }
    
            $query_total_asset =  $query_getreport->count();
            $query_getfilterreport = $query_getreport->paginate(10);
           
            return view('reporting',[   'selectedVendor'=>$VendorName_var,
                                        'selectedVessel'=>$VesselName_var,
                                        'selectedYear'=>$get_year_var,
                                        'selectedMonth'=>$get_month_var,
                                        'selectedState'=>$get_state_var,
                                        
                                        'vendordd'=>$query_vendordd,
                                        'statedd'=>$query_statedd,
                                        'vesseldd'=>$query_vesseldd,
                                        // 'reporting'=>$query_getreport,
                                        'reporting'=>$query_getfilterreport,
                                        'total_delivered_asset'=>$query_total_asset ]);
        }
        
        //if user click on search export button
        if($request->submit == 'Export'){

            $fileName = 'reporting_data.csv';
            $tasks = DB::select('SELECT * FROM `reportinginfo` WHERE 
                                                                VendorName LIKE "%'.$VendorName_var.'%" AND 
                                                                VesselName LIKE "%'.$VesselName_var.'%" AND
                                                                year LIKE "%'.$get_year_var.'%" AND
                                                                month LIKE "%'.$get_month_var.'%" AND
                                                                State LIKE "%'.$get_state_var.'%"'); 

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array(   'Serial Number', 'Purchase Date', 'Vendor', 'Vessel', 'Vessel Description', 'Category',
                                'State', 'Delivery Detail', 'Delivery Port', 'Delivery Date', 'Delivery ETA', 'Location',
                                'Maker', 'Model', 'Price', 'Warranty Expired Date', 'System Provider', 'Connectivity',
                                'Support Provider', 'Device Name', 'Processor', 'Operating System', 'Windows Key', 'IP Address',
                                'Subnet', 'Gateway', 'CPU Speed', 'Hard Disk', 'RAM');

            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($tasks as $task) {
                    $row['SerialNumber']            = $task->SerialNumber;
                    $row['PurchaseDate']            = $task->day.'-'.$task->month.'-'.$task->year;
                    $row['VendorName']              = $task->VendorName;
                    $row['VesselName']              = $task->VesselName;
                    $row['VesselDesc']              = $task->VesselDesc;
                    $row['Category']                = $task->Category;
                    $row['State']                   = $task->State;
                    $row['DeliveryDetail']          = $task->DeliveryDetail;
                    $row['DelPort']                 = $task->DelPort;
                    $row['DeliveryDate']            = $task->DeliveryDate;
                    $row['DelETA']                  = $task->DelETA;
                    $row['Location']                = $task->Location;
                    $row['Maker']                   = $task->Maker;
                    $row['Model']                   = $task->Model;
                    $row['Price']                   = $task->Price;
                    $row['WEDate']                  = $task->WEDate;
                    $row['SystemProvider']          = $task->SystemProvider;
                    $row['Connectivity']            = $task->Connectivity;
                    $row['SuppProv']                = $task->SuppProv;
                    $row['DeviceName']              = $task->DeviceName;
                    $row['Processor']               = $task->Processor;
                    $row['OS']                      = $task->OS;
                    $row['WinKey']                  = $task->WinKey;
                    $row['IPAdd']                   = $task->IPAdd;
                    $row['Subnet']                  = $task->Subnet;
                    $row['Gateway']                 = $task->Gateway;
                    $row['CPUSpeed']                = $task->CPUSpeed;
                    $row['HardDisk']                = $task->HardDisk;
                    $row['RAM']                     = $task->RAM;

                    fputcsv($file, array(   $row['SerialNumber'], $row['PurchaseDate'], $row['VendorName'],$row['VesselName'], $row['VesselDesc'],
                                            $row['Category'],$row['State'], $row['DeliveryDetail'], $row['DelPort'],$row['DeliveryDate'],
                                            $row['DelETA'], $row['Location'],$row['Maker'], $row['Model'], $row['Price'], $row['WEDate'], $row['SystemProvider'],
                                            $row['Connectivity'],$row['SuppProv'], $row['DeviceName'],
                                            $row['Processor'],$row['OS'], $row['WinKey'], $row['IPAdd'],$row['Subnet'],
                                            $row['Gateway'], $row['CPUSpeed'],$row['HardDisk'], $row['RAM']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }


        
        
    }

}
