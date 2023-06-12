<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PageController;

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

//Main page
Route::get('/', [PageController::class, 'index'])->name('page.main');

//Pages
Route::get('/about', [PageController::class, 'about'])->name('page.about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('page.contacts');

//generate random quote and return to UI
Route::post('/generate', [RegisterController::class, 'submitForm'])->name('form.submit');

