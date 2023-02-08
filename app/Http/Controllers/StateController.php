<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class StateController extends Controller
{

    /**
     * @desc Get state details from state tableS
     * 
     * @return {Array} Returns array state details
     */
    public function get_state_detail(){
        $query_get_state_detail = \DB::table('state');
         //get account detail from db
         $query_get_state_detail = $query_get_state_detail->paginate(10);
         
         return view('manage_state',[     'states_detail'=>$query_get_state_detail,
                                            ]);
    }

    /**
     * @desc Store new state details to state table
     * 
     * @param Request data from manage_state views form
     * 
     * @return alert and redirect back
     */
    public function add_state(Request $request)
    {

        $query_get_state = State::whereIn('State',[$request->get("StateName")]);
          $query_check_duplicate_PK =  $query_get_state->count();
          if($query_check_duplicate_PK > 0){
               Alert::error('Duplicate Data', 'State name already taken!');
               return back();
           }
          else
          {
            $query_insert = DB::table('state')->insert([
                'State'              => $request->get('StateName'),
                'CreationDate'          => now(),
            ]);
    
            if($query_insert > 0){
                Alert::success('Adding State', 'New State Successfully Added!');
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
     * @desc Delete selected state data in state table
     * 
     * @param $id from manage_state views form
     * 
     * @return redirect back
     */
    public function statedelete($id){

        Asset::where('State',$id)->delete();
        State::where('State_Id',$id)->delete();
        
        // toast('Update Successfully!','success');
        return redirect('/get_state_detail');

    }

    /**
     * @desc Export state details to state csv format file
     * 
     * @param Request data from manage_state views form
     * 
     * @return redirect back
     */
    public function stateexportCsv(Request $request)
    {
        $fileName = 'state_data.csv';
        $tasks = State::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('State Id', 'State Name', 'Creation Date', 'Updation Date');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['State_Id']  = $task->State_Id;
                $row['State']    = $task->State;
                $row['CreationDate']    = $task->CreationDate;
                $row['UpdationDate']  = $task->UpdationDate;

                fputcsv($file, array($row['State_Id'], $row['State'], $row['CreationDate'], $row['UpdationDate']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
