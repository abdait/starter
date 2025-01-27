<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Http\Traids\OffersTraid;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Offer;

class OfferController extends Controller
{
    //
    public function create(){
        return view("ajax_offers.create");
    }


    public function store (OfferRequest $offers){


        $offersTraid = new OffersTraid();
        $file_name = $offersTraid->saveImages($offers->photo, 'images/offers');


        $offer = Offer::create(['photo'=>$file_name  ,
                                    'name_en'=>$offers->name_en,
                                    'name_ar'=>$offers->name_ar,
                                    'price'=>$offers->price,
                                    'details_en'=>$offers->details_en,
                                    'details_ar'=>$offers->details_ar ]);

        if ($offer)
        {
             return response()->json([
                'status'=> true,
                'message'=> 'abd ait forr'
             ]);
        }


     }

     public function index (){

         $offer = Offer::select('id','photo','name_'.LaravelLocalization::getCurrentLocale() .' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details' )-> get();
       return view ('ajax_offers.index')->with('offers', $offer) ;

    }

    public function delete ( Request $offer_id){


        // Find the offer by its ID
        $offer = Offer::find($offer_id->id);

        if (!$offer) {
            // If the offer doesn't exist, redirect back with an error message
            return redirect()->route('offers.index')->with('error', 'Offer not found!');
        }

        // Delete the offer
        $offer->delete();

        return response()->json([
            'status'=>true,
            'message' =>'Offer deleted successfully!',
            'id'=>$offer_id->id,
        ]);
        // Redirect to the offers list with a success message

    }

}
