<?php

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

//frontend
Route::get('/', [App\Http\Controllers\Frontend\LandingPageController::class, 'index'])->name('frontend.landing-page');
Route::get('/travel/search', [App\Http\Controllers\Frontend\LandingPageController::class, 'search'])->name('travel.search');
Route::group(['middleware' => ['auth']], function () {
    //Order
    Route::get('order-travel/detail/{id}', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'order_detail'])->name('frontend.order.detail');
    Route::post('order-travel', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'order_travel'])->name('frontend.order.travel');
    //Pembayaraan
    Route::get('/order-travel/{kode_order}/pembayaraan', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'metode_pembayaraan'])->name('frontend.order.pembayaraan');
    Route::put('/order-travel/{kode_order}/pembayaraan', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'order_pembayaraan'])->name('frontend.order.order-pembayaraan');
    Route::get('/order-travel/{kode_order}/status/pembayaraan', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'status_pembayaraan'])->name('frontend.order.status.pembayaraan');
    Route::put('/order-travel/callback/pembayaraan/{id}', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'callback_pembayaraan'])->name('frontend.order.callback.pembayaraan');

    //Riwayat
    Route::get('/riwayat', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'riwayatorder'])->name('frontend.riwayat.index');
    Route::get('/riwayat/detail/{id}', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'detailorder'])->name('frontend.riwayat.detail');
    //Invoice
    Route::get('/invoice-order/{id}', [App\Http\Controllers\Frontend\User\OrderTravelController::class, 'cetak_invoice'])->name('frontend.order.invoice');
});
//login
Route::get('login/google', [App\Http\Controllers\Auth\Google\GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/redirrect', [App\Http\Controllers\Auth\Google\GoogleController::class, 'handleGoogleCallback']);
//backend
Route::group(['middleware' => ['role:Admin'], 'prefix' => 'backend'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard.index');
    Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
        Route::get('/user', [App\Http\Controllers\Backend\Admin\User\UserController::class, 'index'])->name('backend.user.index');
        Route::get('/user/tambah', [App\Http\Controllers\Backend\Admin\User\UserController::class, 'tambah'])->name('backend.user.tambah');
        Route::post('/user/tambah/simpan', [App\Http\Controllers\Backend\Admin\User\UserController::class, 'simpan'])->name('backend.user.simpan');
        Route::delete('/user/{id}/hapus', [App\Http\Controllers\Backend\Admin\User\UserController::class, 'hapus'])->name('backend.user.hapus');
        //role
        Route::get('/role', [App\Http\Controllers\Backend\Admin\Role\RoleController::class, 'index'])->name('backend.role.index');
        Route::post('/role/tambah', [App\Http\Controllers\Backend\Admin\Role\RoleController::class, 'tambah'])->name('backend.role.tambah');
        Route::put('/role/{id}/edit', [App\Http\Controllers\Backend\Admin\Role\RoleController::class, 'edit'])->name('backend.role.edit');
        Route::delete('/role/{id}/hapus', [App\Http\Controllers\Backend\Admin\Role\RoleController::class, 'hapus'])->name('backend.role.hapus');
        //permission
        Route::get('/permission', [App\Http\Controllers\Backend\Admin\Permission\PermissionController::class, 'index'])->name('backend.permission.index');
        Route::post('/permission/tambah', [App\Http\Controllers\Backend\Admin\Permission\PermissionController::class, 'tambah'])->name('backend.permission.tambah');
        Route::put('/permission/{id}/edit', [App\Http\Controllers\Backend\Admin\Permission\PermissionController::class, 'edit'])->name('backend.permission.edit');
        Route::delete('/permission/{id}/hapus', [App\Http\Controllers\Backend\Admin\Permission\PermissionController::class, 'hapus'])->name('backend.permission.hapus');
        //Jadwal Travel
        Route::get('/jadwal-travel', [App\Http\Controllers\Backend\Admin\JadwalTravel\JadwalTravelController::class, 'index'])->name('backend.jadwal-travel.index');
        Route::post('/jadwal-travel/tambah', [App\Http\Controllers\Backend\Admin\JadwalTravel\JadwalTravelController::class, 'tambah'])->name('backend.jadwal-travel.tambah');
        Route::put('/jadwal-travel/{id}/edit', [App\Http\Controllers\Backend\Admin\JadwalTravel\JadwalTravelController::class, 'edit'])->name('backend.jadwal-travel.edit');
        Route::delete('/jadwal-travel/{id}/hapus', [App\Http\Controllers\Backend\Admin\JadwalTravel\JadwalTravelController::class, 'hapus'])->name('backend.jadwal-travel.hapus');
        //Travel
        Route::get('laporan/travel', [App\Http\Controllers\Backend\Admin\Travel\TravelController::class, 'index'])->name('backend.travel.index');
        Route::get('/laporan/travel/transaksi', [App\Http\Controllers\Backend\Admin\Travel\TravelController::class, 'transaksi'])->name('backend.travel.transaksi');
        Route::get('laporan/travel/{id}/riwayat', [App\Http\Controllers\Backend\Admin\Travel\TravelController::class, 'riwayatOrder'])->name('backend.travel.riwayat');
    });
});

Auth::routes();
