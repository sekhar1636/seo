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
	Route::get('/actors/{id}/view',['as'=>'getActorView', 'uses'=>'CommonController@view']);
	Route::get('/theaters', ['as'=>'getTheaters', 'uses'=>'CommonController@getTheater']);
	Route::get('/staffs', ['as'=>'getStaffs', 'uses'=>'CommonController@getStaff']);

	// Route::get('/role', ['as'=>'getRole', 'uses'=>'CommonController@getRole']);
	// Route::post('/role', ['as'=>'postRole', 'uses'=>'CommonController@postRole']);

	Route::get('/logout', ['as' => 'logout', 'uses' =>  "CommonController@logout"]);

	Route::group(['prefix'=>'actor'], function (){
		Route::group(['as' => 'actor::', 'middleware' => 'role:actor'], function ()
		{
			Route::get('/', ['as'=>'actorProfile', 'uses'=>'ActorController@index']);
			Route::get('update', ['as'=>'getEditProfile', 'uses'=>'ActorController@edit']);
			Route::post('update', ['as'=>'postEditProfile', 'uses'=>'ActorController@update']);
			Route::post('password', ['as'=>'postEditPassword', 'uses'=>'ActorController@postEditPassword']);
			Route::get('payment', ['as'=>'getActorPayment', 'uses'=>'ActorController@payment']);
			Route::post('photo/update', ['as'=>'postPhotoUpdate', 'uses'=>'ActorController@postPhotoUpdate']);
			Route::post('photo/crop', ['as'=>'postCropPhotoUpdate', 'uses'=>'ActorController@postCropPhotoUpdate']);
			Route::get('photo/delete', ['as'=>'getDeletePhoto', 'uses'=>'ActorController@getDeletePhoto']);
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
	
	Route::group(['prefix'=>'admin'], function (){
		Route::group(['as' => 'admin::', 'middleware' => 'role:admin'], function ()
		{
			Route::get('/', ['as'=>'adminDashboard', 'uses'=>'AdminController@index']);
			
			Route::get('faq/', ['as'=>'adminFaq', 'uses'=>'AdminController@faq']);
			Route::post('faq/', ['as'=>'adminFaqStore', 'uses'=>'AdminController@faqStore']);
			Route::get('faq/{id}/delete', ['as'=>'adminFaqDelete', 'uses'=>'AdminController@faqDestroy']);
			Route::get('faq/{id}/edit', ['as'=>'adminFaqEdit', 'uses'=>'AdminController@faqEdit']);
			Route::patch('faq/{id}', ['as'=>'adminFaqUpdate', 'uses'=>'AdminController@faqUpdate']);
			Route::get('faqDataTable/', ['as'=>'adminFaqDataTable', 'uses'=>'AdminController@faqDataTable']);
			
			Route::get('slideshows/', ['as'=>'adminSlideshows', 'uses'=>'AdminController@slideshows']);
			Route::post('slideshow/', ['as'=>'adminSlideshowStore', 'uses'=>'AdminController@slideshowStore']);
			Route::get('slideshow/{id}/delete', ['as'=>'adminSlideshowDelete', 'uses'=>'AdminController@slideshowDestroy']);
			Route::get('slideshow/{id}/edit', ['as'=>'adminSlideshowEdit', 'uses'=>'AdminController@slideshowEdit']);
			Route::patch('slideshow/{id}', ['as'=>'adminSlideshowUpdate', 'uses'=>'AdminController@slideshowUpdate']);
			Route::get('slideshowDataTable/', ['as'=>'adminSlideshowDataTable', 'uses'=>'AdminController@slideshowDataTable']);
			
			Route::get('slideshow/{id}/addslide', ['as'=>'adminSlideshowAddSlide', 'uses'=>'AdminController@slideshowAddSlide']);
			Route::post('slideshow/{id}/addslide', ['as'=>'adminSlideshowStoreSlide', 'uses'=>'AdminController@slideshowStoreSlide']);
			Route::get('slideshow/{id}/slidesDataTable', ['as'=>'adminSlideshowSlidesDataTable', 'uses'=>'AdminController@slideshowSlidesDataTable']);
			Route::get('slideshow/{id}/deleteslide', ['as'=>'adminSlideshowDeleteSlide', 'uses'=>'AdminController@slideshowDestroySlide']);
			
			Route::get('users/', ['as'=>'adminUsers', 'uses'=>'AdminController@users']);
			Route::post('user/', ['as'=>'adminUserStore', 'uses'=>'AdminController@userStore']);
			Route::get('user/{id}/delete', ['as'=>'adminUserDelete', 'uses'=>'AdminController@userDestroy']);
			Route::get('user/{id}/edit', ['as'=>'adminUserEdit', 'uses'=>'AdminController@userEdit']);
			Route::patch('user/{id}', ['as'=>'adminUserUpdate', 'uses'=>'AdminController@userUpdate']);
			Route::get('usersDataTable/', ['as'=>'adminUsersDataTable', 'uses'=>'AdminController@UsersDataTable']);
		});
	});
	
});