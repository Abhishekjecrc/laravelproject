<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\productimage;
use App\Models\productdetail;


class productdetails extends Controller
{
    
    public function formsubmit(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'category'=>'required',
            'gender'=>'required',
            'size_group'=>'required',
            'color'=>'required',
            'description'=>'required',   
            'files.*'=> 'required',
            'files.*.mimes' => 'Only jpeg,png and jpg images are allowed'

        ]);



        $productdetail = new productdetail;
        $productdetail->product_name = $request->name;
        $productdetail->brand = $request->brand;
        $productdetail->model = $request->model;
        $productdetail->category_id = $request->category;
        $productdetail->gender = $request->gender;
        $productdetail->size_id = $request->size_group;
        $productdetail->color = $request->color;
        $productdetail->sku = $request->sku;
        $productdetail->relase_price_usd = $request->relase_price_usd;
        $productdetail->relase_price_inr = $request->relase_price_inr;
        $productdetail->relase_date = $request->relase_date;
        $productdetail->describtion = $request->description;
        $productdetail->save();

        if (!empty($request->file('files'))) {
            $i = 1;
            foreach ($request->file('files') as $fileupload) {
                $extension = $fileupload->getClientOriginalExtension();
                $fileNameExt = time() . '_' . $i;
                $fileName = $fileNameExt . '.' . $extension;
                $destinationPath = public_path('/uploads/product_media/' . $productdetail->id);
                $fileupload->move($destinationPath, $fileName);
                $media = '/uploads/product_media/' . $productdetail->id . '/' . $fileName;
                $productimage = new productimage();
                $productimage->product_id = $productdetail->id;
                $productimage->url = $media;
                $productimage->save();
                $i++;
            }
        }
        return $request->input();
    }

    public function getdetails()
    {
        $category = DB::table('catrgory')->where('status', '=', 'Active')->get();
        $size = DB::table('size')->where('status', '=', 'Active')->get();
        return view('adddetails', compact('category', 'size'));
    }
}
