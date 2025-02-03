<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = "doctors";

    protected $fillable = [ 'id','name','title','hospital_id'];

    public $timestamps  = false ;

    public function hospital(){
        return $this ->belongsTo('App\Models\hospital','hospital_id','id');
     }

     public function service(){
        return $this ->belongsToMany('App\Models\Service','doctor_service','doctor_id','service_id','id','id');
     }
}
