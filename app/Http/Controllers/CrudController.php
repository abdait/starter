<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function get_offers (){

        $offer = Offer::select('id','name')-> get();
        return ($offer) ;

    }


    public function getmessages (){

        return  $messages=[
            'name.required' => "le nom est obligatoire",
            'name.unique:offers,name' => "le nom est unique",
            'name.max:100' => "le nom est max 100",
            'price.required' => "le prix est obligatoire",
            'price.numeric' => "le prix est numerique",
            'details.required' => "le detaille est obligatoire",
         ];
    }

    public function getrules (){

        return   $rules =[
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details'=> 'required',
        ];
    }


   /* public function store (){

        Offer::create(['name'=>'ait','price'=>'2000','details'=>'test' ]);

    }*/

    public function create (){

        return view('offers.create');

    }
    public function store (Request $offers){



        $messages = $this->getmessages();
        $rules = $this ->getrules();
        $validator = Validator::make($offers->all(), $rules,$messages);

        if ($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput($offers->all());
        }

        Offer::create(['name'=>$offers->name,'price'=>$offers->price,'details'=>$offers->details ]);


        return redirect()->back()->with(['Success'=>'the offers add successfuly']);

    }






}
