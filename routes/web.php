<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;


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

//  Route::get('/', function () {
//      return view('form');
// });
Route::get('/generate-password', [PasswordController::class, 'showPasswordForm'])->name('Password.form');
Route::get('/generate_password', [PasswordController::class, 'generatePassword'])->name('password.form');
Route::get('/download-passwords', [PasswordController::class, 'downloadPasswords'])->name('passwords.download');
