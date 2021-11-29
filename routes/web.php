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

Route::get('customers/export',[\App\Http\Controllers\CustomerController::class,'export'])->name('customers.export');
Route::get('customers/export_view',[\App\Http\Controllers\CustomerController::class,'export_view'])->name('customers.export_view');
Route::get('customers/export_store',[\App\Http\Controllers\CustomerController::class,'export_store'])->name('customers.export_store');
Route::get('customers/export_format/{format}',[\App\Http\Controllers\CustomerController::class,'export_format'])->name('customers.export_format');
Route::get('customers/export_sheets',[\App\Http\Controllers\CustomerController::class,'export_sheets'])->name('customers.export_sheets');
Route::get('customers/export_headingRow',[\App\Http\Controllers\CustomerController::class,'export_headingRow'])->name('customers.export_headingRow');
Route::get('customers/export_mapping',[\App\Http\Controllers\CustomerController::class,'export_mapping'])->name('customers.export_mapping');
Route::get('customers/export_styling',[\App\Http\Controllers\CustomerController::class,'export_styling'])->name('customers.export_styling');
Route::get('customers/export_autosize',[\App\Http\Controllers\CustomerController::class,'export_autosize'])->name('customers.export_autosize');
Route::resource('customers',\App\Http\Controllers\CustomerController::class);
