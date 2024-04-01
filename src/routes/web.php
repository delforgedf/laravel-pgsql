<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\Web\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/importacao', [CargaController::class, 'importData'])->name('importacao.unidades');

Route::get('/importacao-saude', [CargaController::class, 'importUnidadesSaude'])->name('importacao.saude');

// Auth routes
// Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('admin/login',  [LoginController::class, 'login']);
// Route::post('admin/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset']);
