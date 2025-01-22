<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = "Offers";

    protected $fillable = [ 'id','name_en','name_ar', 'price','details_en','details_ar',  'created_at','updated_at'];

    protected $hidden = ['created_at','updated_at'];

   // public $timestamps  = true ;
}
