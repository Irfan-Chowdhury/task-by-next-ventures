<?php

use App\Http\Controllers\AuthController;
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

    Route::prefix('/roles')->group(function () {
        Route::controller(RoleController::class)->group(function () {
            Route::get('/', 'index')->middleware('permission:role-view');
            Route::post('/', 'store')->middleware('permission:role-store');
            Route::get('/{id}', 'show')->middleware('permission:role-view');
            Route::patch('/{id}', 'update')->middleware('permission:role-edit');
            Route::delete('/{id}', 'destroy')->middleware('permission:role-delete');
        });
    });

    Route::prefix('/users')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'index')->middleware('permission:user-view');
            Route::post('/', 'store')->middleware('permission:user-store');
            Route::get('/{user}', 'show')->middleware('permission:user-view');
            Route::patch('/{user}', 'update')->middleware('permission:user-edit');
            Route::delete('/{user}', 'destroy')->middleware('permission:user-delete');
        });
    });


    Route::post('/assign-permissions-to-role',[RoleController::class, 'assignPermissionsToRole']);
    Route::post('logout', [AuthController::class, 'logout']);
});
