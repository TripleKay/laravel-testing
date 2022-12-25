<?php

use App\Models\Campaign;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\CampaignMailController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Other\ApplicationController;

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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});


//Auth
Route::get('/amct-admin-login', [AuthController::class, 'login'])->name('login');
Route::post('/amct-admin-login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/edit-password', [AuthController::class, 'editPassword'])->name('editPassword')->middleware('auth');
Route::post('/edit-password', [AuthController::class, 'updatePassword'])->name('updatePassword')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    //dashboard
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //profile
    Route::get('/edit-profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::post('/edit-profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    //brands
    Route::get('/brands', [BrandController::class, 'index'])->name('brand');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brands/create', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brands/{brand}', [BrandController::class, 'detail'])->name('brand.detail');
    Route::get('/brands/edit/{brand}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brands/edit/{brand}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');

    Route::get('/brands/datatable/ssd', [BrandController::class, 'serverSide']);
});


Route::get('image/{filename}', [ApplicationController::class, 'image'])->where('filename', '.*');