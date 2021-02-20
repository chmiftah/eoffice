<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Surat\SuratController;
use App\Http\Controllers\Permission\{ RoleController, PermissionController, AssignController, UserController };
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);



	Route::middleware('has.role')->group(function(){

	Route::get('surat_masuk',[SuratController::class,'index'])->name('surat_masuk');
	Route::post('post_surat',[SuratController::class,'store'])->name('surat.post');

	Route::prefix('roles-permissions')->middleware('permission:manajemen user')->group(function(){
	Route::get('roles',[RoleController::class,'index'])->name('role.index');
	Route::post('role.create',[RoleController::class,'store'])->name('role.create');
	Route::delete('role/{role}/delete',[RoleController::class,'destroy'])->name('role.delete');


	Route::get('permission',[PermissionController::class,'index'])->name('permission.index');
	Route::post('permission.create',[PermissionController::class,'store'])->name('permission.create');
	 Route::delete('permission/{permission}/delete',[PermissionController::class,'destroy'])->name('permission.delete');


	 Route::get('assign',[AssignController::class,'index'])->name('assign.index');
	 Route::post('assign/create',[AssignController::class,'store'])->name('assign.create');
	 Route::get('assign/{role}/edit',[AssignController::class,'edit'])->name('assign.edit');
	 Route::put('assign/{role}/edit',[AssignController::class,'update']);


	 Route::get('assign-user',[UserController::class,'create'])->name('assign.user.index');
	 Route::post('assign-user/user',[UserController::class,'store'])->name('assign.user.create');
	});
	});
});


