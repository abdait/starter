<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Traids\OffersTraid;

class CrudController extends Controller
{

    public function index (){

        $offer = Offer::select('id','name_'.LaravelLocalization::getCurrentLocale() .' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details' )-> get();
        return view ('offers.index')->with('offers', $offer) ;

    }




    public function create (){

        return view('offers.create');

    }
    public function store (OfferRequest $offers){


       $offersTraid = new OffersTraid();
       $file_name = $offersTraid->saveImages($offers->photo, 'images/offers');


        Offer::create(['photo'=>$file_name  ,'name_en'=>$offers->name_en,'name_ar'=>$offers->name_ar,'price'=>$offers->price,'details_en'=>$offers->details_en,'details_ar'=>$offers->details_ar ]);
        return redirect()->back()->with(['Success'=>__('messages.Success')]);

    }






    public function edit ($offer_id){

        $offer = Offer::select()->find($offer_id);
        if (!$offer)
        {
            return redirect()->back();
        }

            return view ('offers.edit')->with('offer', $offer) ;



    }

    public function update (OfferRequest $request ,  $offer_id){


        $offer = Offer::find($offer_id);
        $offer -> update($request->all());

        //$offer -> update(['name_en'=>$request->name_en,'name_ar'=>$request->name_ar,'price'=>$request->price,'details_en'=>$request->details_en,'details_ar'=>$request->details_ar ]);
         return redirect()->back()->with(['Success'=>__('messages.Success')]);

     }








}
