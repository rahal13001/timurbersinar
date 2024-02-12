<?php

use App\Http\Controllers\admin\antrian\client\ClientController;
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

    //antrian
    Route::group(['prefix' => 'antrian'], function(){
        Route::get('lokasiantrian', function(){
            return view('admin.antrian.lokasi');
        });
        Route::get('service', function(){
            return view('admin.antrian.service');
        });
        Route::get('tambahantrian', function(){
            return view('admin.antrian.tambahclient');
        })->name("add_client");
        Route::get('/', function(){
            return view('admin.antrian.antriandashboard');
        })->name('dashboard_antrian');
    
        Route::get('detailpengantri/{client}/{kode_layanan}/{no_antrian}', [ClientController::class, 'detail'])->name('detailpengantri');
        
        Route::get('kondisiantrian', function(){
            return view('admin.antrian.kondisiantrian');
        });

        Route::get('pemanggilan/{location}', [ClientController::class, 'calling'])->name('panggilan_antri');

        Route::get('/videodisplay', function(){
            return view('admin.antrian.video');
        })->name('videoantrian');
    });
    
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

Route::group(['prefix' => 'antrian'], function(){
    Route::get('/', function () {
        return view('user.antrian.formantrian');
    })->name('user_antrian');
    Route::get('display/{location}', [ClientController::class, 'video'])->name('display_video');
    Route::get('lihat/{location}', [ClientController::class, 'panggilan'])->name('lihat_antrian');
    Route::get('antrianku/{client}/{nama}', [ClientController::class, 'antrianku'])->name('antrianku');
    Route::get('kartuantrian/{client}/{nama}', [ClientController::class, 'kartuantrian'])->name('kartuantrian');
    // Route::get('emailantrian', function(){
    //     return view('user.antrian.emailantrian');
    // });
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
