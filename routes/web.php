<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SavecitydataController;
use App\Http\Controllers\SavePartydataController;
use App\Http\Controllers\SaveItemsdataController;
use App\Http\Controllers\SaveSalesBookdataController;
use App\Http\Controllers\SaveSalesBookDetaildataController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

Route::post('getSelectedProductData', [App\Http\Controllers\SaveSalesBookdataController::class, 'getSelectedProductData_method']);

Route::post('getBalanceOfCurrentParty', [App\Http\Controllers\SavePartydataController::class, 'getBalanceOfCurrentParty_method']);

Route::post('sendMultipleData', [App\Http\Controllers\SavePartydataController::class, 'sendMultipleData_method']);
Route::get('edit_salesbookinvoice',function(){
return view('admin/modules/SalesBook/salesbookedit');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

