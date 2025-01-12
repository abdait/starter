<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstController extends Controller
{
  
    public function index ()
    {
        $data = [];
        $data['name']= 'abdait';
        $data['age']= 39;
    // return view('front.index')->with(['name'=>'abdait','age'=>39 ]);
     //return view('front.index',$data);

     $obj = new  \stdClass();
     $obj->name= 'abdait';
     $obj->age= 39;

     return view('front.index',compact('obj') );
    }
}
