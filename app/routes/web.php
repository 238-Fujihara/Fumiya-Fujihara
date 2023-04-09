<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EdmondsPostController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DeactiveController;
use App\Http\Controllers\SeattlePostController;
use App\Http\Controllers\adminController;



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

Route::get('/edmonds/post', [DisplayController::class, 'EdmondsPost'])->name('edmonds.post');
Route::get('/seattle/post', [DisplayController::class, 'SeattlePost'])->name('seattle.post');
// Route::get('/passwordreset', [DisplayController::class, 'PasswordReset'])->name('password.reset');


// Auth::routes();
Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    Route::get('admin', 'adminController@admin')->name('admin.index');
});
Route::group(['middleware'=> 'auth'], function() {
    Route::post('/like/{postId}',[LikesController::class,'store']);
    Route::post('/unlike/{postId}',[LikesController::class,'destroy']);
    
    // Route::get('/setting', 'SettingController@index')->name('setting');
    // Route::get('/setting/name', 'SettingController@showChangeNameForm')->name('name.form');
    // Route::post('/setting/name', 'SettingController@changeName')->name('name.change');
    // Route::get('/setting/email', 'SettingController@showChangeEmailForm')->name('email.form');
    // Route::post('/setting/email', 'SettingController@changeEmail')->name('email.change');
    // Route::get('/password/change', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
    // Route::post('/password/change', 'Auth\ChangePasswordController@changePassword')->name('password.change');
    // Route::get('/setting/password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
    // Route::post('/setting/password', 'Auth\ChangePasswordController@changePassword')->name('password.change');
    // Route::get('/deactive', 'Auth\DeactiveController@showDeactiveForm')->name('deactive.form');
    // Route::post('/deactive', 'Auth\DeactiveController@deactive')->name('deactive');
    // Route::get('/setting/deactive', 'Auth\DeactiveController@showDeactiveForm')->name('deactive.form');
    // Route::post('/setting/deactive', 'Auth\DeactiveController@deactive')->name('deactive');

    Route::get('mainpage',[DisplayController::class, 'userlist'])->name('userlist');
    Route::get('/mypage', [DisplayController::class, 'MyPage'])->name('my.page');
    Route::resource('/edmondsPost', 'EdmondsPostController');
    Route::resource('/seattlePost','SeattlePostController');
    Route::resource('user', 'UserController')->only(['index', 'store', 'update', 'destroy']);

    Route::get('/profile.edit', [DisplayController::class, 'profileedit'])->name('profile.edit');
    Route::post('/profileedit', [DisplayController::class, 'ProfileEditForm'])->name('Profile.Edit.Form');
    // Route::get('edmonds_form/{id}',[RegistrationController::class, 'createEdondsForm'])->name('edmonds.post');
    // Route::post('/edmonds/{id}',[RegistrationController::class,'edmondspost']);
    // Route::get('deletedmonds_form/{edmonds}',[RegistrationController::class, 'deleteEdmondsForm'])->name('delete.edmonds');
    // Route::post('/deletedmonds_form/{edmonds}',[RegistrationController::class,'deleteEdmonds']);
    // Route::get('softdeleteedmonds_form/{edmonds}',[RegistrationController::class, 'softdeleteEdmondsForm'])->name('softdelete.edmonds');
    // Route::post('/softdeleteedmonds_form/{edmonds}',[RegistrationController::class,'softdeleteEdmonds']);

    Route::get('create_edmonds', [RegistrationController::class, 'createEdmondsForm'])->name('create.edmonds');
    Route::post('/create_edmonds', [RegistrationController::class, 'createEdmonds'])->name('store.edmonds');
    Route::get('create_seattle', [RegistrationController::class, 'createSeattleForm'])->name('create.seattle');
    Route::post('/create_seattle', [RegistrationController::class, 'createSeattle'])->name('store.seattle');
    Route::get('softdeleteedmonds_form/{id}',[RegistrationController::class, 'softdeleteEdmondsForm'])->name('softdelete.edmonds');
    Route::post('/softdeleteedmonds_form/{id}',[RegistrationController::class,'softdeleteEdmonds']);  

    Route::get('/edit/edmondsform', [RegistrationController::class, 'EditEdmonds'])->name('edit');
    Route::get('/edit/edmonds', [RegistrationController::class, 'EditEdmondsForm'])->name('edit.edmonds');

    // Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    //     Route::get('account', 'AccountController@index')->name('account.index');
    // });

    // Route::get('create_income', [RegistrationController::class, 'createIncomeForm'])->name('create.income');
    // Route::post('/create_income', [RegistrationController::class, 'createIncome']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // 設定関連のページのルーティング
    Route::name('settings.')->prefix('/settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::put('/', [SettingsController::class, 'update'])->name('update');
    });
});

