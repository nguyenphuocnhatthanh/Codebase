<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data = []) {
            return response()->json($data);
        });
        Response::macro('created', function ($data = []) {
            return response()->json($data, 201);
        });
        Response::macro('error', function ($message, $statusCode = 500, $errors = []) {
            return Response::json([
                'message' =>  $message,
                'errors' => $errors
            ], $statusCode);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() === 'local') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
