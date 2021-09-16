<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\productdetail;


class productlistController extends Controller
{
    
    public function productlist()
    {
        $prodectlist =   productdetail::all();
        
          return view('product',['prodectlist'=>$prodectlist]);
    }
}
