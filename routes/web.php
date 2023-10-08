<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MDRKShantoController;
use App\Http\Controllers\AdminHomeController;

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

Route::controller(MDRKShantoController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/get/contents','getContents');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/home', 'index')->name('admin.home');
    });

    Route::controller(AdminHomeController::class)->group(function () {
        Route::post('/admin/create-home-name', 'createName');
        Route::post('/get/home/name','getHomeName');
        Route::post('/create/home/subtitle','createSubtitle');
        Route::post('/get/home/subtitle','getSubtitles');
        Route::post('/delete/home/{id}/subtitle','deleteSubtitle');
        Route::post('/create/home/social-media','createSocialMedia');
        Route::post('/get/home/social-media','getSocialMedia');
        Route::post('/delete/home/{id}/social-media','deleteSocialMedia');
        Route::post('/create-or-update/home/button','createOrUpdateButton');
        Route::post('/get/home/download/button','getDownloadButton');
        Route::post('/get/home/contact/button','getContactButton');
    });
});

Route::get('/test', [MDRKShantoController::class, 'getContents']);