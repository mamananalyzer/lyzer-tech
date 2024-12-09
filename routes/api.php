<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeteringController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::get('metering', [MeteringController::class, 'index']);
    Route::post('metering', [MeteringController::class, 'store']);
    Route::get('metering/{id}', [MeteringController::class, 'show']);
    Route::put('metering/{id}', [MeteringController::class, 'update']);
    Route::delete('metering/{id}', [MeteringController::class, 'destroy']);
});

Route::post('/device-data', function (Request $request) {
    // Log the raw request content
    Log::info('Received device data: ', ['data' => $request->getContent()]);

    // Return a response indicating that the data has been received
    return response()->json([
        'success' => true,
        'message' => 'Data received successfully!',
        'received_data' => $request->getContent(),
    ]);
});
