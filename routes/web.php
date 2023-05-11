<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ProfilePicController;
use App\Http\Controllers\API\BookPicController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('{any}', function () {
    return view('app');
})->where('any','.*');


Route::post('upload-profile-pic',[ProfilePicController::class,'uploadProfilePic']);

Route::post('upload-book-pic',[BookPicController::class,'uploadBookPic']);

/*
Route::get('{any}', [BookController::class, 'gethomebook'])->where('any','.*');
*/
