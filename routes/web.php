<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'export/customers','as'=>'exportCustomers.'],function (){
//Export Excel
Route::get('/', [\App\Http\Controllers\CustomerExportController::class,'index'])->name('index');
Route::get('/export', [\App\Http\Controllers\CustomerExportController::class, 'export'])->name('export');
Route::get('/export_view', [\App\Http\Controllers\CustomerExportController::class, 'export_view'])->name('export_view');
Route::get('/export_store', [\App\Http\Controllers\CustomerExportController::class, 'export_store'])->name('export_store');
Route::get('/export_format/{format}', [\App\Http\Controllers\CustomerExportController::class, 'export_format'])->name('export_format');
Route::get('/export_sheets', [\App\Http\Controllers\CustomerExportController::class, 'export_sheets'])->name('export_sheets');
Route::get('/export_headingRow', [\App\Http\Controllers\CustomerExportController::class, 'export_headingRow'])->name('export_headingRow');
Route::get('/export_mapping', [\App\Http\Controllers\CustomerExportController::class, 'export_mapping'])->name('export_mapping');
Route::get('/export_styling', [\App\Http\Controllers\CustomerExportController::class, 'export_styling'])->name('export_styling');
Route::get('/export_autosize', [\App\Http\Controllers\CustomerExportController::class, 'export_autosize'])->name('export_autosize');
Route::get('/export_dateformat', [\App\Http\Controllers\CustomerExportController::class, 'export_dateformat'])->name('export_dateformat');
});

Route::group(['prefix'=>'import/customers','as'=>'importCustomers.'],function (){
    Route::get('/', [\App\Http\Controllers\CustomerImportController::class,'index'])->name('index');
    Route::post('/import', [\App\Http\Controllers\CustomerImportController::class,'import'])->name('import');
});
//Import Excel

