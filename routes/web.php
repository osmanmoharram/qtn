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
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('branches', 'BranchController');

    Route::resource('departments', 'DepartmentController');

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
});
