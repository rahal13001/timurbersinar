<?php

use App\Http\Controllers\admin\bukutamu\GuestbooksController;
use App\Http\Controllers\admin\catalog\CatalogController;
use Illuminate\Support\Facades\Auth;
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
    return view('landing.home');
});

// Route::get('/admin', function () {
//     return view('admin.layouts.back');
// });

Route::group(['middleware' => 'auth','prefix' => 'pengelola'], function () {
    Route::get('/catalog-category-dashboard', function () {
        return view('admin.catalog.catalog_category');
    });
    
    Route::get('/catalog-add', function () {
        return view('admin.catalog.add_catalog');
    })->name('add_catalog');
    
    Route::get('/catalog', function () {
        return view('admin.catalog.catalog_dashboard');
    })->name('catalog_dashboard');
    
    Route::get('/catalog/detail/{catalog}',[CatalogController::class,'detail'])->name('catalog_detail');

    Route::get('/bukutamu', function(){
        return view('admin.bukutamu.dashboardbukutamu');
    })->name('dashboard_bukutamu');

    Route::get('tambahdatabukutamu', function(){
        return view('admin.bukutamu.tambahbukutamu');
    })->name('add_bukutamu');

    Route::get('/bukutamu/detail/{guestbook}',[GuestbooksController::class,'detail'])->name('bukutamu_detail');

});

Route::get('/publikasi/detail/{catalog}/{nama}',[CatalogController::class,'detail_user'])->name('catalog_user_detail');

Route::get('/publikasi', function () {
    return view('user.catalog.catalog_dashboard');
})->name('catalog_user_dashboard');

// Route::get('/catalog-category-dashboard', function () {
//     return view('admin.catalog.catalog_category');
// });

// Route::get('/catalog-add', function () {
//     return view('admin.catalog.add_catalog');
// })->name('add_catalog');

// Route::get('/catalog', function () {
//     return view('admin.catalog.catalog_dashboard');
// })->name('catalog_dashboard');

// Route::get('/catalog/detail/{catalog}',[CatalogController::class,'detail'])->name('catalog_detail');

Route::group(['prefix' => 'bukutamu'], function(){
    Route::get('/', function () {
        return view('user.bukutamu.formbukutamu');
    })->name('user_bukutamu');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
