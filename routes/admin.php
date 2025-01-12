<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\SecondController;
use App\Http\Controllers\Front\FirstController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'admin'],function () {

    Route::get('/', function () {  return 'admin';  });
    Route::get('/ait', function () {  return 'admin/ait';  });

});

Route::group(['prefix'=>'user' , 'middleware'=>"auth"],function () {

    Route::get('/', function () {  return 'user';  });
    Route::get('/ait', function () {  return 'user/ait';  });

});

Route::group(['prefix'=>'second'],function () {

    Route::get('/', [SecondController::class, 'show_string']);

});


Route::group(['prefix'=>'first'],function () {

    Route::get('/', [FirstController::class, 'index']);

});



    


 




