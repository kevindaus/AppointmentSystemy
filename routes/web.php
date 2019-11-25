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
Route::get('/payment/overdue', 'PaymentController@overdue')->name("payment.overdue");
Route::get('/credit-applications/pending', 'CreditApplicationController@pending')->name('credit-applications.pending');
Route::get('/credit-applications/approve/{credit_application}', 'CreditApplicationController@approve')->name('credit-applications.approve');
Route::post('/credit-applications/approve/{credit_application}/success', 'CreditApplicationController@save_approval')->name('credit-applications.save_approval');
Route::get('/credit-applications/deny/{credit_application}', 'CreditApplicationController@deny')->name('credit-applications.deny');
Route::get('/notify/overdue/{customer}' , 'NotificationController@sendNotification')->name('notify.overdue');

Route::resource('credit-applications', 'CreditApplicationController');
Route::resource('customers', 'CustomerController');
Route::resource('sales', 'SalesController');
Route::resource('products', 'ProductController');
Route::resource('staffs', 'StaffController');
Route::resource('payment', 'PaymentController');

Route::get('apply', 'ApplicationFormController@index')->name('apply_credit_application');//

/*Step 1  - customer */
Route::get('application-form/customer/register', 'ApplicationFormController@new_customer')->name('register_customer'); // new customer
Route::post('application-form/customer/register', 'ApplicationFormController@save_customer')->name('save_customer'); // new customer
Route::get('application-form/customer/search', 'ApplicationFormController@search_customer')->name('search_customer'); // existing customer , show search form

/*step 2 - actual application form */
Route::get('application-form/create/customer/{customer}', 'ApplicationFormController@show_credit_application')->name('show_credit_application'); // show credit application form
Route::post('application-form/create/customer/{customer}', 'ApplicationFormController@save_credit_application')->name('save_credit_application'); // save credit application form
/*Step 3 - collaterals */
Route::get('customer/{customer}/application-form/{credit_application}/collateral', 'ApplicationFormController@credit_application_collateral')->name('collateral_form'); // specify collateral for credit application
Route::post('customer/{customer}/application-form/{credit_application}/collateral', 'ApplicationFormController@save_application_collateral')->name('save_collateral_form'); // specify collateral for credit application
/*Step 4 - choose product */
Route::get('customer/{customer}/application-form/{credit_application}/choose-product', 'ApplicationFormController@choose_product')->name('choose_product'); // choose product
Route::post('application-form/{credit_application}/choose-product/{customer}', 'ApplicationFormController@save_product')->name('save_product'); // choose product
/*step 5 - computation breakdown */
Route::get('application-form/{credit_application}/computation-breakdown/{customer}', 'ApplicationFormController@computation_breakdown')->name('computation_breakdown');
Route::post('application-form/{credit_application}/computation-breakdown/{customer}', 'ApplicationFormController@save_computation_breakdown')->name('save_computation_breakdown');

/* step 6 - co makers */
Route::get('application-form/{credit_application}/co-maker/{customer}', 'ApplicationFormController@co_makers')->name('co_makers'); // add comakers
Route::post('application-form/{credit_application}/co-maker/{customer}', 'ApplicationFormController@save_co_makers')->name('save_co_makers'); // add comakers

/* step 7 - map address */
Route::get('application-form/{credit_application}/map-address/{customer}', 'ApplicationFormController@map_address')->name('map_address'); // map address
Route::post('application-form/{credit_application}/map-address/{customer}', 'ApplicationFormController@save_map_address')->name('save_map_address'); // map address

/* step 8 - staff who handled the processing */
Route::get('application-form/{credit_application}/assisting-staff/{customer}', 'ApplicationFormController@assisting_staff')->name('assisting_staff');
Route::post('application-form/{credit_application}/assisting-/{customer}', 'ApplicationFormController@save_assisting_staff')->name('save_assisting_staff');
/* step 9 - branch manager notes */
Route::get('application-form/{credit_application}/final-notes/{customer}', 'ApplicationFormController@final_notes')->name('final_notes');
Route::post('application-form/{credit_application}/final-notes/{customer}', 'ApplicationFormController@save_final_notes')->name('save_final_notes');

/* Wizard Done*/
Route::get('application-form/success', 'ApplicationFormController@application_done')->name("application_done");


Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
