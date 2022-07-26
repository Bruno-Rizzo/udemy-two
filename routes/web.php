<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::middleware(['auth','is_admin'])->group(function(){
//     Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
// });

Route::middleware(['auth','role:admin'])->group(function(){
     Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
    });

