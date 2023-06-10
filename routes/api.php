<?php

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

Route::group(["middleware" => "apiKey"], function(){
    Route::get("/login/google", "AuthController@loginGoogle");
});

Route::group(["middleware" => "auth:sanctum"], function(){
    Route::post("/tweet", "TweetController@addTweet");
    Route::get("/tweet", "TweetController@listTweet");
    Route::delete("/tweet/{tweet_id}", "TweetController@deleteTweet");
    Route::post("/logout", "AuthController@logout");
});

Route::group(["middleware" => "web"], function(){
    Route::get("/callback/google", "AuthController@callbackGoogle");
});

