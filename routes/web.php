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

Auth::routes();

Route::get('/home', ['as'=>'home', 'uses' => 'HomeController@index']);

Route::get('/posts/{id}', ['as'=>'home.post', 'uses' =>'HomeController@post']);

Route::get('/categories/{id}', ['as'=>'home.categories', 'uses' =>'HomeController@categories']);


Route::get('/logout', ['as'=>'logout', 'uses' => 'Auth\LoginController@logout']);

Route::group(['middleware' => 'admin'], function(){

	Route::get('/admin', ['as'=>'admin', 'uses' => 'AdminController@index']);

	Route::resource('admin/users',              'AdminUsersController');
	Route::resource('admin/posts',              'AdminPostsController');
	Route::resource('admin/categories',         'AdminCategoriesController');
	Route::resource('admin/media',              'AdminMediaController');

 	Route::delete('admin/delete/media', ['as'=>'delete.media', 'uses' => 'AdminMediaController@deleteMedia']);

	Route::resource('admin/comments',           'PostCommentsController');
	Route::resource('admin/comment/replies',    'CommentRepliesController');

});

Route::group(['middleware' => 'auth'], function(){

	Route::post('comment/reply', 'CommentRepliesController@createReply');


});


 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {

'\vendor\uniSharp\LaravelFilemanager\Lfm::routes()';

});




