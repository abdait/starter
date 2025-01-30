<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

use App\Models\User;

class RelationController extends Controller
{
    public function has_one(){
        $user = User::where('id',4)->with('phone')->first();

       return response()->json($user);
    }

    public function has_one_revers(){
        $phone = Phone::where('id',1)->with('user')->first();

       return response()->json($phone);
    }
}
