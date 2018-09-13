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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Employee
    Route::get('employees', 'EmployeeController@index')->name('employees');
    // Route::get('users/{user}', 'UserController@show')->name('users.show');
    // Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    // Route::put('users/{user}', 'UserController@update')->name('users.update');
    // Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

    //Appointment
    Route::get('appointments', 'AppointmentController@index')->name('appointments');

    //Doctor
    Route::get('doctors', 'DoctorController@index')->name('doctors');
    Route::get('doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');

    Route::get('doctors/add', 'DoctorController@add')->name('doctors.add');
    Route::get('doctors/{doctor}', 'DoctorController@show')->name('doctors.show');
    Route::post('doctors/{doctor}/editdoc','doctorController@update');

    Route::put('doctors/update' , 'DoctorController@update')->name('doctors.update');
    Route::delete('doctors/{user}', 'DoctorController@destroy')->name('doctors.destroy');
    Route::get('doctors/del', 'DoctorController@delete')->name('doctors.delete');
    Route::delete('doctors/{doctor}/delete', 'DoctorController@destroy')->name('doctor.delete');

    //  Route::get('doctors', 'DoctorController@delete')->name('doctors.delete');

    Route::post('doctors/cal','DoctorController@create');
    Route::post('doctors/edit','DoctorController@update');

    //Financial
    Route::get('financial', 'FinancialController@index')->name('financial');

    //Patient
    Route::get('patient', 'PatientController@index')->name('patients');

    //Services
    Route::get('services', 'ServiceController@index')->name('services');

    //Store
    Route::get('store', 'StoreController@index')->name('store');

    //Financial
    Route::get('question_forum', 'QuestionsForumController@index')->name('question_forum');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});

Route::get('/', 'HomeController@index');
Route::get('/aboutus', 'AboutUsController@aboutus');
Route::get('/services', 'ServicesController@services');
Route::get('/contact', 'ContactController@contact');
Route::get('/wageesha', 'WageeshaController@index');
/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
