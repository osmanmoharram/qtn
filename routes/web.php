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

Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {
    Route::view('/', 'home')->name('home');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('branches', 'BranchController');

    Route::resource('departments', 'DepartmentController');

    // upload employees
    Route::get('employees/upload', 'EmployeeUploadController@create')->name('employees.upload');
    Route::post('employees/upload', 'EmployeeUploadController@store')->name('employees.upload.store');

    Route::resource('employees', 'EmployeeController');

    Route::resource('categories', 'CategoryController');

    Route::resource('products', 'ProductController');

    Route::resource('customers', 'Quotations\CustomerController');

    Route::resource('quotations', 'Quotations\QuotationController');

    Route::resource('dispatches', 'Quotations\DispatchController');

    Route::resource('suppliers', 'Store\SupplierController');

    Route::resource('requests', 'Store\RequestController');

    Route::resource('proposals', 'Store\ProposalController');

    Route::resource('orders', 'Store\OrderController');

    // ajax routes
    Route::post('quotations/{quotation}/edit', 'Quotations\QuotationController@updateProductAjax');
    Route::post('dispatches/{dispatch}/edit', 'Quotations\DispatchController@updateProductAjax');
    Route::post('requests/{request}/edit', 'Store\RequestController@updateProductAjax');
    Route::post('proposals/{proposal}/edit', 'Store\ProposalController@updateProductAjax');
    Route::post('orders/{order}/edit', 'Store\OrderController@updateProductAjax');
});
