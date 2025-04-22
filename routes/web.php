<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetitonController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RoleAdminSuperController;
use App\Http\Controllers\SuperAdminController;
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
    return view('auth.login');
});
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/Auth',[AuthController::class,'register'])->name('register');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/save',[AuthController::class,'save'])->name('save');
Route::post('/sing',[AuthController::class,'sing'])->name('sing');

Route::group(['prefix'=>'profiles','middleware'=>['auth' , 'isUser']],function () {
    Route::get('/profiles',[ProfilesController::class,'profiles'])->name('profiles');
    Route::resource('/petition',PetitonController::class);
    Route::get('/setting',[ProfilesController::class,'setting'])->name('setting');
    Route::put('/update/setting/{user}',[ProfilesController::class,'update_setting'])->name('update.setting');
});

Route::group(['prefix' => 'dashboard','middleware'=>['auth' ,'isAdmin']],function () {
    Route::get('/panel',[AdminController::class,'admin'])->name('admin');
    Route::get('/dashboard_notifications',[AdminController::class,'notifications'])->name('dashboard_notifications');
    Route::get('/notification/accept/{petition}',[AdminController::class,'notification_accept'])->name('dashboard.notification.accept');
    Route::get('/notification/cancel/{petition}',[AdminController::class,'notification_cancel'])->name('dashboard.notification.cancel');
    Route::get('/notification/show/{petition}',[AdminController::class,'notificationShow'])->name('notification.show');
    Route::get('/petition_accept',[AdminController::class,'petition_accept'])->name('petition_accept');
    Route::get('/petition_cancel',[AdminController::class,'petition_cancel'])->name('petition_cancel');
});

Route::post('/pusher' ,[PetitonController::class,'petition_notification'])->name('notification.petitions');

Route::group(['prefix' => 'Administrator','middleware'=>['auth' ,'superAdmin']],function () {
    Route::get('/superAdmin',[SuperAdminController::class,'superAdmin'])->name('superAdmin');
    Route::get('/user/view',[SuperAdminController::class,'index'])->name('user.view');
    Route::get('/user/edit/{user}',[SuperAdminController::class,'edit'])->name('user.edit');
    Route::put('/user/update/{user}',[SuperAdminController::class,'update'])->name('user.update');
    Route::delete('/user/destroy/{user}',[SuperAdminController::class,'destroy'])->name('user.destroy');
    Route::get('/xodim',[SuperAdminController::class,'user_all'])->name('user.all');
    Route::get('/xodin/all/adm',[SuperAdminController::class,'user_adm'])->name('user.adm');
    Route::get('/xodin/all/show/{employee}',[SuperAdminController::class,'user_show'])->name('user.show');
    Route::get('/setting',[SuperAdminController::class,'setting_super'])->name('setting.super');
    Route::put('/update/settingSuper/{user}',[SuperAdminController::class,'update_settingSuper'])->name('update.settingSuper');
    Route::get('/role',[RoleAdminSuperController::class,'role_index'])->name('role');
    Route::get('/role/yaratish',[RoleAdminSuperController::class,'role_create'])->name('role.create');
    Route::post('/role/store',[RoleAdminSuperController::class,'store'])->name('roles.store');
});
