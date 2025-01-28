<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialController;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/not_adult', function () {
    return 'not adult';
})->name('not_adult');
//parameters

Route::get('/test1/{id}', function ($id) {
    return $id;
})->name ('test1');

Route::get('/test2/{id?}', function () {
    return 'welcome'    ;
})->name ('test2');


Route::get('/landing', function () {
    return view('landing');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('redirect/{service}', [SocialController::class, 'redirect']);
Route::get('callback/{service}', [SocialController::class, 'callback']);

Route::get('/fillable', [App\Http\Controllers\CrudController::class, 'get_offers'])->name('get_offers');




    Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
    {
        Route::group(['prefix'=>'offers'], function (){
             // Route::get('store', [App\Http\Controllers\CrudController::class, 'store'])->name('store');

             Route::get('index', [App\Http\Controllers\CrudController::class, 'index'])->name('offers.index');
             Route::get('create', [App\Http\Controllers\CrudController::class, 'create'])->name('offers.create');
             Route::post('store', [App\Http\Controllers\CrudController::class, 'store'])->name('offers.store');

             Route::get('edit/{offer_id}', [App\Http\Controllers\CrudController::class, 'edit'])->name('offers.edit');
             Route::post('update/{offer_id}', [App\Http\Controllers\CrudController::class, 'update'])->name('offers.update');

             Route::delete('delete/{offer_id}', [App\Http\Controllers\CrudController::class, 'delete'])->name('offers.delete');

        });

        Route::get('youtube', [App\Http\Controllers\CrudController::class, 'Youtube'])->name('offers.Youtube');

     } );

     ////////////ajax offers route///////////////

     Route::group(['prefix'=>'ajax_offers'], function (){


        Route::post('store', [App\Http\Controllers\OfferController::class, 'store'])->name('ajax.offers.store');
        Route::get('create', [App\Http\Controllers\OfferController::class, 'create']);

        Route::get('index', [App\Http\Controllers\OfferController::class, 'index'])->name('ajax.offers.index');
        Route::post('delete', [App\Http\Controllers\OfferController::class, 'delete'])->name('ajax.offers.delete');

        Route::get('edit', [App\Http\Controllers\OfferController::class, 'edit'])->name('ajax.offers.edit');
        Route::post('update', [App\Http\Controllers\OfferController::class, 'update'])->name('ajax.offers.update');

     });


     ////////////authentication and guards///////////////

     Route::group(['middleware'=>'checkAge'], function (){


           Route::get('adult', [App\Http\Controllers\Auth\CustomAuthController::class, 'adult']);
    });

    Route::get('site', [App\Http\Controllers\Auth\CustomAuthController::class, 'site'])->name('site')->middleware('auth:site');
    Route::get('admins', [App\Http\Controllers\Auth\CustomAuthController::class, 'admin'])->name('admin')->middleware('auth:admin');
    
    Route::get('admins/login', [App\Http\Controllers\Auth\CustomAuthController::class, 'login'])->name('admin.login');
    Route::post('admins/login', [App\Http\Controllers\Auth\CustomAuthController::class, 'checklogin'])->name('save.admin.login');
