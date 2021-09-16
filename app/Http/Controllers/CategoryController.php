<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\catrgory;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
        public function data()
        {
                $cat = DB::table('catrgory')->get();
                return view('category', compact("cat"));
        }
        public function ajaxRequest()
        {
                $cat = DB::table('catrgory')->where('status', '!=', 'Deleted')->get();
                return view('table', compact("cat"));
        }
        public function ajaxRequestStatus(Request $request2)
        {
                $status = explode("_", $request2->name);
                if ($status[0] == 'Active') {
                        $stat = "Inactive";
                } else {
                        $stat = "Active";
                }
                $up =  DB::update('update catrgory set status = ? where id = ?', [$stat, $status[1]]);
                $message = "Updated";
                return  $message;
        }
        public function ajaxEdit(Request $req)
        {
                echo "<pre>";
                print_r($_POST);
                echo "<pre>";
                print_r($_FILES);
                die;
        }

        public function ajaxInsert(Request $req)
        {
                $categoryName =  $req['category-name'];
                $file =  $req->file('image');
                $catrgory = new catrgory;
                $catrgory->categoryname = $categoryName;
                $catrgory->save();
                $id = $catrgory->id;
                $filename = $file->getClientOriginalName();
                $path = "public/image/" . $id . "/demo." . $file->getClientOriginalExtension();
                DB::update('update catrgory set image = ? where id = ?', [$path, $id]);
                $req->file('image')->storeAs("public/image/" . $id, "demo." . $file->getClientOriginalExtension());
        }


        public function ajaxdelete(Request $getdata)
        {
                $getdata->validate(['remark' => 'required']);
                $remak = $getdata->remark;
                $id = $getdata->id;
                $subcategory = DB::table('subcategory')->where('category_id', '=', $id)->get();
                if ($subcategory->count() > 0) {
                        $response = new Response();
                        return $response->setStatusCode(500, 'Please Delete Before Subcategory!');
                } else {

                        $up =  DB::update('update catrgory set status = ?,remark=? where id = ?', ['Deleted', $remak, $id]);
                        $message = "Deleted";
                        return $message;
                }
        }
}

