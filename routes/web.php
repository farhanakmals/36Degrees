<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Director\AspectController;
use App\Http\Controllers\Director\EmployerController;
use App\Http\Controllers\Director\ScoreActualController;
use App\Http\Controllers\Director\ScoreResultController;
use App\Http\Controllers\Employer\EmployerDashboardController;
use App\Http\Controllers\DivisionHead\DivisionEmployeeController;
use App\Http\Controllers\DivisionHead\DivisionScoreActualController;
use App\Http\Controllers\DivisionHead\DivisionScoreResultController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('main');
})->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('director')->group(function () {
    Route::get('/score-result', [ScoreResultController::class, 'index'])->name('admin.dashboard');

    Route::get('/target-capaian', [AspectController::class, 'index'])->name('admin.aspect');
    Route::post('/target-capaian', [AspectController::class, 'store'])->name('admin.aspect.store');
    Route::put('/target-capaian/{id}', [AspectController::class, 'update'])->name('admin.aspect.update');
    Route::delete('/target-capaian/{id}', [AspectController::class, 'destroy'])->name('admin.aspect.destroy');

    Route::get('/employer', [EmployerController::class, 'index'])->name('admin.employer');
    Route::post('/employer', [EmployerController::class, 'store'])->name('admin.employer.store');
    Route::put('/employer/{id}', [EmployerController::class, 'update'])->name('admin.employer.update');
    Route::delete('/employer/{id}', [EmployerController::class, 'destroy'])->name('admin.employer.destroy');

    Route::get('/score-actual', [ScoreActualController::class, 'index'])->name('admin.score_actual');
    Route::get('/score-actual/add', [ScoreActualController::class, 'create'])->name('admin.score_actual.create');
    Route::post('/score-actual', [ScoreActualController::class, 'store'])->name('admin.score_actual.store');
    Route::get('/score-actual/{id}/edit', [ScoreActualController::class, 'edit'])->name('admin.score_actual.edit');
    Route::put('/score-actual/{id}/{userId}', [ScoreActualController::class, 'update'])->name('admin.score_actual.update');
    Route::delete('/score-actual/{id}', [ScoreActualController::class, 'destroy'])->name('admin.score_actual.destroy');
});

Route::middleware(['auth', 'role:division_head'])->prefix('division')->group(function () {
    Route::get('/employer', [DivisionEmployeeController::class, 'index'])->name('division.employer');

    Route::get('/score-result', [DivisionScoreResultController::class, 'index'])->name('division.dashboard');

    Route::get('/score-actual', [DivisionScoreActualController::class, 'index'])->name('division.score_actual');
    Route::get('/score-actual/add', [DivisionScoreActualController::class, 'create'])->name('division.score_actual.create');
    Route::post('/score-actual', [DivisionScoreActualController::class, 'store'])->name('division.score_actual.store');
    Route::get('/score-actual/{id}/edit', [DivisionScoreActualController::class, 'edit'])->name('division.score_actual.edit');
    Route::put('/score-actual/{id}/{userId}', [DivisionScoreActualController::class, 'update'])->name('division.score_actual.update');
    Route::delete('/score-actual/{id}', [DivisionScoreActualController::class, 'destroy'])->name('division.score_actual.destroy');
});

Route::middleware(['auth', 'role:employee'])->prefix('employer')->group(function () {
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('employee.dashboard');
});

require __DIR__.'/auth.php';
