<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting()
    {
        // ...
    }

    public function redirectTo(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin') {
            return '/admin/dashboard';
        } elseif ($user->role === 'alumni') {
            return '/alumni/dashboard';
        }

        return self::HOME;
    }
}
