<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CustomersController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {

// })->name('dashboard');





// Route::prefix('admin')->group(function () {

// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',fn()=> redirect()->route('dashboard'));
    Route::get('/',[DashboardController::class,'dashboardView'])->name('dashboard');

    //user routes
    Route::prefix('user')->group(function () {
        Route::get('/list',[UserController::class,'userListView'])->name('userList');

        Route::get('/create/form',[UserController::class,'userCreateForm'])->name('userCreateForm');
        Route::post('/create',[UserController::class,'userCreate'])->name('userCreate');
        Route::post('/delete/{id}',[UserController::class,'userDelete'])->name('userDelete');

        Route::get('/edit/{id}/form',[UserController::class,'userEditForm'])->name('userEditForm');
        Route::post('/update/{id}/user/data',[UserController::class,'userDataUpdate'])->name('userDataUpdate');
        Route::get('/view/{id}/info',[UserController::class,'userInfo'])->name('userInfo');
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
        Route::get('/list',[RolesController::class,'roleListView'])->name('roleList');

        //create
        Route::post('/create',[RolesController::class,'roleCreate'])->name('roleCreate');
        Route::get('/create/form',[RolesController::class,'roleCreateForm'])->name('roleCreateForm');

        //update
        Route::get('/edit/{id}/form',[RolesController::class,'roleEditForm'])->name('roleEditForm');
        Route::post('/update/{id}',[RolesController::class,'roleUpdate'])->name('roleUpdate');

        //delete
        Route::post('/delete/{id}',[RolesController::class,'roleDelete'])->name('roleDelete');
    });

    //customer
    Route::prefix('customer')->group(function () {
        Route::get('/list',[CustomersController::class,'customerList'])->name('customerList');

    });
});

