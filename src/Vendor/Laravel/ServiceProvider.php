<?php

namespace Cheezykins\PassGen\Vendor\Laravel;

use Cheezykins\PassGen\Contracts\PasswordGeneratorInterface;
use Cheezykins\PassGen\Contracts\PassWordInterface;
use Cheezykins\PassGen\Generator;
use Cheezykins\PassGen\PassWord;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(PasswordGeneratorInterface::class, Generator::class);
        $this->app->bind(PassWordInterface::class, PassWord::class);
    }

    public function provides()
    {
        return [
            PasswordGeneratorInterface::class,
            PassWordInterface::class,
        ];
    }
}
