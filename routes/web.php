<?php

/*
|--------------------------------------------------------------------------
| User Authentication
|--------------------------------------------------------------------------
|
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Home Route For All User
|--------------------------------------------------------------------------
|
*/
Route::get('/home', ['as'=>'home', 'uses' => 'HomeController@index']);

/*
|--------------------------------------------------------------------------
| Post Route For All User
|--------------------------------------------------------------------------
|
*/
Route::get('/posts/{id}', ['as'=>'home.post', 'uses' =>'HomeController@post']);

/*
|--------------------------------------------------------------------------
| Categories Route For All User
|--------------------------------------------------------------------------
|
*/
Route::get('/categories/{id}', ['as'=>'home.categories', 'uses' =>'HomeController@categories']);

/*
|--------------------------------------------------------------------------
| Logout Route For Authenticated User
|--------------------------------------------------------------------------
|
*/
Route::get('/logout', ['as'=>'logout', 'uses' => 'Auth\LoginController@logout']);

/*
|------------------------------------------------------------------------------
| Using Admin Middleware Only the admin access all route and author access post
|-------------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'admin'], function(){

	/*
	|--------------------------------------------------------------------------
	| Admin Route Access By Admin and Author
	|--------------------------------------------------------------------------
	|
	*/
	Route::get('/admin', ['as'=>'admin', 'uses' => 'AdminController@index']);

	/*
	|--------------------------------------------------------------------------
	| User Route Access By Admin Only
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource('admin/users', 'AdminUsersController');


	/*
	|--------------------------------------------------------------------------
	| Post Route Access By Admin And Author
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource('admin/posts', 'AdminPostsController');

	/*
	|--------------------------------------------------------------------------
	| Categories Route Access By Admin Only
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource('admin/categories', 'AdminCategoriesController');

	/*
	|--------------------------------------------------------------------------
	| Media Route Access By Admin Only
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource('admin/media', 'AdminMediaController');

	/*
	|--------------------------------------------------------------------------
	| Media Delete Route Access By Admin Only
	|--------------------------------------------------------------------------
	|
	*/
 	Route::delete('admin/delete/media', ['as'=>'delete.media', 'uses' => 'AdminMediaController@deleteMedia']);

 	/*
	|--------------------------------------------------------------------------
	| Coment Route Access By Admin And Author
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource('admin/comments', 'PostCommentsController');

	/*
	|--------------------------------------------------------------------------
	| Reply Route Access By Admin And Author
	|--------------------------------------------------------------------------
	|
	*/
	Route::resource('admin/comment/replies', 'CommentRepliesController');

});

/*
|--------------------------------------------------------------------------
| PostComment And CommentReply Route Access By All Authenticated User
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'auth'], function(){

	Route::post('comment/reply', 'CommentRepliesController@createReply');

	Route::post('post/comment', 'PostCommentsController@createComment');


});





