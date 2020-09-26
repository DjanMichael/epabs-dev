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
|   r = Redirect
|   a = Add
*/



Route::group(['middleware' => ['web', 'auth']], function () {
    
    //Transaction/WFP
    Route::get('/users/wfp','Transaction\WfpController@index')->name('r_wfp');
    Route::get('/users/wfp/create','Transaction\WfpController@goToCreateWfp')->name('r_create_wfp');
    Route::get('/users/wfp/details','Transaction\WfpController@goToDetailsWfp')->name('r_details_wfp');
    Route::get('/ref/user/activity_output_functions/','Transaction\WfpController@getOutputFunctions')->name('d_get_output_functions');
    Route::get('/ref/user/activity_out_functions/search','Transaction\WfpController@getSearchOutputFunctions')->name('d_get_search_output_functions');
    Route::get('/ref/user/budget_line_items','Transaction\WfpController@getBudgetLineItem')->name('d_get_budget_line_item');
    Route::get('/ref/user/budget_line_items/calculate/budget','Transaction\WfpController@getCalculateBudgetAllocationUtilization')->name('d_get_calculate_budget_alloc');
    Route::get('/ref/user/wfp/uacs/category','Transaction\WfpController@getUacsCategory')->name('d_get_uacs_category');
    Route::get('/ref/user/wfp/uacs/subcategory','Transaction\WfpController@getUacsSubCategory')->name('d_get_uacs_subcategory');
    Route::get('/ref/user/wfp/uacs/title','Transaction\WfpController@getUacsTitle')->name('d_get_uacs_title');
    Route::get('/ref/user/wfp/uacs/uacs/code','Transaction\WfpController@getUacsCode')->name('d_get_uacs_code');
    Route::get('/users/wfp/create/search/pagination/output_function','Transaction\WfpController@getOutputFunctionByPage')->name('d_output_function_by_page');
    Route::get('/users/wfp/view','Transaction\WfpController@getWfpByCode')->name('d_wfp_view');
    Route::get('/users/wfp/create/generate','Transaction\WfpController@generateWfpCode')->name('f_generate_code_wfp');

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
Route::get('/authtentication/user/section','AuthController@getSection')->name('d_get_section');
Route::get('/authtentication/user/section/division/id','AuthController@getUnitId')->name('d_auth_get_unit_id');

Route::any('/login','AuthController@loginUser')->name('send_login');
Route::any('/signup','AuthController@signUpUser')->name('send_signup');

Route::get('/authenticate','AuthController@index')->name('login');

Route::get('/users','AuthController@getAllUser')->name('g_users');

/*
|--------------------------------------------------------------------------
| References
|--------------------------------------------------------------------------
*/

// Office Unit Routes
Route::get('/system/reference/unit','Reference\UnitController@index')->name('r_unit');

// Procurement Supplies Routes
Route::get('/system/reference/procurement-supplies','Reference\ProcurementSuppliesController@index')->name('r_procurement_supplies');
Route::get('/system/reference/procurement-supplies/all','Reference\ProcurementSuppliesController@getProcurementSupplies')->name('d_get_procurement_supplies');
Route::get('/system/reference/procurement-supplies/pagination','Reference\ProcurementSuppliesController@getOutputFunctionByPage')->name('d_get_procurement_supplies_by_page');
Route::get('/system/reference/procurement-supplies/search','Reference\ProcurementSuppliesController@getSearchOutputFunctions')->name('d_get_procurement_supplies_search');
Route::post('/system/reference/add-procurement-supplies','Reference\ProcurementSuppliesController@store')->name('a_procurement_supplies');