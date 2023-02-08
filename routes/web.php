<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CustomersController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',fn()=> redirect()->route('dashboard'));
    Route::get('/',[DashboardController::class,'dashboardView'])->name('dashboard');
    //user
    Route::prefix('user')->group(function () {
        //users view
        Route::get('/list',[UserController::class,'userListView'])->name('userList');
        Route::middleware('user.view')->group(function () {
            Route::get('/view/{id}/info',[UserController::class,'userInfo'])->name('userInfo');
        });
        //users create
        Route::middleware('user.create')->group(function () {
            Route::get('/create/form',[UserController::class,'userCreateForm'])->name('userCreateForm');
            Route::post('/create',[UserController::class,'userCreate'])->name('userCreate');
        });
        //user delete
        Route::middleware('user.delete')->group(function () {
            Route::post('/delete/{id}',[UserController::class,'userDelete'])->name('userDelete');

        });
        //user update
        Route::middleware('user.update')->group(function () {
            Route::get('permission/edit/',[UserController::class,'editPermission'])->name('editPermission');
            Route::get('/edit/{id}/form',[UserController::class,'userEditForm'])->name('userEditForm');
            Route::post('/update/{id}/user/data',[UserController::class,'userDataUpdate'])->name('userDataUpdate');
        });
    });

    //auth user routes
    Route::prefix('auth')->group(function () {
        Route::get('/profile',[AuthUserController::class,'AuthUserProfile'])->name('AuthUserProfile');
        Route::post('/password/update',[AuthUserController::class,'passwordUpdate'])->name('AuthUserPwUpdate');
        Route::post('/info/update',[AuthUserController::class,'AuthInfoUpdate'])->name('AuthInfoUpdate');
    });

    //role
    Route::prefix('role')->group(function () {

        //view
        Route::middleware('role.view')->group(function () {
            Route::get('/list',[RolesController::class,'roleListView'])->name('roleList');
        });
        //create
        Route::middleware('role.create')->group(function () {
            Route::post('/create',[RolesController::class,'roleCreate'])->name('roleCreate');
            Route::get('/create/form',[RolesController::class,'roleCreateForm'])->name('roleCreateForm');
        });
        //update
        Route::middleware('role.update')->group(function () {
            Route::get('permission/role/edit',[RolesController::class,'editPermission'])->name('roleEditPermission');
            Route::get('/edit/{id}/form',[RolesController::class,'roleEditForm'])->name('roleEditForm');
            Route::post('/update/{id}',[RolesController::class,'roleUpdate'])->name('roleUpdate');
        });
        //delete
        Route::middleware('role.delete')->group(function () {
            Route::post('/delete/{id}',[RolesController::class,'roleDelete'])->name('roleDelete');
        });

    });


});

