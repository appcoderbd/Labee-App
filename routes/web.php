<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/profile', [ProfileController::class, 'user_profile'])->name('user.profile');

    Route::get('/user/profile/edit/{id}', [ProfileController::class, 'edit_profile'])->name('user.profile.edit');


    // Hospitals All Routes
    Route::get('/hospitals', [HospitalController::class, 'index'])->name('hospitals.index');
});


// Route::get('/new/login', function(){
//     return view('auth.login-2');
// });

require __DIR__.'/auth.php';
