<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportCsvController;
use App\Http\Controllers\ReportingController;

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
    return view('/login_register_page');
});

//add asset to database
Route::get('/add-asset', [AssetController::class,'create']);
//add assetfunction
Route::post('add', [AssetController::class, 'add']);
Route::get('get_asset_list',[AssetController::class, 'get_asset_list']);
Route::get('assetdelete/{id}',[AssetController::class, 'assetdelete']);
Route::post('update_asset', [AssetController::class,'update_asset']);
Route::get('get_edit_info/{id}',[AssetController::class, 'get_edit_info']);
Route::get('assetedit/{id}',[AssetController::class, 'assetedit']);
Route::get('get_copy_info/{id}',[AssetController::class, 'get_copy_info']);
Route::post('add_copy', [AssetController::class, 'add_copy']);



//Function to redeliver asset
Route::get('get_delivered_asset_list',[AssetController::class, 'get_delivered_asset_list']);
Route::get('redeliver_asset/{serial_number}',[AssetController::class, 'redeliver_asset']);
Route::get('delivered_asset_Searching',[AssetController::class, 'delivered_asset_Searching']);
Route::post('delivered_asset_Searching',[AssetController::class, 'delivered_asset_Searching']);

//Function to deliver (Pending) asset
Route::get('get_pending_asset_list',[AssetController::class, 'get_pending_asset_list']);
Route::get('deliver_asset/{serial_number}',[AssetController::class, 'deliver_asset']);
Route::get('pending_asset_Searching',[AssetController::class, 'pending_asset_Searching']);
Route::post('pending_asset_Searching',[AssetController::class, 'pending_asset_Searching']);

//Function to get overdue asset
Route::get('overdate', [AssetController::class, 'overdate']);

//For login/register/forget password
Route::get('/main', [MainController::class, 'index']);
Route::post('/main/checklogin', [MainController::class, 'checklogin']);
Route::get('/main/successlogin',[MainController::class, 'successlogin']);
Route::get('/main/staffsuccesslogin',[MainController::class, 'staffsuccesslogin']);
Route::get('/main/logout', [MainController::class, 'logout']);
Route::post('/main/registeruser', [MainController::class, 'registeruser']);
Route::post('/main/updatepassword', [MainController::class, 'updatepassword']);
Route::get('/forgot_password', function () {
    return view('/forgot_password');
});

//For manage account
Route::get('/main/get_account_detail',[MainController::class, 'get_account_detail']);
Route::get('main/makesystemadmin/{email}',[MainController::class, 'makesystemadmin']);
Route::get('main/systemadmindelete/{email}',[MainController::class, 'systemadmindelete']);


//For manage_category
Route::get('get_category_detail',[CategoryController::class, 'get_category_detail']);
Route::post('add_category',[CategoryController::class, 'add_category']);
Route::get('categorydelete/{id}',[CategoryController::class, 'categorydelete']);
Route::get('/exportcategory',[CategoryController::class, 'categoryexportCsv']);

//For manage_vessel
Route::get('get_vessel_detail',[VesselController::class, 'get_vessel_detail']);
Route::post('add_vessel',[VesselController::class, 'add_vessel']);
Route::get('vesseldelete/{id}',[VesselController::class, 'vesseldelete']);
Route::get('/exportvessel',[VesselController::class, 'vesselexportCsv']);

//For manage_vendor
Route::get('get_vendor_detail',[VendorController::class, 'get_vendor_detail']);
Route::post('add_vendor',[VendorController::class, 'add_vendor']);
Route::get('vendordelete/{id}',[VendorController::class, 'vendordelete']);
Route::get('/exportvendor',[VendorController::class, 'vendorexportCsv']);

//For manage_state
Route::get('get_state_detail',[StateController::class, 'get_state_detail']);
Route::post('add_state',[StateController::class, 'add_state']);
Route::get('statedelete/{id}',[StateController::class, 'statedelete']);
Route::get('/exportstate',[StateController::class, 'stateexportCsv']);

//For reporting page and advance reporting function
Route::get('reportinginfo',[ReportingController::class, 'reportinginfo']);
Route::get('advanceReportSearching',[ReportingController::class, 'advanceReportSearching']);
Route::post('advanceReportSearching',[ReportingController::class, 'advanceReportSearching']);

//For CPU List
Route::get('get_win1011_detail',[CPUController::class, 'get_win1011_detail']);
Route::get('get_win7_detail',[CPUController::class, 'get_win7_detail']);
Route::get('get_winXP_detail',[CPUController::class, 'get_winXP_detail']);
Route::get('get_oldCPU_detail',[CPUController::class, 'get_oldCPU_detail']);
Route::get('get_de81_detail',[CPUController::class, 'get_de81_detail']);
// Route::get('/exportde81',[CPUController::class, 'de81exportCsv']);
Route::post('de81exportCsv',[CPUController::class, 'de81exportCsv']);
Route::get('de81exportCsv',[CPUController::class, 'de81exportCsv']);