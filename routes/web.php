<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\UsersRoleController;
use App\Http\Controllers\SuperAdmin\SuperAdminUserController;
use App\Http\Controllers\SuperAdmin\AdminCreateController;


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

Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*testing----------------------------------------------------------------------------------------------------
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\SuperAdmin\AccountRoleController::class);
    Route::resource('users', App\Http\Controllers\SuperAdmin\SuperAdminUserController::class);
    Route::resource('adminCreate', App\Http\Controllers\SuperAdmin\AdminCreateController::class);
});*/

//end user verify email--------------------------------------------------------------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home')->middleware('verified');

/*super admin----------------------------------------------------------------------------------------------------
Route::prefix('superAdmin')->middleware(['auth', 'isSuperAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'index']);

    Route::get('users', [App\Http\Controllers\SuperAdmin\SuperAdminUserController::class, 'index']);
    Route::get('users/{user_id}', [App\Http\Controllers\SuperAdmin\SuperAdminUserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\SuperAdmin\SuperAdminUserController::class, 'update']);
});*/

//---------------------------------------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\ProfileController::class, 'updateUserInfo']);
    //Route::get('profile/users', [App\Http\Controllers\ProfileController::class, 'index']);

});

//admin-------------------------------------------------------------------------------------------------------------
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\AdminUserController::class)->group(function() {
        Route::get('/users','index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/user/{user_id}/edit', 'edit');
        Route::put('/user/{user_id}', 'update');
        Route::get('user/{user_id}/delete', 'delete');
    });
    
});
//key actor--------------------------------------------------------------------------------------------------------
Route::prefix('keyActor')->middleware(['auth', 'isKeyActor'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\KeyActor\DashboardController::class, 'index']);
});

//end user logout---------------------------------------------------------------------------------------------------
Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
});
