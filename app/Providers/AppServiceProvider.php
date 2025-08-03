<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


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
            Route::get('/', function () {
                $user = auth()->user();

                if ($user && $user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user && $user->role === 'employee') {
                    return redirect()->route('employee.score');
                }

                return redirect()->route('login');
            });
        });
    }
}
