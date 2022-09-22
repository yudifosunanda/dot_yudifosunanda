<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\menus\GetDataController;
use App\Http\Controllers\Api\AuthController;

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

//route
//from db

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>'auth:sanctum'],function(){
  $type_fetch =  Config::get('type_fetch.type_fetch.type');

  if($type_fetch=='database'){
    Route::get('/search/provinces/{province_id}',[GetDataController::class,'get_province_from_db']);
    Route::get('/search/cities/{city_id}',[GetDataController::class,'get_city_from_db']);

  }else if($type_fetch=='direct_api'){
    Route::get('/search/provinces/{province_id}',[GetDataController::class,'get_province_from_direct_api']);
    Route::get('/search/cities/{city_id}',[GetDataController::class,'get_city_from_direct_api']);

  }else{
    Route::get('/search/provinces/{province_id}',[GetDataController::class,'get_province_from_db']);
    Route::get('/search/cities/{city_id}',[GetDataController::class,'get_city_from_db']);

  }

  Route::get('/logout',[AuthController::class,'logout']);
});
