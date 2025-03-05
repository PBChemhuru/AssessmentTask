<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContentController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home',[AdminController::class, 'home'])->middleware('auth')->name('home');
Route::get('/aboutus',[AdminController::class, 'aboutus'])->middleware('auth')->name('aboutus');
Route::get('/features',[AdminController::class, 'features'])->middleware('auth')->name('features');
Route::get('/services',[AdminController::class, 'services'])->middleware('auth')->name('services');
Route::get('/pricing',[AdminController::class, 'pricing'])->middleware('auth')->name('pricing');
Route::get('/testimonials',[AdminController::class, 'testimonials'])->middleware('auth')->name('testimonials');
Route::get('/contactus',[AdminController::class, 'contactus'])->middleware('auth')->name('contactus');
Route::put('/admin/update/{section}', [AdminController::class, 'update'])->middleware('auth')->name('admin.update');
Route::get('/admin',[ContentController::class, 'admin'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
