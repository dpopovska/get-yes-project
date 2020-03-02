<?php

namespace App\Providers;

use App\Services\CustomValidator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider{

    /**
     * Bootstrap any validation services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->validator->resolver(function($translator, $data, $rules, $messages)
        {
            return new CustomValidator($translator, $data, $rules, $messages);
        });
    }

    /**
     * Register any validation services.
     *
     * @return void
     */
    public function register()
    {
    }
}
