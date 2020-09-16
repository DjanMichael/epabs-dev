<?php

use Illuminate\Support\Facades\Route;
use App\User;
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



Route::group(['middleware' => ['web', 'auth']], function () {
    
    //Transaction/WFP
    Route::get('/users/wfp','Transaction\WfpController@index')->name('r_wfp');
    Route::get('/users/wfp/create','Transaction\WfpController@goToCreateWfp')->name('r_create_wfp');
    Route::get('/users/wfp/details','Transaction\WfpController@goToDetailsWfp')->name('r_details_wfp');
    Route::get('/ref/user/activity_output_functions/','Transaction\WfpController@getOutputFunctions')->name('d_get_output_functions');
    Route::get('/ref/user/activity_out_functions/search','Transaction\WfpController@getSearchOutputFunctions')->name('d_get_search_output_functions');
    Route::get('/ref/user/budget_line_items','Transaction\WfpController@getBudgetLineItem')->name('d_get_budget_line_item');
    Route::get('/ref/user/budget_line_items/calculate/budget','Transaction\WfpController@getCalculateBudgetAllocation')->name('d_get_calculate_budget_alloc');

    // GLOBAL SYSTEM SETTINGS
    Route::get('/users/setup/year','YearsController@get_year')->name('get_year');
    Route::get('/test','Transaction\WfpController@test');
    Route::get('/user/settings/update/year','GlobalSettingsController@updateUserYear')->name('u_global_user_year');
    Route::get('/user/settings/get/year','GlobalSettingsController@getUserYear')->name('d_get_year');
    #System Menu
    Route::get('/system-menu','PageController@redirectToSystemModule')->name('r_system_module');
    Route::get('/', function ()  {
        return view('pages.admin_dashboard');
    })->name('dashboard');
});

Route::get('/logout/session',function(){
    
    Auth::logout();
    return redirect()->route('login');
})->name('Logout');

Route::get('/authentication','AuthController@index');
Route::any('/login','AuthController@loginUser')->name('send_login');
Route::any('/signup','AuthController@signUpUser')->name('send_signup');

Route::get('/authenticate','AuthController@index')->name('login');

Route::get('/users','AuthController@getAllUser')->name('g_users');

