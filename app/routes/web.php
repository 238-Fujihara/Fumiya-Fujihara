<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EdmondsPostController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DeactiveController;
use App\Http\Controllers\SeattlePostController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BadbuttonController;
use App\Http\Controllers\ViolationController;






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
Auth::routes();
Route::get('/',[DisplayController::class, 'index']);
Route::get('/public/edmonds', [DisplayController::class, 'PublicEdmonds'])->name('public.edmonds');
Route::get('/public/seattle', [DisplayController::class, 'PublicSeattle'])->name('public.seattle');

Route::group(['middleware' => ['can:admin_only']], function () {
    Route::get('/adminpage', 'adminController@adminpage')->name('adminpage');
    Route::resource('/admin', 'ProfileController')->only(['index', 'store', 'update', 'destroy']);
    Route::resource('/badbuttons', 'BadbuttonController');
});
Route::group(['middleware'=> 'auth'], function() {
    Route::get('/edviolationform/{id}', [ViolationController::class, 'edviolationform'])->name('edviolation');
    Route::post('/edviolation', [ViolationController::class, 'edviolation'])->name('store.edviolation');
    Route::get('/seaviolationform/{id}', [ViolationController::class, 'seaviolationform'])->name('seaviolation');
    Route::post('/seaviolation', [ViolationController::class, 'seaviolation'])->name('store.seaviolation');


    Route::get('mainpage',[DisplayController::class, 'userlist'])->name('userlist');
    Route::get('/mypage', [DisplayController::class, 'MyPage'])->name('my.page');
    Route::resource('/edmondsPost', 'EdmondsPostController');
    Route::resource('/seattlePost','SeattlePostController');
    Route::resource('/user', 'UserController');


    Route::get('create_edmonds', [RegistrationController::class, 'createEdmondsForm'])->name('create.edmonds');
    Route::post('/create_edmonds', [RegistrationController::class, 'createEdmonds'])->name('store.edmonds');
    Route::get('create_seattle', [RegistrationController::class, 'createSeattleForm'])->name('create.seattle');
    Route::post('/create_seattle', [RegistrationController::class, 'createSeattle'])->name('store.seattle');
});

