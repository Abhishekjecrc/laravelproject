<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productdetail extends Model
{
    use HasFactory;
    public $table = 'product_information';
    protected $fillable = ['product_name','brand','model','category_id','gender','size_id','color','sku','relase_price_usd','relase_price_inr','relase_date','describtion'];  
}
