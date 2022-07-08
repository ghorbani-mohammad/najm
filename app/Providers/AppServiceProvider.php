<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share(['extentions' => [
            'pdf' => 'btn-danger',
            'mp3' => 'btn-success',
            'docx' => 'btn-info',
            'zip' => 'btn-warning',
            'png' => 'btn-info',
            'jpeg' => 'btn-info',
            'jpg' => 'btn-info',
        ]]);
        View::composer('layout.app', 'App\Http\Composers\AppLayoutComposer');
    }
}
