<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DataController;

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DataController::class, 'dashboard'])->name('dashboard');

    // Upload
    Route::get('/upload', [DataController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/upload', [DataController::class, 'upload'])->name('upload.process');

    // Download
    Route::get('/download', [DataController::class, 'download'])->name('download');

    // Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

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
    return view('welcome');
});

Auth::routes();
