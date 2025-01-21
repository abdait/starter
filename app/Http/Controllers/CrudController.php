<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    public function index (){

        $offer = Offer::select('id','name_'.LaravelLocalization::getCurrentLocale() .' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details' )-> get();
        return view ('offers.index')->with('offers', $offer) ;

    }


    /*  public function getmessages (){

        return  $messages=[
            'name.required' => __('messages.name required'),
            'name.unique' => __('messages.name unique'),
            'name.max' => __('messages.name max'),
            'price.required' => __('messages.price required'),
            'price.numeric' => __('messages.price required'),
            'details.required' => __('messages.details required'),
         ];
    }

    public function getrules (){

        return   $rules =[
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details'=> 'required',
        ];
    }*/


   /* public function store (){

        Offer::create(['name'=>'ait','price'=>'2000','details'=>'test' ]);

    }*/

    public function create (){

        return view('offers.create');

    }
    public function store (OfferRequest $offers){



       // $messages = $this->getmessages();
       // $rules = $this ->getrules();
       // $validator = Validator::make($offers->all(), $rules,$messages);

       // if ($validator -> fails()){
       //     return redirect()->back()->withErrors($validator)->withInput($offers->all());
       // }

        Offer::create(['name_en'=>$offers->name_en,'name_ar'=>$offers->name_ar,'price'=>$offers->price,'details_en'=>$offers->details_en,'details_ar'=>$offers->details_ar ]);
        return redirect()->back()->with(['Success'=>__('messages.Success')]);

    }






}
