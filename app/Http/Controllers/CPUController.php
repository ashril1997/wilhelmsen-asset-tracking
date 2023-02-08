<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Asset;
use App\Models\Vessel;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ExpiredCPUInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class CPUController extends Controller
{

    /**
     * @desc Get DE81 detail for win 10/11 OS from assets table
     * 
     * @return {Array} Returns array of DE81 details
     */
    public function get_win1011_detail(){
       
        $query_getreport = \DB::table('assets');

        $query_win1011_pc = $query_getreport->where('OS', '=', "Windows 10")->orWhere('OS', '=', "Windows 11");

        $query_win1011_data = $query_win1011_pc->paginate(14);
         
        return view('Win1011_CPU_List',['windows_detail'=>$query_win1011_data]);
    }

    /**
     * @desc Get DE81 detail for win 7 OS from assets table
     * 
     * @return {Array} Returns array of DE81 details
     */
    public function get_win7_detail(){
     
        $query_getreport = \DB::table('assets');

        $query_win7_pc = $query_getreport->where('OS', '=', "Windows 7");

        $query_win7_data = $query_win7_pc->paginate(14);
         
        return view('Win7_CPU_List',['windows_detail'=>$query_win7_data]);
    }

    /**
     * @desc Get DE81 detail for win XP OS from assets table
     * 
     * @return {Array} Returns array of DE81 details
     */
    public function get_winXP_detail(){

        $query_getreport = \DB::table('assets');

        $query_winXP_pc = $query_getreport->where('OS', '=', "Windows xp");

        $query_winXP_data = $query_winXP_pc->paginate(14);
         
        return view('WinXP_CPU_List',['windows_detail'=>$query_winXP_data]);
    }

    /**
     * @desc Get DE81 detail for expired CPU from assets table
     * 
     * @return {Array} Returns array of DE81 details
     */
    public function get_oldCPU_detail(){

        $query_expired_pc = \DB::table('expiredcpuinfo');
        
        $query_expired_pc_data = $query_expired_pc->paginate(14);
         
        return view('Old_CPU_List',['windows_detail'=>$query_expired_pc_data]);

    }

    /**
     * @desc Get all DE81 detail from assets table
     * 
     * @return {Array} Returns array of DE81 details
     */
    public function get_de81_detail(){

        $query_DE81_pc = Asset::where('Category', 1);
        $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');

        $query_DE81_data = $query_DE81_pc->paginate(8);
         
        return view('DE81_CPU_List',['windows_detail'=>$query_DE81_data,'vesseldd'=>$query_vesseldd, 'selectedVessel'=>NULL,]);
    }

    // Function to export Info to csv
    // public function de81exportCsv(Request $request)
    // {
    //     $fileName = 'DE81_data.csv';
    //     $tasks = Asset::where('Category', 1)->get();
        
    //     $headers = array(
    //         "Content-type"        => "text/csv",
    //         "Content-Disposition" => "attachment; filename=$fileName",
    //         "Pragma"              => "no-cache",
    //         "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
    //         "Expires"             => "0"
    //     );

    //     $columns = array('Device Name', 'Description', 'Maker', 'Model','Location', 'Connectivity', 'SystemProvider', 'DelETA','OS', 'IPAdd', 'Subnet', 'Gateway', 'RAM');

    //     $callback = function() use($tasks, $columns) {
    //         $file = fopen('php://output', 'w');
    //         fputcsv($file, $columns);

    //         foreach ($tasks as $task) {
    //             $row['DeviceName']  = $task->DeviceName;
    //             $row['VesselDesc']    = $task->Processor;
    //             $row['Maker']    = $task->OS;
    //             $row['Model']  = $task->WinKey;
    //             $row['Location']  = $task->IPAdd;
    //             $row['Connectivity']    = $task->Subnet;
    //             $row['SystemProvider']    = $task->Gateway;
    //             $row['DelETA']  = $task->CPUSpeed;
    //             $row['OS']  = $task->HardDisk;
    //             $row['IPAdd']    = $task->RAM;
    //             $row['Subnet']  = $task->CPUSpeed;
    //             $row['Gateway']  = $task->HardDisk;
    //             $row['RAM']    = $task->RAM;

    //             fputcsv($file, array($row['DeviceName'],$row['VesselDesc'],$row['Maker'],$row['Model'],$row['Location'],$row['Connectivity'],$row['SystemProvider'],$row['DelETA'],$row['OS'],$row['IPAdd'],$row['Subnet'],$row['Gateway'],$row['RAM']));
    //         }

    //         fclose($file);
    //     };

    //     return response()->stream($callback, 200, $headers);
    // }


    /**
     * @desc Filter/Export reporting details based on vendor, vessel,state,year,month
     * 
     * @param Request data from reporting views form
     * 
     * @return redirect back
     */
    public function de81exportCsv(Request $request)
    {
        //get dropdown for search
        $query_vesseldd =  DB::select('SELECT * FROM `vessel`;');

        // Get vessel
        $VesselName_var = $request->VesselName;

        // get Vessel id
        $vessel_id = Vessel::where('VesselName', $VesselName_var)->value('Vessel_Id');


        $query_getreport = \DB::table('assets')->where('Category', 1);


        //if user click on search button
        if($request->submit == 'Search'){

            $query_getfilterreport = $query_getreport->where('Vessel', 'LIKE', "%" . $vessel_id . "%")->paginate(8);
                // $query_DE81_pc = Asset::where('Category', 1)
                //                 ->where('Vessel', 'LIKE',"%" . $vessel_id . "%")->get();
           
            return view('DE81_CPU_List',[   'selectedVessel'=>$VesselName_var,
                                            'vesseldd'=>$query_vesseldd,
                                            'windows_detail'=>$query_getfilterreport ]);
        }
        
        //if user click on search export button
        if($request->submit == 'Export'){

            $fileName = 'DE81_data.csv';
            $tasks = $query_getreport->where('Vessel', 'LIKE', "%" . $vessel_id . "%")->get();
        
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Device Name', 'Description', 'Maker', 'Model', 'Location', 'Connectivity', 'System Provider', 'Delivery ETA', 'Processor', 'Operating System', 'Windows Key','IP Address', 'Subnet', 'Gateway', 'CPU Speed','Hard Disk Size', 'RAM');

            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($tasks as $task) {
                    $row['DeviceName']  = $task->DeviceName;
                    $row['VesselDesc']    = $task->VesselDesc;
                    $row['Maker']    = $task->Maker;
                    $row['Model']    = $task->Model;
                    $row['Location']    = $task->Location;
                    $row['Connectivity']    = $task->Connectivity;
                    $row['SystemProvider']    = $task->SystemProvider;
                    $row['DelETA']    = $task->DelETA;
                    $row['Processor']    = $task->Processor;
                    $row['OS']    = $task->OS;
                    $row['WinKey']  = $task->WinKey;
                    $row['IPAdd']  = $task->IPAdd;
                    $row['Subnet']    = $task->Subnet;
                    $row['Gateway']    = $task->Gateway;
                    $row['CPUSpeed']  = $task->CPUSpeed;
                    $row['HardDisk']  = $task->HardDisk;
                    $row['RAM']    = $task->RAM;
  

                    fputcsv($file, array($row['DeviceName'], $row['VesselDesc'], $row['Maker'], $row['Model'], $row['Location'], $row['Connectivity'], $row['SystemProvider'], $row['DelETA'], $row['Processor'],$row['OS'],$row['WinKey'],$row['IPAdd'],$row['Subnet'],$row['Gateway'],$row['CPUSpeed'],$row['HardDisk'],$row['RAM']));
                }

            fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }


        
        
    }


}
