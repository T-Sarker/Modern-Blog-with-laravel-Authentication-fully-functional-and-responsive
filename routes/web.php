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

Route::get('/',[

	'uses' => 'AllNavController@index',
	'as'   =>'/'
]);


Route::get('/about',[

	'uses' => 'AllNavController@about',
	'as' => 'about'

]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// category add url route declare
Route::get('/category/add-category',[
	'uses' => 'CategoryController@addCategory',
	'as'   => 'add-category',
	'middleware' => 'checkLogin'
]);

Route::post('/category/new-category',[
	'uses' => 'CategoryController@newCategory',
	'as'   => 'new-category'
]);

Route::get('/category/manage-category',[
	'uses' => 'CategoryController@manageCategory',
	'as'   => 'manage-category'
]);

// test routes

Route::get('/test/test-page',[

	'uses'  => 'testController@testFunction',
	'as'    => 'test-page'
]);

Route::post('/test/new-test-page',[
	'uses'   => 'testController@newTestFunction',
	'as'     => 'new-test-page'
]);

Route::get('edit-category/{id}/{name}',[
	'uses'  => 'CategoryController@editCategory',
	'as'    => 'edit-category'
]);


Route::post('/update-category',[
		'uses' => 'CategoryController@updateCategory',
		'as'   => 'update-category'
]);


Route::post('/delete-category',[
	'uses'  => 'CategoryController@deleteCategory',
	'as'    => 'delete-category'
]);

Route::get('/test/manage-test',[
	'uses'  => 'testController@manageTestData',
	'as'    => 'manage-test' 
]);

Route::get('/test/edit-test/{id}/{name}',[
	'uses'  => 'testController@editTest',
	 'as'   => 'edit-test'
]);

Route::post('/test/update-test',[
	'uses'  => 'testController@updateTest',
	'as'    => 'update-test'
]);

Route::post('/delete-test',[
	'uses'  => 'testController@deleteTest',
	'as'    => 'delete-test'
]);


// blog route starts...................................

Route::get('/blog/add-blog',[
	'uses'  => 'BlogController@addBlog',
	'as'    => 'add-blog'
]);


Route::post('/blog/add-new-blog',[
	'uses'  => 'BlogController@addnewBlog',
	'as'    => 'add-new-blog' 
]);

Route::get('/blog/manage-blog',[
	'uses'  => 'BlogController@manageBlog',
	'as'    => 'manage-blog'
]);

Route::get('/blog/edit-blog/{id}/{name}',[
	'uses'  => 'BlogController@editBlog',
	'as'    => 'edit-blog'
]);

Route::post('/blog/update-new-blog',[
	'uses'  => 'BlogController@updateNewBlog',
	'as'    => 'update-new-blog' 
]);

Route::post('/blog/delete-blog',[
	'uses'  => 'BlogController@deleteBlog',
	'as'    => 'delete-blog' 
]);


Route::get('/category/all-category-blog/{id}/{name}/{extra}',[

	'uses' => 'AllNavController@allCategoryView',
	'as'   => 'all-category-blog'
]);

Route::get('/details/blog-details/{id}/{name}',[
	'uses'  => 'AllNavController@singleBlogDetailsShow',
	'as'    => 'blog-details'
]);


Route::get('/signup/sign-up',[
	'uses'  => 'SignupController@signup',
	'as'    => 'sign-up'
]);

Route::post('/signup/user-sign-up',[
	'uses'  => 'SignupController@userSignUp',
	'as'    => 'sign-up-user'
]);

Route::post('logout/logout',[
	'uses'  => 'SignupController@logoutUser',
	'as'    => 'logout-user'
]);

Route::get('/signin/user-login',[
	'uses'  => 'SignupController@userSignin',
	'as'    => 'user-login'
]);

Route::post('/signin/sign-in-user',[
	'uses'  => 'SignupController@signInUser',
	'as'    => 'sign-in-user'
]);

Route::post('/checkEmail',[
	'uses'  => 'SignupController@checkEmailStatus',
	'as'    => 'check-email'
]);

Route::post('/comment/visitor-comment',[
	'uses'  => 'CommentController@makeAcomment',
	'as'    => 'visitor-comment'
]);

Route::post('/getComments',[
	'uses'  => 'CommentController@showComments',
	'as'    => 'get-comments'
]);

// Error handle Routes

Route::get('/error/error-handle-404',[
	'uses'  => 'exceptionController@get404',
	'as'    => ''
]);


Route::get('/error/error-handle-405',[
	'uses'  => 'exceptionController@get405',
	'as'    => ''
]);