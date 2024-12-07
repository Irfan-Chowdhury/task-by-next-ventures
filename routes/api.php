<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/permissions',PermissionController::class);
    Route::apiResource('/roles',RoleController::class);
    Route::post('/assign-permissions-to-role',[RoleController::class, 'assignPermissionsToRole']);
    Route::post('logout', [AuthController::class, 'logout']);
});
