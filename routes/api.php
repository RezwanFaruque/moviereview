<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

Route::namespace('Api')->middleware('api')->group(function () {

    Route::post('/register','UserAuthController@register')->name('user.registration');

    Route::post('/login','UserAuthController@login')->name('user.login');

    
});



Route::namespace('Api')->middleware('auth:api')->group(function () {
   
    Route::apiResource('posts','MovieBlogPostController');
    
});
