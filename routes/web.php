<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\VideoController::class, 'publicFetch']);
// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('auth')->group(function () {
    Route::get('/upload_v', [App\Http\Controllers\VideoController::class, 'index'])->name('upload_v');

    Route::post('/insert_video', [App\Http\Controllers\VideoController::class, 'insert'])->name('insert.file');

    Route::get('/fetch_video', [App\Http\Controllers\VideoController::class, 'fetch'])->name('fetch_video');
});

Route::get('/dashboard', [App\Http\Controllers\VideoController::class, 'privateFetch'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
