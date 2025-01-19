<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function get_offers (){

        $offer = Offer::select('id','name')-> get();
        return ($offer) ;

    }

    public function store (){

        Offer::create(['name'=>'ait','price'=>'2000','details'=>'test' ]);

    }
}
