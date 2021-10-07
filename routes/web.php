<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

//Route::get('/redirect', [HomeController::class, 'index'])->name('redirect');

//Route::get('/{locale}', function ($locale) {
//    if (! in_array($locale, ['en', 'ar'])) {
//        abort(400);
//    }
//    App::setLocale($locale);
//    return view('welcome');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/form', function () {
    return view('form');
})->name('form');

Route::middleware(['auth:sanctum', 'verified'])->get('/file', function () {
    return view('file');
})->name('file');


Route::middleware(['auth:sanctum', 'verified', 'isadmin'])->get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');

Route::middleware(['auth:sanctum', 'verified', 'isadmin', 'issuperadmin'])->get('/users', function () {
    return view('users');
})->name('users');

