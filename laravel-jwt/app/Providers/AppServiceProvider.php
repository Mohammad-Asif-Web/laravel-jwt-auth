<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
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
        Validator::extend('lowercase', function ($attribute, $value, $parameters, $validator) {
            return strtolower($value) === $value;
        });

        Validator::extend('trim', function ($attribute, $value, $parameters, $validator) {
            return trim($value) === $value;
        });

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $notifications = Notification::with(['user', 'post', 'comment'])
                    ->latest()
                    ->get();
                $view->with('notifications', $notifications);
            }
        });
    }
}
