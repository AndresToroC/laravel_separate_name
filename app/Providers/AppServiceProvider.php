<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        \Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        \Form::component('bsPassword', 'components.form.password', ['name']);

    }
}
