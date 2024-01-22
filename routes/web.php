<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function(){

    Route::get('login', [AuthController::class, 'getLogin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'postLogin']);

    Route::get('logout', [AuthController::class, 'getLogout'])->name('admin.logout');


    Route::middleware('auth.admin')->group(function(){
        Route::get('admins', [AdminsController::class, 'getAdmin'])->name('admin.admins');
        Route::post('admins', [AdminsController::class, 'postAdmin']);

        Route::get('home', [HomeController::class, 'getHome'])->name('admin.home');;

        Route::get('products', [ProductsController::class, 'getProducts']);
        Route::post('products', [ProductsController::class, 'PostProducts']);

        Route::get('product-details/{id}', [ProductsController::class, 'getProducts']);
        // Route::post('products', [ProductsController::class, 'PostProducts']);

    });
});
