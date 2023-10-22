<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Initial commit
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Middleware routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('get-customers', [CustomerController::class, 'index']);
    Route::resource('applications', ApplicationController::class);
    Route::get('process-nbn-applications', [ApplicationController::class, 'processNbnApplications']);
});


