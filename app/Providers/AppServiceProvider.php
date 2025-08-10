<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middleware('web')
        ->group(function () {
            $user = Auth::user();

            if ($user && $user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user && $user->role === 'employee') {
                return redirect()->route('employee.dashboard');
            } elseif ($user && $user->role === 'division_head') {
                return redirect()->route('division.dashboard');
            }

            return redirect('/login');
        });
    }
}
