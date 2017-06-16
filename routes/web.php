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

//Static pages common for all users
Route::get('/', ['as'=>'getIndex', 'uses'=>'CommonController@getIndex']);
Route::get('/faq',['as'=>'getFaq', 'uses'=>'CommonController@getFaq']);
Route::get('/younger', ['as'=>'getYounger', 'uses'=>'CommonController@getYounger']);
Route::get('/contact', ['as'=>'getContact', 'uses'=>'CommonController@getContact']);
Route::post('/contact',['as'=>'postContact', 'uses'=>'CommonController@postContact']);
Route::get('/premium_content', ['as'=>'getContents', 'uses'=>'CommonController@getContent']);


Route::get('/login', ['as' => 'getLogin', 'uses' =>  "CommonController@getLogin"]);
Route::post('/login', ['uses' =>  "CommonController@authenticate"]);
Route::get('/signup', ['as' => 'getSignup', 'uses' =>  "CommonController@getSignup"]);
Route::post('/signup', ['uses' =>  "CommonController@postSignup"]);


Route::get('/forgot', ['as' => 'getForgot', 'uses' =>  "CommonController@getForgot"]);
Route::post('/forgot', ['uses' =>  "CommonController@postForgot"]);
Route::get('reset/{id}/{token}', ['as'=>'getReset', 'uses'=>'CommonController@getReset']);
Route::post('reset/{id}/{token}', ['as'=>'postReset','uses'=>'CommonController@postReset']);



Route::group(['middleware' => ['auth']], function () {

	Route::get('/actors', ['as'=>'getActors', 'uses'=>'CommonController@getActors']);
	Route::get('/theaters', ['as'=>'getTheaters', 'uses'=>'CommonController@getTheater']);
	Route::get('/staffs', ['as'=>'getStaffs', 'uses'=>'CommonController@getStaff']);

	// Route::get('/role', ['as'=>'getRole', 'uses'=>'CommonController@getRole']);
	// Route::post('/role', ['as'=>'postRole', 'uses'=>'CommonController@postRole']);

	Route::get('/logout', ['as' => 'logout', 'uses' =>  "CommonController@logout"]);

	Route::group(['prefix'=>'actor'], function (){
		Route::group(['as' => 'actor::', 'middleware' => 'role:actor'], function ()
		{
			Route::get('/', ['as'=>'actorProfile', 'uses'=>'ActorController@getProfile']);
			Route::get('update', ['as'=>'getEditProfile', 'uses'=>'ActorController@getEditProfile']);
			Route::post('update', ['as'=>'postEditProfile', 'uses'=>'ActorController@postEditProfile']);
		});
	});
	Route::group(['prefix'=>'staff'], function (){
		Route::group(['as' => 'staff::', 'middleware' => 'role:staff'], function ()
		{
			Route::get('/', ['as'=>'staffProfile', 'uses'=>'StaffController@getProfile']);
		});
	});

	Route::group(['prefix'=>'theater'], function (){
		Route::group(['as' => 'theater::', 'middleware' => 'role:theater'], function ()
		{
			Route::get('/', ['as'=>'theaterProfile', 'uses'=>'TheaterController@getProfile']);
		});
	});
	
});