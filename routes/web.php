<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PortfolioController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'index'])->name('portfolio.detail');

Route::prefix('admin')->name('admin.')->middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified'
])->group(function () {
	Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
	Route::resource('categories', AdminCategoryController::class);
	Route::resource('services', AdminServiceController::class);
	Route::resource('transactions', AdminTransactionController::class);
	Route::resource('portfolios', AdminPortfolioController::class);
});
