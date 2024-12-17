<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('/dashboard', [ItemController::class, 'index'])->name('item.index');
    Route::get('/search', [ItemController::class, 'showSearchPage'])->name('item.search.page');
    Route::get('/search/results', [ItemController::class, 'search'])->name('item.search');

    Route::get('/add', [ItemController::class, 'create'])->name('item.create');
    Route::post('/add', [ItemController::class, 'store'])->name('item.store');

    Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');

    Route::delete('/delete/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/user-profile', [InfoUserController::class, 'create'])->name('user.profile');
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/logout', [SessionsController::class, 'destroy']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

// Route::get('/login', function () {
//     return view('session/login-session');
// })->name('login');