<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');

Route::post('register', 'Admin\RegisterController@register');
Route::post('login', 'Admin\LoginController@login');

//响应foo所有的请求
Route::match(['get','post'], 'foo', function (){
    return 'This is a request get or post';
});
//响应bar所有的请求
Route::any('bar', function () {
    return 'This is a request from any';
});