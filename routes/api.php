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
use App\Http\Controllers\API\RoleUserController;
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
Route::get('getallUsers',[UserController::class,'getallUsers'])->middleware(['auth:sanctum']);
Route::post('deleteUSer',[UserController::class,'deleteUSer'])->middleware(['auth:sanctum']);
Route::post('editUSerPass',[UserController::class,'editUSerPass'])->middleware(['auth:sanctum']);
Route::post('addClientRole',[UserController::class,'addClientRole']);

Route::post('pickalladdress',[AddressController::class,'pickalladdress'])->middleware(['auth:sanctum']);
Route::post('updateaddress',[AddressController::class,'updateaddress'])->middleware(['auth:sanctum']);
Route::post('deletemyaddress',[AddressController::class,'deletemyaddress'])->middleware(['auth:sanctum']);
Route::post('createaddress',[AddressController::class,'createaddress'])->middleware(['auth:sanctum']);
Route::get('getlastaddressId',[AddressController::class,'getlastaddressId'])->middleware(['auth:sanctum']);

Route::post('pickallBankp',[BankController::class,'pickallBankp'])->middleware(['auth:sanctum']);
Route::post('deletebank',[BankController::class,'deletebank'])->middleware(['auth:sanctum']);
Route::post('updatebankinfo',[BankController::class,'updatebankinfo'])->middleware(['auth:sanctum']);
Route::post('createbankinfo',[BankController::class,'createbankinfo'])->middleware(['auth:sanctum']);
Route::get('getlastbankId',[BankController::class,'getlastbankId'])->middleware(['auth:sanctum']);

Route::get('getAllRoles',[RoleController::class,'getAllRoles'])->middleware(['auth:sanctum']);

Route::get('getAllRoleUser',[RoleUserController::class,'getAllRoleUser'])->middleware(['auth:sanctum']);
Route::post('updateUserRole',[RoleUserController::class,'updateUserRole'])->middleware(['auth:sanctum']);
Route::post('deleteUserRole',[RoleUserController::class,'deleteUserRole'])->middleware(['auth:sanctum']);

Route::post('rentdetailorder',[RentingDetailController::class,'rentdetailorder'])->middleware(['auth:sanctum']);
Route::post('getrentedBookByS',[RentingDetailController::class,'getrentedBookByS'])->middleware(['auth:sanctum']);
Route::post('updateRentDetail',[RentingDetailController::class,'updateRentDetail'])->middleware(['auth:sanctum']);
Route::post('updateReturnPrice',[RentingDetailController::class,'updateReturnPrice'])->middleware(['auth:sanctum']);
Route::post('getrentedBookByAdmin',[RentingDetailController::class,'getrentedBookByAdmin'])->middleware(['auth:sanctum']);

Route::post('rentbookorder',[RentingController::class,'rentbookorder'])->middleware(['auth:sanctum']);
Route::get('getlastRentId',[RentingController::class,'getlastRentId'])->middleware(['auth:sanctum']);

Route::get('gethomebook',[BookController::class,'gethomebook']);
Route::post('pickoneBook',[BookController::class,'pickoneBook']);
Route::get('getallbooks',[BookController::class,'getallbooks']);
Route::post('searchbook',[BookController::class,'searchbook']);
Route::post('getBookByCategory',[BookController::class,'getBookByCategory']);
Route::post('getBookLink',[BookController::class,'getBookLink']);
Route::post('createBook',[BookController::class,'createBook']);
Route::post('deleteBook',[BookController::class,'deleteBook']);
Route::post('editBook',[BookController::class,'editBook']);

Route::get('getAllCategories',[CategoryController::class,'getAllCategories']);


Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function (){
    Route::get('/', [PostController::class, 'index']);
    Route::post('add', [PostController::class, 'add']);
});

Route::get('/authenticated', function () {
    return response()->json(['authenticated' => auth()->check()]);
})->middleware('auth:sanctum');

Route::get('/user/roles', [UserController::class, 'getUserRoles'])->middleware('auth:sanctum');


/*Route::get('/user/role', function () {
    return response()->json(['role' => auth()->user()->UseRolId]);
})->middleware('auth:sanctum');*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
