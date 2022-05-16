<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\LogoutController;

// use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Home\QuickViewController;
use App\Http\Controllers\DetailController;

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

Route::prefix('/')->group(function () {
    Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
    Route::get('admin/users/logout',[LogoutController::class,'logout']);
    
    Route::post('admin/users/login/store',[LoginController::class,'store']);
    Route::get('admin/users/register',[LoginController::class,'viewReg'])->name('register');
    Route::post('admin/users/register/store',[LoginController::class,'Reg']);


    Route::middleware(['auth'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [MainController::class, 'index'])->name('admin');
            Route::get('main', [MainController::class, 'index']);

            Route::prefix('menus')->group(function () {
                Route::get('add', [MenuController::class, 'create']);
                Route::post('add', [MenuController::class, 'store']);
                Route::get('list', [MenuController::class, 'index']);
                Route::get('edit/{menu}', [MenuController::class, 'show']);
                Route::post('edit/{menu}', [MenuController::class, 'update']);
                Route::delete('destroy', [MenuController::class, 'destroy']);
            });

            Route::prefix('products')->group(function () {
                Route::get('add', [ProductController::class, 'create']);
                Route::post('add', [ProductController::class, 'store']);
                Route::get('list', [ProductController::class, 'index']);
                Route::get('edit/{product}', [ProductController::class, 'show']);
                Route::post('edit/{product}', [ProductController::class, 'update']);
                Route::delete('destroy', [ProductController::class, 'destroy']);
            });

            Route::post('upload/services', [UploadController::class, 'store']);

            #Cart
            Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
            Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
        }); 

    });
    Route::post('services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
    Route::get('quickview/{id}', [QuickViewController::class, 'show']);
    Route::get('activation/{token}',[LoginController::class,'active']);
    Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('homepage');
    Route::get('danh-muc/{id}-{slug}.html',[App\Http\Controllers\MenuController::class, 'index']);
    Route::get('san-pham/{id}-{slug}.html',[DetailController::class, 'index']);
    Route::post('add-cart',[App\Http\Controllers\CartController::class, 'index'])->middleware('auth');
    Route::get('carts',[App\Http\Controllers\CartController::class, 'show']);
    Route::post('update-cart',[App\Http\Controllers\CartController::class, 'update']);
    Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
    Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);
});
