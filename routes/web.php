<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', ApplicationController::class)->where('view', '(.*)')->middleware('auth');

Route::middleware('auth:sanctum')->group(function () {
    //Ajsutes basicos de la WebService
    Route::get('/web/users', [UserController::class, 'index']);//Usuarios para el sistema
    Route::get('/web/profile', [UserController::class, 'profile']);//Usuarios para el sistema
    Route::get('/web/get_users', [UserController::class, 'get_all_users']); //Todos los datos del usuario 
    Route::post('/web/users', [UserController::class, 'store']);
    Route::put('/web/users/{user}', [UserController::class, 'update']);
    Route::delete('/web/users/{user}', [UserController::class, 'destroy']);
    Route::delete('/web/users', [UserController::class, 'bulkDelete']);
    Route::get('/web/change_theme', [UserController::class, 'change_theme']);
    Route::get('/web/roles', [UserController::class, 'get_roles']);

    Route::resource('/web/permissions', PermissionController::class);
    Route::get('/web/permissions_unpaged', [PermissionController::class, 'index_unpaged']);
    Route::get('/web/permissions_unpaged_id/{id}', [PermissionController::class, 'index_unpaged_id']);

    Route::get('/web/companies', [CompanyController::class, 'index']);
});

Route::get('{view}', ApplicationController::class)->where('view', '(.*)')->middleware('auth');
