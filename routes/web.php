<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\ProductController;

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

Route::redirect('/', '/base');
Route::get('/base', function () {
    return view('base.index');
});
Route::get('/users', function () {
    return view('base.users');
});

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{id_user}/show', [UsersController::class, 'show'])->name('users.show');
Route::post('/users.store', [UsersController::class, 'store'])->name('users.create');
Route::get('/users/{id_user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id_user}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id_user}/suspend', [UsersController::class, 'suspend'])->name('users.suspend');

Route::get('/CRM', [CRMController::class, 'index']);
Route::get('/CRM/{id_user}/show', [CRMController::class, 'show'])->name('CRM.show');
Route::post('/CRM.store', [CRMController::class, 'store'])->name('CRM.create');
Route::post('/quot.store', [CRMController::class, 'quot_store'])->name('quot.create');
Route::get('/CRM/{id_user}/edit', [CRMController::class, 'edit'])->name('CRM.edit');
Route::delete('/CRM/{id_user}', [CRMController::class, 'destroy'])->name('CRM.destroy');
Route::get('/CRM/{id_user}/suspend', [CRMController::class, 'suspend'])->name('CRM.suspend');

Route::get('/belanja', [BelanjaController::class, 'index'])->name('Belanja.index');;
Route::get('/belanja/data', [BelanjaController::class, 'getData'])->name('Belanja.data');
Route::get('/belanja/{id_user}/show', [BelanjaController::class, 'show'])->name('Belanja.show');
Route::post('/belanja.store', [BelanjaController::class, 'store'])->name('Belanja.create');
Route::get('/belanja/{id_user}/edit', [BelanjaController::class, 'edit'])->name('Belanja.edit');
Route::delete('/belanja/{id_user}', [BelanjaController::class, 'destroy'])->name('Belanja.destroy');
Route::get('/belanja/{id_user}/suspend', [BelanjaController::class, 'suspend'])->name('Belanja.suspend');

Route::get('/monitoring', [MonitoringController::class, 'index']);
Route::get('/monitoring/{id_user}/show', [MonitoringController::class, 'show'])->name('Monitoring.show');
Route::post('/monitoring.store', [MonitoringController::class, 'store'])->name('Monitoring.create');
Route::get('/monitoring/{id_user}/edit', [MonitoringController::class, 'edit'])->name('Monitoring.edit');
Route::delete('/monitoring/{id_user}', [MonitoringController::class, 'destroy'])->name('Monitoring.destroy');
Route::get('/monitoring/{id_user}/suspend', [MonitoringController::class, 'suspend'])->name('Monitoring.suspend');

Route::get('/daily', [DailyController::class, 'index']);
Route::get('/daily/{id_user}/show', [DailyController::class, 'show'])->name('Daily.show');
Route::post('/daily.store', [DailyController::class, 'store'])->name('Daily.create');
Route::post('/quot.store', [DailyController::class, 'quot_store'])->name('quot.create');
Route::get('/daily/{id_user}/edit', [DailyController::class, 'edit'])->name('Daily.edit');
Route::delete('/daily/{id_user}', [DailyController::class, 'destroy'])->name('Daily.destroy');
Route::get('/daily/{id_user}/suspend', [DailyController::class, 'suspend'])->name('Daily.suspend');

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id_user}/show', [ProductController::class, 'show'])->name('product.show');
Route::post('/product.store', [ProductController::class, 'store'])->name('product.create');
Route::get('/product/{id_user}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('/product/{id_user}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{id_user}/suspend', [ProductController::class, 'suspend'])->name('product.suspend');