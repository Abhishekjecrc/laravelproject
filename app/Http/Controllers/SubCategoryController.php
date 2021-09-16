<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\subcategory;

class SubCategoryController extends Controller
{
        public function data()
        {
                $category = DB::table('catrgory')->where('status','=','Active')->get();
                return view('subcategory', compact("category"));

                
                
        }
        public function tableData()
        {
                $cat = DB::table('subcategory')->join('catrgory', 'catrgory.id', "=", 'subcategory.category_id')->select('subcategory.*', 'catrgory.categoryname')->get();
                return view('subcategorytable', compact("cat"));
        }

        public function addSubCategory(Request $req)
        {


                $categoryid =  $req['fetch_category'];
                $subcategoryName =  $req['category-name'];


                $file =  $req->file('image');
                $subcategory = new subcategory;
                $subcategory->sub_category_name = $subcategoryName;
                $subcategory->category_id = $categoryid;
                $subcategory->save();
                $id= $subcategory->id;
              
                $path= "subcategory/image/".$id."/demo.".$file->getClientOriginalExtension();
                DB::update('update subcategory set image = ? where id = ?',[$path,$id]);
                $req->file('image')->storeAs("subcategory/image/".$id,"demo.".$file->getClientOriginalExtension());
        }

        public function DeleteCategory(Request $request)
        {
                echo "<pre>";
                print_r($_POST);
        }

        public function ajaxstatus(Request $req){


                $status = explode("_", $req->name);
                if ($status[0] == 'Active') {
                        $stat = "Inactive";
                } else {
                        $stat = "Active";
                }
                $up =  DB::update('update subcategory set status = ? where id = ?', [$stat, $status[1]]);
                $message = "Updated";
                return  $message;

        } 
}
