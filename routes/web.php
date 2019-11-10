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

Route::get('/', function () {
    return redirect(route('login'));
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('due-payment', 'PaymentController@due_payment')->name("due-payment");
Route::resource('credit-applications', 'CreditApplicationController');
Route::resource('customers', 'CustomerController');
Route::resource('sales', 'SalesController');
Route::resource('products', 'ProductController');
Route::resource('staffs', 'StaffController');

Route::get('apply', 'ApplicationFormController@index')->name('apply_credit_application');//

/*Step 1  - customer */
Route::get('application-form/customer/register', 'ApplicationFormController@new_customer')->name('register_customer'); // new customer
Route::post('application-form/customer/register', 'ApplicationFormController@save_customer')->name('save_customer'); // new customer
Route::get('application-form/customer/search', 'ApplicationFormController@search_customer')->name('search_customer'); // existing customer , show search form

/*step 2 - actual application form */
Route::get('application-form/create/customer/{customer}', 'ApplicationFormController@show_credit_application')->name('show_credit_application'); // show credit application form
Route::post('application-form/create/customer/{customer}', 'ApplicationFormController@save_credit_application')->name('save_credit_application'); // save credit application form
/*Step 3 - collaterals */
Route::get('customer/{customer}/application-form/{credit_application}/collateral','ApplicationFormController@credit_application_collateral')->name('collateral_form'); // specify collateral for credit application
Route::post('customer/{customer}/application-form/{credit_application}/collateral','ApplicationFormController@save_application_collateral')->name('save_collateral_form'); // specify collateral for credit application
/*Step 4 - choose product */
Route::get('customer/{customer}/application-form/{credit_application}/choose-product','ApplicationFormController@choose_product')->name('choose_product'); // choose product
Route::post('application-form/{credit_application}/choose-product/{customer}','ApplicationFormController@save_credit_application_product')->name('save_product'); // choose product
/*step 5 - computation breakdown */
Route::get('application-form/{credit_application}/choose-product/{customer}','ApplicationFormController@computation_breakdown')->name('computation_breakdown'); // choose product
/* step 6 - co makers */
Route::get('application-form/{credit_application_id}/choose-product/{customer}','ApplicationFormController@co_makers'); // add comakers
/* step 7 - map address */
Route::get('application-form/{credit_application_id}/choose-product/{customer}','ApplicationFormController@map_address'); // map address
/* step 8 - branch manager notes */
Route::get('application-form/{credit_application_id}/choose-product/{customer}','ApplicationFormController@final_notes'); // branch manager notes




Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
