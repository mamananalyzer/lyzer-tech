<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CRMController;

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
Route::get('/CRM/{id_user}/edit', [CRMController::class, 'edit'])->name('CRM.edit');
Route::delete('/CRM/{id_user}', [CRMController::class, 'destroy'])->name('CRM.destroy');
Route::get('/CRM/{id_user}/suspend', [CRMController::class, 'suspend'])->name('CRM.suspend');