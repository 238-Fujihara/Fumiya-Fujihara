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

// Route::get('/',[adminController::class, 'adminindex']);
Route::get('/',[DisplayController::class, 'index']);

Route::get('/public/edmonds', [DisplayController::class, 'PublicEdmonds'])->name('public.edmonds');
Route::get('/public/seattle', [DisplayController::class, 'PublicSeattle'])->name('public.seattle');




// Auth::routes();
    Route::get('/admin', 'adminController@admin')->name('admin');
    Route::get('/adminpage', 'adminController@adminpage')->name('adminpage');

Route::group(['middleware'=> 'auth'], function() {
    // Route::post('/like/{postId}',[LikesController::class,'store']);
    // Route::post('/unlike/{postId}',[LikesController::class,'destroy']);
    // Route::get('/edmonds/post', [DisplayController::class, 'EdmondsPost'])->name('edmonds.post');
    // Route::get('/seattle/post', [DisplayController::class, 'SeattlePost'])->name('seattle.post');


    Route::get('mainpage',[DisplayController::class, 'userlist'])->name('userlist');
    Route::get('/mypage', [DisplayController::class, 'MyPage'])->name('my.page');
    Route::resource('/edmondsPost', 'EdmondsPostController');
    Route::resource('/seattlePost','SeattlePostController');
    Route::resource('/user', 'UserController');
    Route::resource('/admin', 'ProfileController')->only(['index', 'store', 'update', 'destroy']);


    Route::get('create_edmonds', [RegistrationController::class, 'createEdmondsForm'])->name('create.edmonds');
    Route::post('/create_edmonds', [RegistrationController::class, 'createEdmonds'])->name('store.edmonds');
    Route::get('create_seattle', [RegistrationController::class, 'createSeattleForm'])->name('create.seattle');
    Route::post('/create_seattle', [RegistrationController::class, 'createSeattle'])->name('store.seattle');

    Route::get('/edit/edmondsform', [RegistrationController::class, 'EditEdmonds'])->name('edit');
    Route::get('/edit/edmonds', [RegistrationController::class, 'EditEdmondsForm'])->name('edit.edmonds');

    // Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    //     Route::get('account', 'AccountController@index')->name('account.index');
    // });

});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // 設定関連のページのルーティング
    // Route::name('settings.')->prefix('/settings')->group(function () {
    //     Route::get('/', [SettingsController::class, 'index'])->name('index');
    //     Route::put('/', [SettingsController::class, 'update'])->name('update');
    // });
});

