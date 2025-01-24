<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Http\Traids\OffersTraid;
use Illuminate\Http\Request;
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
}
