<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialController;

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
});

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