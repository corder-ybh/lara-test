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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('index');
Route::get('/info', 'IndexController@info')->name('info');

//通过 resource 方法为该控制器注册一个资源路由
Route::resource('auth/post', 'PostController', array("as" => "auth"));
Route::resource('auth/user', 'Auth\UserController', array("as" => "auth"));
Route::resource('auth/permission', 'Auth\PermissionController', array("as" => "auth"));
Route::resource('auth/role', 'Auth\RoleController', array("as" => "auth"));
//资源控制器处理的动作
//
//请求方式	URI路径	控制器方法	路由名称
//GET	/posts	index	posts.index
//GET	/posts/create	create	posts.create
//POST	/posts	store	posts.store
//GET	/posts/{post}	show	posts.show
//GET	/posts/{post}/edit	edit	posts.edit
//PUT/PATCH	/posts/{post}	update	posts.update
//DELETE	/posts/{post}	destroy	posts.destroy

