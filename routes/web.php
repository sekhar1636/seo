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
Route::get('/verifyemail/{token}',['as'=>'getEmail', 'uses'=>'CommonController@verify']);
//Static pages common for all users
Route::get('/', ['as'=>'getIndex', 'uses'=>'CommonController@getIndex']);
Route::get('/faq',['as'=>'getFaq', 'uses'=>'FaqController@getFaq']);
Route::get('/younger', ['as'=>'getYounger', 'uses'=>'YoungerController@getYounger']);
Route::get('/contact', ['as'=>'getContact', 'uses'=>'ContactController@getContact']);
Route::post('/contact',['as'=>'postContact', 'uses'=>'ContactController@postContact']);
Route::get('/premium_content', ['as'=>'getContents', 'uses'=>'PremiumContentController@getContent']);

Route::get('/login', ['as' => 'getLogin', 'uses' =>  "LoginController@getLogin"]);
Route::post('/login', ['uses' =>  "LoginController@authenticate"]);
Route::get('/signup', ['as' => 'getSignup', 'uses' =>  "SignupController@getSignup"]);
Route::post('/signup', ['uses' =>  "SignupController@postSignup"]);

Route::get('/content/{slug}', ['as'=>'getStaticPage', 'uses'=>'StaticPageController@index']);

Route::get('/forgot', ['as' => 'getForgot', 'uses' =>  "PasswordController@getForgot"]);
Route::post('/forgot', ['uses' =>  "PasswordController@postForgot"]);
Route::get('reset/{id}/{token}', ['as'=>'getReset', 'uses'=>'PasswordController@getReset']);
Route::post('reset/{id}/{token}', ['as'=>'postReset','uses'=>'PasswordController@postReset']);

Route::get('/actors', ['as'=>'getActors', 'uses'=>'ActorController@getActors']);
Route::get('/actors/{id}/view',['as'=>'getActorView', 'uses'=>'ActorController@view']);
Route::get('/staffs/{id}/view',['as'=>'getStaffView', 'uses'=>'StaffController@view']);
Route::get('/theaters/{id}/view',['as'=>'getTheaterView','uses'=>'TheaterController@view']);

Route::get('/secret-cookie', function() {
	$response = new Illuminate\Http\Response('Cookie installed');
	$response->withCookie(cookie()->forever('secret-cookie', 'WebTestMDT'));
	return $response;
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/theaters', ['as'=>'getTheaters', 'uses'=>'TheaterController@getTheater']);
	Route::get('/staffs', ['as'=>'getStaffs', 'uses'=>'StaffController@getStaff']);

	// Route::get('/role', ['as'=>'getRole', 'uses'=>'CommonController@getRole']);
	// Route::post('/role', ['as'=>'postRole', 'uses'=>'CommonController@postRole']);

	Route::get('/logout', ['as' => 'logout', 'uses' =>  "LoginController@logout"]);

	Route::group(['prefix'=>'actor'], function (){
		Route::group(['as' => 'actor::', 'middleware' => 'role:actor'], function ()
		{
			Route::get('/', ['as'=>'actorProfile', 'uses'=>'ActorController@index']);
            Route::post('/actorprofiletrigger',['as'=>'actorProfileTrigger', 'uses'=>'ActorController@mail']);
			Route::get('update', ['as'=>'getEditProfile', 'uses'=>'ActorController@edit']);
			Route::post('update', ['as'=>'postEditProfile', 'uses'=>'ActorController@update']);
			Route::post('password', ['as'=>'postEditPassword', 'uses'=>'ActorController@postEditPassword']);
			Route::get('payment', ['as'=>'getActorPayment', 'uses'=>'ActorController@payment']);
			Route::post('payment', ['as'=>'storeActorPayment', 'uses'=>'ActorController@paymentStore']);
			Route::get('products', ['as'=>'actorProducts', 'uses'=>'ActorController@products']);
			Route::post('photo/update', ['as'=>'postPhotoUpdate', 'uses'=>'ActorController@postPhotoUpdate']);
			Route::post('photo/crop', ['as'=>'postCropPhotoUpdate', 'uses'=>'ActorController@postCropPhotoUpdate']);
			Route::get('photo/delete', ['as'=>'getDeletePhoto', 'uses'=>'ActorController@actorPhotoDelete']);
			Route::get('products', ['as'=>'products', 'uses'=>'ActorController@products']);
			Route::post('product/buy', ['as'=>'buyProduct', 'uses'=>'ActorController@productBuy']);
			Route::post('updaterole',['as'=>'updateUsersRole','uses'=>'ActorController@userroles']);
			Route::post('audiupdate',['as'=>'actoraudifields','uses'=>'ActorController@actoraudifields']);
		});
	});

	Route::group(['prefix'=>'staff'], function (){
		Route::group(['as' => 'staff::', 'middleware' => 'role:staff'], function ()
		{
			Route::get('/', ['as'=>'staffProfile', 'uses'=>'StaffController@getProfile']);
            Route::get('/products', ['as'=>'staffProducts', 'uses'=>'StaffController@products']);
            Route::post('products/buy',['as'=>'buyProduct', 'uses'=>'StaffController@productbuy']);
            Route::post('/staffprofiletrigger',['as'=>'staffProfileTrigger', 'uses'=>'StaffController@mail']);
            Route::get('update', ['as'=>'getEditProfile', 'uses'=>'StaffController@edit']);
            Route::post('update', ['as'=>'postEditProfile', 'uses'=>'StaffController@update']);
            Route::get('payment', ['as'=>'getStaffPayment', 'uses'=>'StaffController@payment']);
            Route::post('payment', ['as'=>'storeStaffPayment', 'uses'=>'StaffController@paymentStore']);
            Route::post('photo/update', ['as'=>'postPhotoUpdate', 'uses'=>'StaffController@postPhotoUpdate']);
            Route::post('photo/crop', ['as'=>'postCropPhotoUpdate', 'uses'=>'StaffController@postCropPhotoUpdate']);
            Route::get('photo/delete', ['as'=>'getDeletePhoto', 'uses'=>'StaffController@staffPhotoDelete']);
            Route::post('password', ['as'=>'postEditPassword', 'uses'=>'StaffController@postEditPassword']);
            Route::post('edit/portfolio',['as'=>'postPortfolio','uses'=>'StaffController@updatePortfolio']);
            Route::post('updatestaffrole',['as'=>'updateStaffsRole','uses'=>'StaffController@staffroles']);
            //Route::get('download/resume/{id}',['as'=>'staffDownloadResume', 'uses'=>'StaffController@staffoaddownl']);
		});
	});

	Route::group(['prefix'=>'theater'], function (){
		Route::group(['as' => 'theater::', 'middleware' => 'role:theater'], function ()
		{
			Route::get('/', ['as'=>'theaterProfile', 'uses'=>'TheaterController@getProfile']);
			Route::get('/products', ['as'=>'theaterProducts', 'uses'=>'TheaterController@products']);
			Route::post('products/buy',['as'=>'buyProduct', 'uses'=>'TheaterController@productbuy']);
            Route::post('/theaterprofiletrigger',['as'=>'theaterProfileTrigger', 'uses'=>'TheaterController@mail']);
            Route::get('update', ['as'=>'getEditProfile', 'uses'=>'TheaterController@edit']);
            Route::post('update', ['as'=>'postEditProfile', 'uses'=>'TheaterController@update']);
            Route::get('payment', ['as'=>'getTheaterPayment', 'uses'=>'TheaterController@payment']);
            Route::post('payment', ['as'=>'storeTheaterPayment', 'uses'=>'TheaterController@paymentStore']);
            Route::post('photo/update', ['as'=>'postPhotoUpdate', 'uses'=>'TheaterController@postPhotoUpdate']);
            Route::post('photo/crop', ['as'=>'postCropPhotoUpdate', 'uses'=>'TheaterController@postCropPhotoUpdate']);
            Route::get('photo/delete', ['as'=>'getDeletePhoto', 'uses'=>'TheaterController@theaterPhotoDelete']);
            Route::post('password', ['as'=>'postEditPassword', 'uses'=>'TheaterController@postEditPassword']);

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
			Route::get('slideshow/{id}/editslide', ['as'=>'adminSlideshowEditSlide', 'uses'=>'AdminController@slideshowEditSlide']);
			Route::patch('slideshow/{id}/editslide', ['as'=>'adminSlideshowUpdateSlide', 'uses'=>'AdminController@slideshowUpdateSlide']);
			
			Route::get('users/', ['as'=>'adminUsers', 'uses'=>'AdminController@users']);
			Route::post('user/', ['as'=>'adminUserStore', 'uses'=>'AdminController@userStore']);
			Route::get('user/{id}/delete', ['as'=>'adminUserDelete', 'uses'=>'AdminController@userDestroy']);
			Route::get('user/{id}/edit', ['as'=>'adminUserEdit', 'uses'=>'AdminController@userEdit']);
			Route::patch('user/{id}', ['as'=>'adminUserUpdate', 'uses'=>'AdminController@userUpdate']);
			
			Route::match(array('POST', 'PUT'),'actor/{id}', ['as'=>'adminActorUpdate', 'uses'=>'AdminController@actorUpdate']);
			Route::post('actor/{id}/photo', ['as'=>'actorPhotoUpdate', 'uses'=>'AdminController@actorPhotoUpdate']);
			Route::post('actor/{id}/cropPhoto', ['as'=>'actorCropPhoto', 'uses'=>'AdminController@postCropPhotoUpdate']);
			Route::get('actor/{id}/deletePhoto', ['as'=>'actorPhotoDelete', 'uses'=>'AdminController@actorPhotoDelete']);

            Route::match(array('POST', 'PUT'),'theater/{id}', ['as'=>'adminTheaterUpdate', 'uses'=>'AdminController@theaterUpdate']);
            Route::post('theater/{id}/photo', ['as'=>'theaterPhotoUpdate', 'uses'=>'AdminController@theaterPhotoUpdate']);
            Route::put('theater/{id}/cropPhoto', ['as'=>'theaterCropPhoto', 'uses'=>'AdminController@posttheaterCropPhotoUpdate']);
            Route::get('theater/{id}/deletePhoto', ['as'=>'theaterPhotoDelete', 'uses'=>'AdminController@theaterPhotoDelete']);

            Route::match(array('POST','PUT'),'staff/{id}',['as'=>'adminStaffUpdate','uses'=>'AdminController@staffupdate']);
            Route::post('staff/{id}/photo', ['as'=>'staffPhotoUpdate', 'uses'=>'AdminController@staffPhotoUpdate']);
            Route::post('theater/{id}/cropPhoto', ['as'=>'staffCropPhoto', 'uses'=>'AdminController@poststaffCropPhotoUpdate']);
            Route::get('staff/{id}/deletePhoto', ['as'=>'staffPhotoDelete', 'uses'=>'AdminController@staffPhotoDelete']);
            Route::post('staff/portfolio/{id}',['as'=>'adminStaffUpdate','uses'=>'AdminController@portfolioupdate']);


            Route::get('usersDataTable/', ['as'=>'adminUsersDataTable', 'uses'=>'AdminController@UsersDataTable']);
            Route::get('actorsDataTable/', ['as'=>'adminActorDataTable', 'uses'=>'AdminController@actorsDataTable']);
            Route::get('staffDataTable/', ['as'=>'adminStaffDataTable', 'uses'=>'AdminController@staffDataTable']);
            Route::get('theaterDataTable/', ['as'=>'adminTheaterDataTable', 'uses'=>'AdminController@theaterDataTable']);
			Route::get('userPaymentDataTable/{id}', ['as'=>'adminUserPaymentDataTable', 'uses'=>'AdminController@userPaymentDatatable']);
			Route::get('userTransactionDetails/{id}', ['as'=>'adminUserTransactionDetails', 'uses'=>'AdminController@userTransactionDetails']);
			
			Route::get('contentpages/', ['as'=>'adminContentPages', 'uses'=>'AdminController@contentPages']);
			Route::get('contentpagesDataTable/', ['as'=>'adminContentPagesDataTable', 'uses'=>'AdminController@contentPagesDataTable']);
			Route::get('contentpage/{id}/edit', ['as'=>'adminContentPageEdit', 'uses'=>'AdminController@contentPageEdit']);
			Route::patch('contentpage/{id}', ['as'=>'adminContentPageUpdate', 'uses'=>'AdminController@contentPageUpdate']);
			
			Route::get('subscriptions/', ['as'=>'adminSubscriptions', 'uses'=>'AdminController@subscriptions']);
			Route::get('subscriptionsDataTable/', ['as'=>'adminSubscriptionsDataTable', 'uses'=>'AdminController@subscriptionsDataTable']);
			Route::post('subscription/addPlan', ['as'=>'adminSubscriptionStorePlan', 'uses'=>'AdminController@subscriptionStorePlan']);
			Route::get('subscription/{id}/edit', ['as'=>'adminSubscriptionEdit', 'uses'=>'AdminController@subscriptionEdit']);
			Route::patch('subscription/{id}', ['as'=>'adminSubscriptionUpdate', 'uses'=>'AdminController@subscriptionUpdate']);
			
			Route::get('products/', ['as'=>'adminProducts', 'uses'=>'AdminController@products']);
			Route::get('productsDataTable/', ['as'=>'adminProductsDataTable', 'uses'=>'AdminController@productsDataTable']);
			Route::post('product/', ['as'=>'adminProductStore', 'uses'=>'AdminController@productStore']);
			Route::get('product/{id}/edit', ['as'=>'adminProductEdit', 'uses'=>'AdminController@productEdit']);
			Route::patch('product/{id}', ['as'=>'adminProductUpdate', 'uses'=>'AdminController@productUpdate']);
			Route::get('product/{id}/deleteproduct', ['as'=>'adminProductDelete', 'uses'=>'AdminController@productDestroy']);

			Route::get('/content/{slug}',['as'=>'getStaticPage','uses'=>'StaticPageController@index']);
            Route::get('/content/{slug}/edit',['as'=>'staticPageEdit', 'uses'=>'StaticPageController@edit']);
            Route::post('/content/{slug}',['as'=>'updateStaticPage','uses'=>'StaticPageController@update']);

            Route::post('/hardcopysubmit/{id}', ['as'=>'hardCopyUpdate','uses'=>'AdminController@hardcopy']);

            Route::get('audition/',['as' => 'audition', 'uses'=>'AdminController@audition']);
            Route::get('auditiondatatable/',['as' => 'auditions', 'uses'=>'AdminController@auditionDataTable']);
            Route::get('auditionedit/{id}',['as'=>'auditionStatus','uses'=>'AdminController@auditionedit']);
            Route::patch('auditionedit/{id}',['as'=>'auditionUpdate','uses'=>'AdminController@auditionupdate' ]);

            Route::post('auditionextra/{id}',['as'=>'adminextrafields','uses'=>'AdminController@adminextra']);
            Route::get('homepage/edit',['as'=>'adminHomepageEdit','uses'=>'AdminController@homepageedit']);
            Route::post('homepage/edit',['as'=>'adminHomepageupdate','uses'=>'AdminController@homepageupdate']);
        });
	});
	
});