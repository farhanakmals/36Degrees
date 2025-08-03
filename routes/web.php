<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('main');
})->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/reward', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    Route::get('/score', function () {
        return view('score');
    })->name('admin.score');

    Route::get('/employee', function () {
        return view('list_karyawan');
    })->name('admin.karyawan');
});

Route::middleware(['auth', 'role:employee'])->prefix('employer')->group(function () {
    Route::get('/score', function () {
        return view('score_employer');
    })->name('employee.score');

    Route::get('/reward', function () {
        return view('reward_employer');
    })->name('employee.reward');
});

require __DIR__.'/auth.php';
