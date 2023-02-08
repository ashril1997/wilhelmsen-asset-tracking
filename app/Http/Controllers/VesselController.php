<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class VesselController extends Controller
{

    /**
     * @desc Get vessel details from vessel table
     * 
     * @return {Array} Returns array vessel details
     */
    public function get_vessel_detail(){

        $query_get_vessel_detail = \DB::table('vessel');
         //get account detail from db
         $query_get_vessel_detail = $query_get_vessel_detail->paginate(10);
         
         return view('manage_vessel',[     'vessels_detail'=>$query_get_vessel_detail,
                                            ]);
    }

    /**
     * @desc Store new vessel details to vessel table
     * 
     * @param Request data from manage_vessel views form
     * 
     * @return alert and redirect back
     */
    public function add_vessel(Request $request)
    {

        $query_get_vessel = Vessel::whereIn('VesselName',[$request->get("VesselName")]);
          $query_check_duplicate_PK =  $query_get_vessel->count();
          if($query_check_duplicate_PK > 0){
               Alert::error('Duplicate Data', 'Vessel name already taken!');
               return back();
           }
          else
          {
            $query_insert = DB::table('vessel')->insert([
                'VesselName'          => $request->get('VesselName'),
                'CreationDate'        => now(),
            ]);
    
            if($query_insert > 0){
                Alert::success('Adding Vessel', 'New Vessel Successfully Added!');
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
     * @desc Delete selected vessel data in vessel table
     * 
     * @param $id from manage_vessel views table list
     * 
     * @return redirect back
     */
    public function vesseldelete($id){

        Asset::where('Vessel',$id)->delete();
        Vessel::where('Vessel_Id',$id)->delete();

        return redirect('/get_vessel_detail');

    }

    /**
     * @desc Export vessel details to excel csv format file
     * 
     * @param Request data from manage_vessel views table list
     * 
     * @return redirect back
     */
    public function vesselexportCsv(Request $request)
    {
        $fileName = 'vessel_data.csv';
        $tasks = Vessel::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Vessel Id', 'Vessel Name', 'Creation Date', 'Updation Date');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Vessel_Id']  = $task->Vessel_Id;
                $row['VesselName']    = $task->VesselName;
                $row['CreationDate']    = $task->CreationDate;
                $row['UpdationDate']  = $task->UpdationDate;

                fputcsv($file, array($row['Vessel_Id'], $row['VesselName'], $row['CreationDate'], $row['UpdationDate']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
