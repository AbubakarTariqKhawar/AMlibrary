<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\RentingController;
use App\Http\Controllers\API\RentingDetailController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
Route::post('logout',[UserController::class,'logout'])->middleware(['auth:sanctum']);
Route::post('updateUser',[UserController::class,'updateUser'])->middleware(['auth:sanctum']);

Route::get('gethomebook',[BookController::class,'gethomebook']);
Route::post('pickoneBook',[BookController::class,'pickoneBook']);
Route::get('getallbooks',[BookController::class,'getallbooks']);
Route::post('searchbook',[BookController::class,'searchbook']);
Route::post('getBookByCategory',[BookController::class,'getBookByCategory']);
Route::post('getBookLink',[BookController::class,'getBookLink']);

Route::get('getAllCategories',[CategoryController::class,'getAllCategories']);


Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function (){
    Route::get('/', [PostController::class, 'index']);
    Route::post('add', [PostController::class, 'add']);
});

Route::get('/authenticated', function () {
    return response()->json(['authenticated' => auth()->check()]);
})->middleware('auth:sanctum');

Route::get('/user/role', function () {
    return response()->json(['role' => auth()->user()->UseRolId]);
})->middleware('auth:sanctum');
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
