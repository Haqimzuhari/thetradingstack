<?php

use App\Http\Controllers\Web\Authentication;
use App\Http\Controllers\Web\Dashboard;
use App\Http\Controllers\Web\IndexPage;
use App\Http\Controllers\Web\Profile;
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

Route::get('/', [IndexPage::class, 'index'])->name('index');
Route::post('/', [IndexPage::class, 'index'])->name('index');

// Authentication
Route::middleware('guest')->group(function() {
    Route::get('/sign-in', [Authentication::class, 'signIn'])->name('sign-in');
    Route::post('/sign-in', [Authentication::class, 'signIn'])->name('sign-in');
    Route::get('/create-account', [Authentication::class, 'createAccount'])->name('create-account');
    Route::post('/create-account', [Authentication::class, 'createAccount'])->name('create-account');
    Route::get('/forgot-password', [Authentication::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [Authentication::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/reset-password', [Authentication::class, 'resetPassword'])->name('reset-password');
    Route::post('/reset-password', [Authentication::class, 'resetPassword'])->name('reset-password');
});

Route::middleware('auth')->group(function() {
    Route::get('/sign-out', function() { abort(404); })->name('sign-out');
    Route::post('/sign-out', [Authentication::class, 'signOut'])->name('sign-out');

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/profile', [Profile::class, 'index'])->name('profile');
    Route::post('/profile', [Profile::class, 'index'])->name('profile');
});
