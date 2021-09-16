<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catrgory extends Model
{
    use HasFactory;
    protected $table = 'catrgory';
    protected $fillable = ['categoryname'];   


}
