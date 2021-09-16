<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\productdetails;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});



Route::get('/header', function () {
    return view('header');
});


Route::get('/admin', function () {
    return view('admin');
});

//Auth::routes();
Route::get('/category', [CategoryController::class, 'data']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('ajaxRequest', [CategoryController::class, 'ajaxRequest']);
Route::get('/status', [CategoryController::class, 'ajaxRequestStatus']);
Route::POST('/edit',[CategoryController::class,'ajaxEdit']);
Route::POST('/edit2',[CategoryController::class,'ajaxDelete']);
Route::POST('/insert',[CategoryController::class,'ajaxInsert']);




Route::get('/subcategory', [SubCategoryController::class, 'data']);
Route::get('tableData', [SubCategoryController::class, 'tableData']);
Route ::post('/deleteSubcategory',[SubCategoryController::class,'DeleteCategory']);
Route ::POST('/insertsubcategory',[SubCategoryController :: class,'addSubCategory']);
Route ::GET('/subcategorystatus',[SubCategoryController :: class,'ajaxstatus']);




Route :: get('/form', function(){
     return view('form');
});


Route :: get('/adddetails', [productdetails :: class,'getdetails']);
Route ::POST('/adddata',[productdetails::class,'formsubmit']);

Route :: get('/product' ,function(){
      return view('product');
});