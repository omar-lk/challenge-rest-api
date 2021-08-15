<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\New_;

class CustomFacadesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        app()->bind('currentSchool',function(){
            return new \App\Repositories\currentSchool;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
