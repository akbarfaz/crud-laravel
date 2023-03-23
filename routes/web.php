<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BerandaController;

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
Route::get('/beranda', [BerandaController::class, 'index']);
Route::get('/datasiswa', [SiswaController::class, 'index'])->name('datasiswa');
Route::get('/createsiswa', [App\Http\Controllers\SiswaController::class, 'create'])->name('createsiswa');
Route::post('/simpansiswa', [App\Http\Controllers\SiswaController::class, 'store'])->name('simpansiswa');
Route::get('/editsiswa/{id}', [App\Http\Controllers\SiswaController::class, 'edit'])->name('editsiswa');
Route::post('/updatesiswa/{id}', [App\Http\Controllers\SiswaController::class, 'update'])->name('updatesiswa');
Route::post('/deletesiswa/{id}', [App\Http\Controllers\SiswaController::class, 'destroy'])->name('deletesiswa');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [App\Http\Controllers\LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [App\Http\Controllers\LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
