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
|   Route Names
|   r = Redirect
|   a = Add
|   d = Display
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
    Route::get('/users/wfp/performance_indicator/save','Transaction\WfpController@savePerformaceIndicator')->name('db_pi_save');
    Route::get('/wfp/units/byYear/list','Transaction\WfpController@getAllUnitsWfpList')->name('d_get_all_wfp_list');
    Route::get('/wfp/comments/save','Transaction\WfpController@saveWfpComments')->name('db_save_wfp_comment');
    Route::get('/wfp/unit/edit','Transaction\WfpController@editWfp')->name('r_edit_wfp');
    Route::get('/wfp/unit/save','Transaction\WfpController@saveWfpAct')->name('db_save_wfp_act');
    Route::get('/wfp/unit/save/checking/pi','Transaction\WfpController@checkingWfpPiOnSave')->name('db_check_if_wfp_wihtout_pi_on_save');
    Route::get('/wfp/unit/performanceIndicator','Transaction\WfpController@getPerformanceIndicatorByWfpCode')->name('d_get_pi_by_wfp');
    Route::get('/wfp/unit/pi/delete','Transaction\WfpController@deletePerformanceIndicatorByWfpCode')->name('db_del_pi_wfp');
    Route::get('/wfp/unit/pi/edit','Transaction\WfpController@editPerformanceIndicatorByWfpCode')->name('db_edit_pi_wfp');
    Route::get('/wfp/unit/pi/update','Transaction\WfpController@updatePerformanceIndicatorById')->name('db_wfp_pi_update');
    Route::get('/wfp/unit/wfpactivity/update','Transaction\WfpController@updateWfpActivity')->name('db_update_wfp_activity');
    Route::get('/wfp/unit/viewer/ppmp/pi','Transaction\WfpController@getPiPPMP')->name('d_pi_ppmp_viewer');
    Route::get('/wfp/status/update/approve','Transaction\WfpController@updateWfpApprove')->name('wfp_status_approve');
    Route::get('/wfp/status/update/revise','Transaction\WfpController@updateWfpRevise')->name('wfp_status_revise');
    Route::get('/wfp/status/update/submit','Transaction\WfpController@updateWfpSubmit')->name('wfp_status_submit');

    Route::get('/wfp/unit/new/activity/encode','Transaction\WfpController@newWfpActivity')->name('wfp_add_new_activity');
    Route::get('/wfp/unit/activity/delete','Transaction\WfpController@deleteUnitAcitivityById')->name('r_del_wfp_act');
    //Transaction/Budget Allocation
    Route::get('/user/unit/budget_allocation','Transaction\BudgetAllocationController@index')->name('r_budget_allocation');
    Route::get('/budgetLineItem/All','Transaction\BudgetAllocationController@getAllBLI')->name('d_bli_all');
    Route::get('/budget/allocation/utilization/byYear','Transaction\BudgetAllocationController@getBudgetAllocationUtilization')->name('d_budget_allocation_utilization');
    Route::get('/budget/unit/perBLI/amount','Transaction\BudgetAllocationController@getBudgetAllocationPerBLIByUser')->name('d_budget_allocation_per_bli_by_user');
    Route::get('/budget/allocation/save','Transaction\BudgetAllocationController@saveBudgetAllocationUnit')->name('db_bli_allocation_unit_save');
    Route::get('/budget/allocation/update/bli','Transaction\BudgetAllocationController@updateBudgetPerBLIByUser')->name('db_budget_update_allocation_per_user');
    Route::get('/budget/allocation/delete/perBLI','Transaction\BudgetAllocationController@deleteBudgetPerBLIByUserPerBLI')->name('db_budget_delete_allocation_per_bli');
    Route::get('/budget/allocation/delete/byId','Transaction\BudgetAllocationController@deleteBudgetPerBLIByUser')->name('db_budget_delete_allocation_per_user');
    Route::get('/budget/allocation/search/qry','Transaction\BudgetAllocationController@searchBudgetAllocationByUnit')->name('sdb_budget_allocation_unit');
    Route::get('/budgetlineitem/amount/year/allocation','Transaction\BudgetAllocationController@getAmountByBliYear')->name('get_budget_amount_by_bli_and_year');

    //PRINTING
    Route::get('/wfp/unit/print','PDFController@printUnitWFP')->name('wfp_unit_print');
    Route::get('/wfp/unit/download','PDFController@downloadUnitWFP')->name('wfp_unit_download');

    //PPMP
    Route::get('/unit/ppmp','Transaction\PpmpController@index')->name('r_ppmp');
    Route::get('/view/wfp/activity/cart/','Transaction\PpmpController@getCartDetailsByWfpActivity')->name('wfp_act_cart_view');
    Route::get('/ppmp/perindicator/details/fetch','Transaction\PpmpController@getPIDetails')->name('get_ppmp_details');

    //WFP STATUS
    Route::get('/wfp/check/status/approve','WfpLogsController@getWfpStatusApproved')->name('check_if_wfp_is_approve');
    Route::get('/wfp/check/status/submitted','WfpLogsController@getWfpStatusSubmitted')->name('check_if_wfp_is_submitted');

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

// Procurement Supplies Routes
Route::get('/system/reference/procurement-supplies','Reference\ProcurementSuppliesController@index')->name('r_procurement_supplies');
Route::get('/system/reference/procurement-supplies/all','Reference\ProcurementSuppliesController@getProcurementSupplies')->name('d_get_procurement_supplies');
Route::get('/system/reference/procurement-supplies/pagination','Reference\ProcurementSuppliesController@getProcurementSuppliesByPage')->name('d_get_procurement_supplies_by_page');
Route::get('/system/reference/procurement-supplies/search','Reference\ProcurementSuppliesController@getProcurementSuppliesSearch')->name('d_get_procurement_supplies_search');
Route::get('/system/reference/procurement-supplies/add-form','Reference\ProcurementSuppliesController@getAddForm')->name('d_add_procurement_supplies');
Route::post('/system/reference/add-procurement-supplies','Reference\ProcurementSuppliesController@store')->name('a_procurement_supplies');
Route::get('/system/reference/procurement-supplies-price/all','Reference\ProcurementSuppliesController@getProcurementSuppliesPrice')->name('d_get_procurement_supplies_price');
Route::get('/system/reference/procurement-supplies/change-price-form','Reference\ProcurementSuppliesController@getChangePriceForm')->name('d_change_price_procurement_supplies');
Route::post('/system/reference/add-procurement-supplies-price','Reference\ProcurementSuppliesController@storePrice')->name('a_procurement_supplies_price');

// Procurement Medicine Routes
Route::get('/system/reference/procurement-medicine','Reference\ProcurementMedicineController@index')->name('r_procurement_medicine');
Route::get('/system/reference/procurement-medicine/all','Reference\ProcurementMedicineController@getProcurementMedicine')->name('d_get_procurement_medicine');
Route::get('/system/reference/procurement-medicine/pagination','Reference\ProcurementMedicineController@getProcurementMedicineByPage')->name('d_get_procurement_medicine_by_page');
Route::get('/system/reference/procurement-medicine/search','Reference\ProcurementMedicineController@getProcurementMedicineSearch')->name('d_get_procurement_medicine_search');
Route::get('/system/reference/procurement-medicine/add-form','Reference\ProcurementMedicineController@getAddForm')->name('d_add_procurement_medicine');
Route::post('/system/reference/add-procurement-medicine','Reference\ProcurementMedicineController@store')->name('a_procurement_medicine');
Route::get('/system/reference/procurement-medicine-price/all','Reference\ProcurementMedicineController@getProcurementMedicinePrice')->name('d_get_procurement_medicine_price');
Route::get('/system/reference/procurement-medicine/change-price-form','Reference\ProcurementMedicineController@getChangePriceForm')->name('d_change_price_procurement_medicine');
Route::post('/system/reference/add-procurement-medicine-price','Reference\ProcurementMedicineController@storePrice')->name('a_procurement_medicine_price');

// User Routes
Route::get('/system/reference/user','UserController@index')->name('r_user');
Route::get('/system/reference/user/all','UserController@getUser')->name('d_user');
Route::get('/system/reference/user/pagination','UserController@getUserByPage')->name('d_get_user_by_page');
Route::get('/system/reference/user/search','UserController@getUserBySearch')->name('d_get_user_search');
Route::post('/system/reference/change-account-status','UserController@changeAccountStatus')->name('u_account_status');
Route::post('/system/reference/reset-password','UserController@resetPassword')->name('u_reset_password');

// Unified Accounts Code Structure Routes
Route::get('/system/reference/unified-accounts-code-structure','Reference\UacsController@index')->name('r_uacs');
Route::get('/system/reference/unified-accounts-code-structure/all','Reference\UacsController@getUacs')->name('d_uacs');
Route::get('/system/reference/unified-accounts-code-structure/pagination','Reference\UacsController@getUacsByPage')->name('d_get_uacs_by_page');
Route::get('/system/reference/unified-accounts-code-structure/search','Reference\UacsController@getUacsSearch')->name('d_get_uacs_search');
Route::get('/system/reference/unified-accounts-code-structure/add-form','Reference\UacsController@getAddForm')->name('d_add_uacs');
Route::post('/system/reference/add-unified-accounts-code-structure','Reference\UacsController@store')->name('a_uacs');

// Drugs and Medicine Routes
Route::get('/system/reference/drug-medicine-category','Reference\DrugMedicineCategoryController@index')->name('r_dm_category');
Route::get('/system/reference/drug-medicine-category/all','Reference\DrugMedicineCategoryController@getCategory')->name('d_dm_category');
Route::get('/system/reference/drug-medicine-category/pagination','Reference\DrugMedicineCategoryController@getCategoryByPage')->name('d_get_dm_category_by_page');
Route::get('/system/reference/drug-medicine-category/search','Reference\DrugMedicineCategoryController@getCategorySearch')->name('d_get_dm_category_search');
Route::get('/system/reference/drug-medicine-category/add-form','Reference\DrugMedicineCategoryController@getAddForm')->name('d_add_dm_category');
Route::post('/system/reference/add-drug-medicine-category','Reference\DrugMedicineCategoryController@store')->name('a_dm_category');

// Program  Routes
Route::get('/system/reference/program','Reference\ProgramController@index')->name('r_program');
Route::get('/system/reference/program/all','Reference\ProgramController@getProgram')->name('d_program');
Route::get('/system/reference/program/pagination','Reference\ProgramController@getProgramByPage')->name('d_get_program_by_page');
Route::get('/system/reference/program/search','Reference\ProgramController@getProgramSearch')->name('d_get_program_search');
Route::get('/system/reference/program/add-form','Reference\ProgramController@getAddForm')->name('d_add_program');
Route::post('/system/reference/add-program','Reference\ProgramController@store')->name('a_program');

// Unit Program  Routes
Route::get('/system/reference/unit-program','Reference\UnitProgramController@index')->name('r_unit_program');
Route::get('/system/reference/unit-program/all','Reference\UnitProgramController@getUnitProgram')->name('d_unit_program');
Route::get('/system/reference/unit-program/pagination','Reference\UnitProgramController@getUnitProgramByPage')->name('d_get_unit_program_by_page');
Route::get('/system/reference/unit-program/search','Reference\UnitProgramController@getUnitProgramSearch')->name('d_get_unit_program_search');
Route::get('/system/reference/unit-program/add-form','Reference\UnitProgramController@getAddForm')->name('d_add_unit_program');
Route::post('/system/reference/add-unit-program','Reference\UnitProgramController@store')->name('a_unit_program');

// Budget Line Item Routes
Route::get('/system/reference/budget-line-item','Reference\BudgetLineItemController@index')->name('r_budget_line_item');
Route::get('/system/reference/budget-line-item/all','Reference\BudgetLineItemController@getBudgetLineItem')->name('d_budget_line_item');
Route::get('/system/reference/budget-line-item/pagination','Reference\BudgetLineItemController@getBudgetLineItemByPage')->name('d_get_budget_line_item_by_page');
Route::get('/system/reference/budget-line-item/search','Reference\BudgetLineItemController@getBudgetLineItemSearch')->name('d_get_budget_line_item_search');
Route::get('/system/reference/budget-line-item/add-form','Reference\BudgetLineItemController@getAddForm')->name('d_add_budget_line_item');
Route::post('/system/reference/add-budget-line-item','Reference\BudgetLineItemController@store')->name('a_budget_line_item');

// Output Function Routes
Route::get('/system/reference/output-function','OutputFunctionController@index')->name('r_output_function');
Route::get('/system/reference/output-function/all','OutputFunctionController@getOutputFunction')->name('d_output_function');
Route::get('/system/reference/output-function/pagination','OutputFunctionController@getOutputFunctionByPage')->name('d_get_output_function_by_page');
Route::get('/system/reference/output-function/search','OutputFunctionController@getOutputFunctionBySearch')->name('d_get_output_function_search');
Route::get('/system/reference/output-function/add-form','OutputFunctionController@getAddForm')->name('d_add_output_function');
Route::post('/system/reference/add-output-function','OutputFunctionController@store')->name('a_output_function');

// Office Unit Routes
Route::get('/system/reference/office-unit','Reference\OfficeUnitController@index')->name('r_office_unit');
Route::get('/system/reference/office-unit/all','Reference\OfficeUnitController@getOfficeUnit')->name('d_office_unit');
Route::get('/system/reference/office-unit/pagination','Reference\OfficeUnitController@getOfficeUnitByPage')->name('d_get_office_unit_by_page');
Route::get('/system/reference/office-unit/search','Reference\OfficeUnitController@getOfficeUnitSearch')->name('d_get_office_unit_search');
Route::get('/system/reference/office-unit/add-form','Reference\OfficeUnitController@getAddForm')->name('d_add_office_unit');
Route::post('/system/reference/add-office-unit','Reference\OfficeUnitController@store')->name('a_office_unit');

// Activity Category Routes
Route::get('/system/reference/activity-category','Reference\ActivityCategoryController@index')->name('r_activity_category');
Route::get('/system/reference/activity-category/all','Reference\ActivityCategoryController@getActivityCategory')->name('d_activity_category');
Route::get('/system/reference/activity-category/pagination','Reference\ActivityCategoryController@getActivityCategoryByPage')->name('d_get_activity_category_by_page');
Route::get('/system/reference/activity-category/search','Reference\ActivityCategoryController@getActivityCategorySearch')->name('d_get_activity_category_search');
Route::get('/system/reference/activity-category/add-form','Reference\ActivityCategoryController@getAddForm')->name('d_add_activity_category');
Route::post('/system/reference/add-activity-category','Reference\ActivityCategoryController@store')->name('a_activity_category');

// Classification Routes
Route::get('/system/reference/classification','Reference\ClassificationController@index')->name('r_classification');
Route::get('/system/reference/classification/all','Reference\ClassificationController@getClassification')->name('d_classification');
Route::get('/system/reference/classification/pagination','Reference\ClassificationController@getClassificationByPage')->name('d_get_classification_by_page');
Route::get('/system/reference/classification/search','Reference\ClassificationController@getClassificationSearch')->name('d_get_classification_search');
Route::get('/system/reference/classification/add-form','Reference\ClassificationController@getAddForm')->name('d_add_classification');
Route::post('/system/reference/add-classification','Reference\ClassificationController@store')->name('a_classification');

// Function Deliverable Routes
Route::get('/system/reference/function-deliverables','Reference\FunctionDeliverablesController@index')->name('r_function_deliverables');
Route::get('/system/reference/function-deliverables/all','Reference\FunctionDeliverablesController@getFunctionDeliverables')->name('d_function_deliverables');
Route::get('/system/reference/function-deliverables/pagination','Reference\FunctionDeliverablesController@getFunctionDeliverablesByPage')->name('d_get_function_deliverables_by_page');
Route::get('/system/reference/function-deliverables/search','Reference\FunctionDeliverablesController@getFunctionDeliverablesSearch')->name('d_get_function_deliverables_search');
Route::get('/system/reference/function-deliverables/add-form','Reference\FunctionDeliverablesController@getAddForm')->name('d_add_function_deliverables');
Route::post('/system/reference/add-function-deliverables','Reference\FunctionDeliverablesController@store')->name('a_function_deliverables');

// Item Unit Routes
Route::get('/system/reference/item-unit','Reference\ItemUnitController@index')->name('r_item_unit');
Route::get('/system/reference/item-unit/all','Reference\ItemUnitController@getItemUnit')->name('d_item_unit');
Route::get('/system/reference/item-unit/pagination','Reference\ItemUnitController@getItemUnitByPage')->name('d_get_item_unit_by_page');
Route::get('/system/reference/item-unit/search','Reference\ItemUnitController@getItemUnitSearch')->name('d_get_item_unit_search');
Route::get('/system/reference/item-unit/add-form','Reference\ItemUnitController@getAddForm')->name('d_add_item_unit');
Route::post('/system/reference/add-item-unit','Reference\ItemUnitController@store')->name('a_item_unit');

// Demographic Routes
Route::get('/system/reference/demographic','Reference\LocationController@index')->name('r_location');
Route::get('/system/reference/demographic/all','Reference\LocationController@getLocation')->name('d_location');
Route::get('/system/reference/demographic/pagination','Reference\LocationController@getLocationByPage')->name('d_get_location_by_page');
Route::get('/system/reference/demographic/search','Reference\LocationController@getLocationSearch')->name('d_get_location_search');
Route::get('/system/reference/demographic/add-form','Reference\LocationController@getAddForm')->name('d_add_location');
Route::post('/system/reference/add-demographic','Reference\LocationController@store')->name('a_location');

// Source of Fund Routes
Route::get('/system/reference/source-of-funds','Reference\SourceOfFundController@index')->name('r_sof');
Route::get('/system/reference/source-of-funds/all','Reference\SourceOfFundController@getFundSource')->name('d_sof');
Route::get('/system/reference/source-of-funds/pagination','Reference\SourceOfFundController@getFundSourceByPage')->name('d_get_sof_by_page');
Route::get('/system/reference/source-of-funds/search','Reference\SourceOfFundController@getFundSourceSearch')->name('d_get_sof_search');
Route::get('/system/reference/source-of-funds/add-form','Reference\SourceOfFundController@getAddForm')->name('d_add_sof');
Route::post('/system/reference/add-source-of-funds','Reference\SourceOfFundController@store')->name('a_sof');

// Year Routes
Route::get('/system/reference/year','YearsController@index')->name('r_year');
Route::get('/system/reference/year/all','YearsController@getYear')->name('d_year');
Route::get('/system/reference/year/pagination','YearsController@getYearByPage')->name('d_get_year_by_page');
Route::get('/system/reference/year/search','YearsController@getYearSearch')->name('d_get_year_search');
Route::get('/system/reference/year/add-form','YearsController@getAddForm')->name('d_add_year');
Route::post('/system/reference/add-year','YearsController@store')->name('a_year');
