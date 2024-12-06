<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\HSEController;
use App\Http\Controllers\HSE_HazopsController;
use App\Http\Controllers\LabsController;
use App\Http\Controllers\Labs_LabelController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuickpinController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ZerotestController;

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

Route::get('/visitor', [VisitorController::class, 'index'])->name('index');


Route::redirect('/', '/base');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/account', [AccountController::class, 'index'])->name('Account.index');;
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/belanja', [BelanjaController::class, 'index'])->name('Belanja.index');;
});
Route::group(['middleware' => ['checkRole:1,9']], function() {
    Route::get('/CRM', [CRMController::class, 'index']);
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/daily', [DailyController::class, 'index'])->name('daily.index');
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/HSE', [HSEController::class, 'index'])->name('HSE.index');
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/HSE_Hazops', [HSE_HazopsController::class, 'index'])->name('HSE_Hazops.index');
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/Labs', [LabsController::class, 'index']);
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/Labs_Label', [LabsController::class, 'index']);
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/monitoring-realtime', [MonitoringController::class, 'index']);
});
Route::group(['middleware' => ['checkRole:1,14']], function() {
    Route::get('/motor', [MotorController::class, 'index']);
});
Route::group(['middleware' => ['checkRole:1,9']], function() {
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
});
Route::group(['middleware' => ['checkRole:1']], function() {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
});
Route::group(['middleware' => ['checkRole:1,2,3,4,5,6,7,8,9,10,11,12,13']], function() {
    Route::get('/quickpin', [QuickpinController::class, 'index'])->name('quickpin.index');
});
Route::group(['middleware' => ['checkRole:1,2,3,4,5,6,7,8,9,10,11,12,13']], function() {
    Route::get('/zerotest', [ZerotestController::class, 'index'])->name('zerotest.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/base', function () {
        return view('base.index');
    });

    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

    // Route::get('/belanja', [BelanjaController::class, 'index'])->name('Belanja.index');;
    Route::get('/belanja/data', [BelanjaController::class, 'getData'])->name('Belanja.data');
    Route::get('/belanja/{id_user}/show', [BelanjaController::class, 'show'])->name('Belanja.show');
    Route::post('/belanja.store', [BelanjaController::class, 'store'])->name('Belanja.create');
    Route::get('/belanja/{id_user}/edit', [BelanjaController::class, 'edit'])->name('Belanja.edit');
    Route::delete('/belanja/{id_user}', [BelanjaController::class, 'destroy'])->name('Belanja.destroy');
    Route::get('/belanja/{id_user}/suspend', [BelanjaController::class, 'suspend'])->name('Belanja.suspend');

    // Route::get('/CRM', [CRMController::class, 'index']);
    Route::get('CRM/data', [CRMController::class, 'getData'])->name('CRM.data');
    Route::get('/CRM/{id_user}/show', [CRMController::class, 'show'])->name('CRM.show');
    Route::post('/CRM.store', [CRMController::class, 'store'])->name('CRM.create');
    Route::post('/quot.store', [CRMController::class, 'quot_store'])->name('quot.create');
    Route::get('/CRM/{id_user}/edit', [CRMController::class, 'edit'])->name('CRM.edit');
    Route::delete('/CRM/{id_user}', [CRMController::class, 'destroy'])->name('CRM.destroy');
    Route::get('/CRM/{id_user}/suspend', [CRMController::class, 'suspend'])->name('CRM.suspend');

    // Route::get('/CRM', [CRMController::class, 'index']);
    Route::get('customers/data', [CRMController::class, 'customer_getData'])->name('Customers.data');
    Route::get('/customers/{id_user}/show', [CRMController::class, 'customers_show'])->name('Customers.show');
    Route::post('/customers.store', [CRMController::class, 'customers_store'])->name('Customers.create');
    // Route::post('/quot.store', [CRMController::class, 'quot_store'])->name('quot.create');
    Route::get('/customers/{id_user}/edit', [CRMController::class, 'edit'])->name('Customers.edit');
    Route::delete('/customers/{id_user}', [CRMController::class, 'destroy'])->name('Customers.destroy');
    // Route::get('/customers/{id_user}/suspend', [CRMController::class, 'suspend'])->name('Customers.suspend');

    // Route::get('/CRM', [CRMController::class, 'index']);
    Route::get('Visit/data', [CRMController::class, 'visit_getData'])->name('Visit.data');
    Route::get('/Visit/{id_user}/show', [CRMController::class, 'visit_show'])->name('Visit.show');
    Route::post('/Visit.store', [CRMController::class, 'visit_store'])->name('Visit.create');
    Route::get('/Visit/{id_user}/edit', [CRMController::class, 'visit_edit'])->name('Visit.edit');
    Route::delete('/Visit/{id_user}', [CRMController::class, 'visit_destroy'])->name('Visit.destroy');
    Route::get('/Visit/{id_user}/suspend', [CRMController::class, 'visit_suspend'])->name('Visit.suspend');

    // Route::get('/CRM', [CRMController::class, 'index']);
    Route::get('po/data', [CRMController::class, 'po_getData'])->name('Po.data');
    Route::get('/po/{id_user}/show', [CRMController::class, 'po_show'])->name('Po.show');
    Route::post('/po.store', [CRMController::class, 'po_store'])->name('Po.create');
    Route::get('/po/{id_user}/edit', [CRMController::class, 'po_edit'])->name('Po.edit');
    Route::put('/po/{CRMPo}', [CRMController::class, 'po_update'])->name('Po.update');
    Route::delete('/po/{id_user}', [CRMController::class, 'po_destroy'])->name('Po.destroy');
    Route::get('/po/{id_user}/suspend', [CRMController::class, 'po_suspend'])->name('Po.suspend');
    Route::get('/po/{filename}', [CRMController::class, 'po_download'])->name('po.direct_download');

    // Route::get('/daily', [DailyController::class, 'index']);
    Route::get('/daily/{id_user}/show', [DailyController::class, 'show'])->name('Daily.show');
    Route::post('/daily.store', [DailyController::class, 'store'])->name('Daily.create');
    // Route::post('/quot.store', [DailyController::class, 'quot_store'])->name('quot.create');
    Route::get('/daily/{id_user}/edit', [DailyController::class, 'edit'])->name('Daily.edit');
    Route::delete('/daily/{id_user}', [DailyController::class, 'destroy'])->name('Daily.destroy');
    Route::get('/daily/{id_user}/suspend', [DailyController::class, 'suspend'])->name('Daily.suspend');

    // Route::get('/HSE_Hazops', [HSE_HazopsController::class, 'index']);
    Route::get('/HSE_Hazops/data', [HSE_HazopsController::class, 'getData'])->name('HSE_Hazops.data');
    Route::get('/HSE_Hazops/{id_hse}/show', [HSE_HazopsController::class, 'show'])->name('HSE_Hazops.show');
    Route::post('/HSE_Hazops.store', [HSE_HazopsController::class, 'store'])->name('HSE_Hazops.create');
    Route::get('/HSE_Hazops/{id_hse}/edit', [HSE_HazopsController::class, 'edit'])->name('HSE_Hazops.edit');
    Route::delete('/HSE_Hazops/{id_hse}', [HSE_HazopsController::class, 'destroy'])->name('HSE_Hazops.destroy');
    Route::get('/HSE_Hazops/{id_hse}/suspend', [HSE_HazopsController::class, 'suspend'])->name('HSE_Hazops.suspend');

    // Route::get('/Labs', [LabsController::class, 'index']);
    Route::get('Labs/data', [LabsController::class, 'getData'])->name('Labs.data');
    Route::get('/Labs/{id_user}/show', [LabsController::class, 'show'])->name('Labs.show');
    Route::post('/Labs.store', [LabsController::class, 'store'])->name('Labs.create');
    Route::get('/Labs/{id_user}/edit', [LabsController::class, 'edit'])->name('Labs.edit');
    Route::delete('/Labs/{id_user}', [LabsController::class, 'destroy'])->name('Labs.destroy');
    Route::get('/Labs/{id_user}/suspend', [LabsController::class, 'suspend'])->name('Labs.suspend');

    // Route::get('/Labs_Label', [Labs_LabelController::class, 'index']);
    Route::get('Labs_Label/data', [Labs_LabelController::class, 'getData'])->name('Labs_Label.data');
    Route::get('/Labs_Label/{id_user}/show', [Labs_LabelController::class, 'show'])->name('Labs_Label.show');
    Route::post('/Labs_Label.store', [Labs_LabelController::class, 'store'])->name('Labs_Label.create');
    Route::get('/Labs_Label/{id_user}/edit', [Labs_LabelController::class, 'edit'])->name('Labs_Label.edit');
    Route::delete('/Labs_Label/{id_user}', [Labs_LabelController::class, 'destroy'])->name('Labs_Label.destroy');
    Route::get('/Labs_Label/{id_user}/suspend', [Labs_LabelController::class, 'suspend'])->name('Labs_Label.suspend');

    // Route::get('/monitoring', [MonitoringController::class, 'index']);
    Route::get('/monitoring/{id_user}/show', [MonitoringController::class, 'show'])->name('Monitoring.show');
    Route::post('/monitoring.store', [MonitoringController::class, 'store'])->name('Monitoring.create');
    Route::get('/monitoring/{id_user}/edit', [MonitoringController::class, 'edit'])->name('Monitoring.edit');
    Route::delete('/monitoring/{id_user}', [MonitoringController::class, 'destroy'])->name('Monitoring.destroy');
    Route::get('/monitoring/{id_user}/suspend', [MonitoringController::class, 'suspend'])->name('Monitoring.suspend');

    // Route::get('/motor', [MotorController::class, 'index']);
    Route::get('/motor/data', [MotorController::class, 'getData'])->name('Motor.data');
    Route::get('/motor/{id_user}/show', [MotorController::class, 'show'])->name('Motor.show');
    Route::post('/motor.store', [MotorController::class, 'store'])->name('Motor.create');
    Route::get('/motor/{id_user}/edit', [MotorController::class, 'edit'])->name('Motor.edit');
    Route::delete('/motor/{id_user}', [MotorController::class, 'destroy'])->name('Motor.destroy');
    Route::get('/motor/{id_user}/suspend', [MotorController::class, 'suspend'])->name('Motor.suspend');

    // Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/data', [ProductController::class, 'getData'])->name('Product.data');
    Route::get('/product/{id_user}/show', [ProductController::class, 'show'])->name('Product.show');
    Route::post('/product.store', [ProductController::class, 'store'])->name('Product.create');
    Route::get('/product/{id_user}/edit', [ProductController::class, 'edit'])->name('Product.edit');
    Route::delete('/product/{id_user}', [ProductController::class, 'destroy'])->name('Product.destroy');
    Route::get('/product/{id_user}/suspend', [ProductController::class, 'suspend'])->name('Product.suspend');

    // Route::get('/quickpin', [QuickpinController::class, 'index']);
    Route::get('/quickpin/data', [QuickpinController::class, 'getData'])->name('quickpin.data');
    Route::get('/quickpin/{id_user}/show', [QuickpinController::class, 'show'])->name('quickpin.show');
    Route::post('/quickpin.store', [QuickpinController::class, 'store'])->name('quickpin.create');
    Route::get('/quickpin/{id_user}/edit', [QuickpinController::class, 'edit'])->name('quickpin.edit');
    Route::delete('/quickpin/{id_user}', [QuickpinController::class, 'destroy'])->name('quickpin.destroy');
    Route::get('/quickpin/{id_user}/suspend', [QuickpinController::class, 'suspend'])->name('quickpin.suspend');

    // Route::get('/zerotest', [ZerotestController::class, 'index']);
    Route::get('/zerotest/data', [ZerotestController::class, 'getData'])->name('zerotest.data');
    Route::get('/zerotest/{id_user}/show', [ZerotestController::class, 'show'])->name('zerotest.show');
    Route::post('/zerotest.store', [ZerotestController::class, 'store'])->name('zerotest.create');
    Route::get('/zerotest/{id_user}/edit', [ZerotestController::class, 'edit'])->name('zerotest.edit');
    Route::delete('/zerotest/{id_user}', [ZerotestController::class, 'destroy'])->name('zerotest.destroy');
    Route::get('/zerotest/{id_user}/suspend', [ZerotestController::class, 'suspend'])->name('zerotest.suspend');
});


// Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/data', [UsersController::class, 'getData'])->name('users.data');
Route::get('/users/{id_user}', [UsersController::class, 'show'])->name('users.show');
Route::post('/users.store', [UsersController::class, 'store'])->name('users.create');
Route::post('/roles.store', [UsersController::class, 'storeRole'])->name('roles.create');
Route::get('/users/{id_user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::post('/users/update', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{id_user}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id_user}/suspend', [UsersController::class, 'suspend'])->name('users.suspend');








