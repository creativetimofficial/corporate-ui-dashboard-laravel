<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');

Route::get('/dashboard', function () {return view('dashboard'); })->name('dashboard')->middleware('auth');

Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])->middleware('guest')->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest');

Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/expenses-data', [DashboardController::class, 'getExpensesData'])->name('expenses.data');


Route::resource('products', ProductController::class)->middleware('auth')->middleware('auth');
// Route::get('/product-usage/{product}', [ProductController::class, 'getProductUsage']);
// Route::get('/product-expenses-chart', 'ProductExpensesChartController@index');

Route::resource('suppliers', SupplierController::class)->middleware('auth');

Route::resource('stocks', StockController::class)->middleware('auth');

Route::put('stocks/update-stock', [ProductController::class, 'updateStock'])->name('stocks.update-stock');
Route::post('/update-stock', [ProductController::class, 'updateStock'])->name('products.update-stock');
// Route::get('stocks', [ProductController::class, 'editQuantities'])->name('products.editQuantities');


Route::post('/save-inventory-records', [ProductController::class, 'saveInventoryRecord'])->name('inventory.saveRecords');

Route::post('/log-usage', [ProductController::class, 'logUsage'])->name('product.logUsage');


// Route::put('stocks/stock-update', [StockController::class,'updateStock'])->name('stocks.stock-update');
// Route::put('stocks/{stock}', [StockController::class, 'update'])->name('stocks.update');
// Route::get('stocks', StockController::class)->middleware('auth');
// Route::post('stocks/update', 'StockController@update')->name('stocks.update');
//Manual web routing
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');