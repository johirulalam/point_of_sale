<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;



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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);



Route::middleware(['auth'])->group(function(){


// Customer ROUTE ARE HERE  
	Route::get('/add-customer', [CustomerController::class, 'addCustomer'])->name('add.customer');
	Route::post('/add-customer', [CustomerController::class, 'storeCustomer']);
	Route::get('/all-customer', [CustomerController::class, 'showAllCustomer'])->name('all.customer');
	Route::get('/delete-customer/{id}', [SupplierController::class, 'deleteCustomer'])->name('delete.customer');
	Route::get('/edit-customer/{id}', [SupplierController::class, 'editCustomer'])->name('edit.customer');
	Route::post('/edit-customer/{id}', [SupplierController::class, 'updateCustomer']);
	Route::get('/view-customer/{customer_name}', [SupplierController::class, 'viewCustomer'])->name('view.customer');


// EMPLOYEE ROUTE ARE HERE  
	Route::get('/add-employee', [EmployeeController::class, 'addEmployee'])->name('add.employee');
	Route::post('/add-employee', [EmployeeController::class, 'storeEmployee']);
	Route::get('/all-employee', [EmployeeController::class, 'showAllEmployee'])->name('all.employee');
	Route::get('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee'])->name('delete.employee');
	Route::get('/edit-employee/{id}', [EmployeeController::class, 'editEmployee'])->name('edit.employee');
	Route::post('/edit-employee/{id}', [EmployeeController::class, 'updateEmployee']);



// CASH ROUTE ARE HERE  
	Route::get('/add-cash', [CashController::class, 'addCash'])->name('add.cash');
	Route::post('/add-cash', [CashController::class, 'storeCash']);
	Route::get('/all-cash', [CashController::class, 'showAllCash'])->name('all.cash');
	Route::get('/delete-cash/{id}', [CashController::class, 'deleteCash'])->name('delete.cash');
	Route::get('/edit-cash/{id}', [CashController::class, 'editCash'])->name('edit.cash');
	Route::post('/edit-cash/{id}', [CashController::class, 'updateCash']);





// PRODUCT ROUTE ARE HERE  
	Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add.product');
	Route::post('/add-product', [ProductController::class, 'storeProduct']);
	Route::get('/all-product', [ProductController::class, 'showAllProduct'])->name('all.product');
	Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
	Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
	Route::post('/edit-product/{id}', [ProductController::class, 'updateProduct']);




// SUPPLIER ROUTE ARE HERE  
	Route::get('/add-supplier', [SupplierController::class, 'addSupplier'])->name('add.supplier');
	Route::post('/add-supplier', [SupplierController::class, 'storeSupplier']);
	Route::get('/all-supplier', [SupplierController::class, 'showAllSupplier'])->name('all.supplier');
	Route::get('/delete-supplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('delete.supplier');
	Route::get('/edit-supplier/{id}', [SupplierController::class, 'editSupplier'])->name('edit.supplier');
	Route::post('/edit-supplier/{id}', [SupplierController::class, 'updateSupplier']);
	Route::get('/view-supplier/{supplier_name}', [SupplierController::class, 'viewSupplier'])->name('view.supplier');





// STOCK ROUTE ARE HERE  
	Route::get('/add-stock', [StockController::class, 'addStock'])->name('add.stock');
	Route::post('/add-stock', [StockController::class, 'storeStock']);
	Route::get('/all-stock', [StockController::class, 'showAllStock'])->name('all.stock');
	Route::get('/delete-stock/{id}', [StockController::class, 'deleteStock'])->name('delete.stock');
	Route::get('/edit-stock/{id}', [StockController::class, 'editStock'])->name('edit.stock');
    Route::post('/edit-stock/{id}', [StockController::class, 'updateStock']);




// SALE ROUTE ARE HERE  
	Route::get('/add-sale', [SaleController::class, 'addSale'])->name('add.sale');
	Route::post('/add-sale', [SaleController::class, 'storeSale']);
	Route::get('/all-sale', [SaleController::class, 'showAllSale'])->name('all.sale');
	Route::get('/delete-sale/{id}', [SaleController::class, 'deleteSale'])->name('delete.sale');
	Route::get('/edit-sale/{id}', [SaleController::class, 'editSale'])->name('edit.sale');
    Route::post('/edit-sale/{id}', [SaleController::class, 'updateSale']);



// POS SALE ROUTE ARE HERE
   Route::get('/pos', [PosController::class, 'addPos'])->name('pos.sale');


// CART ROUTE ARE HERE
   Route::post('/add-cart', [CartController::class, 'addCart'])->name('add.cart');
   Route::post('/update-cart/{rowId}', [CartController::class, 'updateCart'])->name('update.cart');
   Route::get('/update-cart/{rowId}', [CartController::class, 'removeSingleCart'])->name('remove.cart');
   Route::post('/create-sale', [CartController::class, 'createSale'])->name('create.sale');




});

require __DIR__.'/auth.php';
