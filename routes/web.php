<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OathController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


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
//     return view('pages.admin.index');
// });


Route::prefix('admin-panel')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
});

Route::get('register',[LoginController::class,'register'])->name('register');

// Oath Athenthication
Route::get('/login/{provider}',[OathController::class,'redirectToProvider'])->name('google');
Route::get('/login/{provider}/callback',[OathController::class,'handleProviderCallback']);


Route::get('/test',function(){
    auth()->logout();
});
