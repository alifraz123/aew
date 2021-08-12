<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SavecitydataController;
use App\Http\Controllers\SavePartydataController;
use App\Http\Controllers\SaveItemsdataController;
use App\Http\Controllers\SaveSalesBookdataController;
use App\Http\Controllers\SaveSalesBookDetaildataController;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});


Route::get('/admin', function () {
    
    
    return view('admin/modules/dashboard/index');
});

Route::get('/repeator', function () {
    
    
    return view('repeator');
});

Route::post('getBalanceOfCurrentParty', [App\Http\Controllers\SavePartydataController::class, 'getBalanceOfCurrentParty_method']);

Route::post('sendMultipleData', [App\Http\Controllers\SavePartydataController::class, 'sendMultipleData_method']);

Route::get('/parties', function () {
    $parties = DB::table('cities')->get();
    $count_result = DB::table('parties')->latest('PartyCode')->first();
    return view('admin/modules/Parties/company',['data'=>$parties,'pc'=>$count_result->PartyCode+1]);
});
Route::post('save_partydata', [App\Http\Controllers\SavePartydataController::class, 'save_partydata_method']);
Route::get('show_companydata', [App\Http\Controllers\SavePartydataController::class, 'show_companydata_method']);
Route::get('delete_partydata/{id}', [App\Http\Controllers\SavePartydataController::class, 'delete_companydata_method']);
Route::get('edit_partydata/{id}', [App\Http\Controllers\SavePartydataController::class, 'edit_companydata_method']);
Route::get('/partyeditform', function () {
    return view('admin/modules/Parties/companyedit');
});
Route::post('edit_companydata', [App\Http\Controllers\SavePartydataController::class, 'update_companydata_method']);


Route::get('/cities', function () {
    return view('admin/modules/Cities/city');
});
Route::post('save_citydata', [App\Http\Controllers\SavecitydataController::class, 'save_citydata_method']);
Route::get('show_citydata', [App\Http\Controllers\SavecitydataController::class, 'show_companydata_method']);
Route::get('delete_citydata/{id}', [App\Http\Controllers\SavecitydataController::class, 'delete_companydata_method']);
Route::get('edit_citydata/{id}', [App\Http\Controllers\SavecitydataController::class, 'edit_companydata_method']);
Route::get('/cityeditform', function () {
    return view('admin/modules/Cities/cityedit');
});
Route::post('edit_citydata', [App\Http\Controllers\SavecitydataController::class, 'update_companydata_method']);


Route::get('/items', function () {
    return view('admin/modules/Items/item');
});
Route::post('save_itemsdata', [App\Http\Controllers\SaveItemsdataController::class, 'save_citydata_method']);
Route::get('show_itemsdata', [App\Http\Controllers\SaveItemsdataController::class, 'show_companydata_method']);
Route::get('delete_itemsdata/{id}', [App\Http\Controllers\SaveItemsdataController::class, 'delete_companydata_method']);
Route::get('edit_itemsdata/{id}', [App\Http\Controllers\SaveItemsdataController::class, 'edit_companydata_method']);
Route::get('/itemesditform', function () {
    return view('admin/modules/Items/item');
});
Route::post('edit_itemsdata', [App\Http\Controllers\SaveItemsdataController::class, 'update_companydata_method']);



Route::get('/salesbook', function () {
    $cities = DB::table('cities')->get();
    $parties = DB::table('parties')->get();
    $items = DB::table('items')->get();
    $salebook = DB::table('salebook')->latest()->first();
       $productSaleId = 0;
        if(null || empty($salebook)){
            $productSaleId = 1;
        }
       else{
           $productSaleId = $salebook->invoice+1;
       }
        return view('admin/modules/SalesBook/salesbook',['data'=>$cities,'parties'=>$parties,'productSaleId'=>$productSaleId,'items'=>$items]);   
});

// Route::get('/getItemNamesForSaleDetail', [App\Http\Controllers\SaveSalesBookdataController::class, 'getItemNamesForSaleDetail']);



Route::post('save_salesbookdata', [App\Http\Controllers\SaveSalesBookdataController::class, 'save_partydata_method']);
Route::post('deleteProduct', [App\Http\Controllers\SaveSalesBookdataController::class, 'deleteProduct_method']);
Route::get('show_salesbookdata', [App\Http\Controllers\SaveSalesBookdataController::class, 'show_companydata_method']);

Route::post('show_salesbookdetaildata_withrespect_last_id', [App\Http\Controllers\SaveSalesBookdataController::class, 
'show_salesbookdetaildata_withrespect_last_id']);

Route::post('getSelectedProductData', [App\Http\Controllers\SaveSalesBookdataController::class, 'getSelectedProductData_method']);
Route::post('getSelectedProductData_total', [App\Http\Controllers\SaveSalesBookdataController::class, 'getSelectedProductData_total_method']);
Route::get('delete_salesbookdata/{id}', [App\Http\Controllers\SaveSalesBookdataController::class, 'delete_companydata_method']);
Route::get('delete_salesbook_product_data/{id}', [App\Http\Controllers\SaveSalesBookdataController::class, 'delete_salesbook_product_data']);
Route::get('edit_salesbookdata/{id}', [App\Http\Controllers\SaveSalesBookdataController::class, 'edit_companydata_method']);
Route::get('/salesbookditform', function () {
    return view('admin/modules/SalesBook/salesbook');
});
Route::post('edit_salesbookdata', [App\Http\Controllers\SaveSalesBookdataController::class, 'update_companydata_method']);
Route::post('addProductDetail_url', [App\Http\Controllers\SaveSalesBookdataController::class, 'addProductDetail_method']);


Route::get('/salesbookdetail', function () {
    return view('admin/modules/SalesBookDetail/salesbookdetail');
});
Route::post('save_salesbookdetaildata', [App\Http\Controllers\SaveSalesBookDetaildataController::class, 'save_partydata_method']);
Route::get('show_salesbookdetaildata', [App\Http\Controllers\SaveSalesBookDetaildataController::class, 'show_companydata_method']);

Route::get('delete_salesbookdetaildata/{id}', [App\Http\Controllers\SaveSalesBookDetaildataController::class, 'delete_companydata_method']);
Route::get('edit_salesbookdetaildata/{id}', [App\Http\Controllers\SaveSalesBookDetaildataController::class, 'edit_companydata_method']);
Route::get('/salesbookdetailditform', function () {
    return view('admin/modules/Parties/companyedit');
});
Route::post('edit_salesbookdetaildata', [App\Http\Controllers\SaveCompanydataController::class, 'update_companydata_method']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

