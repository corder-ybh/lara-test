<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/index', 'IndexController@index');
//Route::get('article/index', 'ArticleController@index');
//Route::get('article/add', 'ArticleController@add');
//Route::get('article/delete', 'ArticleController@delete');
//Route::get('article/edit', 'ArticleController@edit');

Route::group(['middleware' => ['web']],function(){
    Route::get('/',function (){
        return view('welcome');
    });
    Route::get('admin/login', 'Admin\PublicController@login');
    Route::post('admin/check', 'Admin\PublicController@check');
    Route::get('admin/index', 'Admin\IndexController@index');
});