<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = "Phone";

    protected $fillable = [ 'id','code','phone','user_id'];

    public $timestamps  = false ;

    ///////////////////begin relations///////////////


       public function user(){
       return $this ->belongsTo('App\Models\User','user_id');
    }

    ///////////////////end relations/////////////////

}
