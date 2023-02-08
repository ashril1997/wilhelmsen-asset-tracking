<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{

    /**
     * @desc Get category detail from category table
     * 
     * @return {Array} Returns array of category details
     */
    public function get_category_detail(){

        $query_get_category_detail = \DB::table('category');
         //get account detail from db
         $query_get_category_detail = $query_get_category_detail->paginate(10);
         
         return view('manage_category',[     'categorys_detail'=>$query_get_category_detail,
                                            ]);
    }

    /**
     * @desc Store new category details to Category table
     * 
     * @param Request data from manage_category views form
     * 
     * @return alert and redirect back
     */
    public function add_category(Request $request)
    {
        
        $query_get_category = Category::whereIn('Category',[$request->get("CategoryName")]);
          $query_check_duplicate_PK =  $query_get_category->count();
          if($query_check_duplicate_PK > 0){
               Alert::error('Duplicate Data', 'Category name already taken!');
               return back();
           }
          else
          {
            $query_insert = DB::table('category')->insert([
                'Category'              => $request->get('CategoryName'),
                'CreationDate'          => now(),
            ]);
    
            if($query_insert > 0){
                Alert::success('Adding Category', 'New Category Successfully Added!');
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
     * @desc Delete selected category data in Category table
     * 
     * @param $id from manage_category views form
     * 
     * @return redirect back
     */
    public function categorydelete($id){

        Asset::where('Category',$id)->delete();
        Category::where('Category_Id',$id)->delete();
        
        // toast('Update Successfully!','success');
        return redirect('/get_category_detail');

    }

    /**
     * @desc Export category details to excel csv format file
     * 
     * @param Request data from manage_category views form
     * 
     * @return redirect back
     */
    public function categoryexportCsv(Request $request)
    {
        $fileName = 'category_data.csv';
        $tasks = Category::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Category Id', 'Category Name', 'Creation Date', 'Updation Date');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Category_Id']  = $task->Category_Id;
                $row['Category']    = $task->Category;
                $row['CreationDate']    = $task->CreationDate;
                $row['UpdationDate']  = $task->UpdationDate;

                fputcsv($file, array($row['Category_Id'], $row['Category'], $row['CreationDate'], $row['UpdationDate']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
