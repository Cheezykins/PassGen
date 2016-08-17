<?php

namespace Cheezykins\PassGen\Vendor\Laravel;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{
    protected static function getFacadeAccessor()
    {
        return 'Cheezykins\PassGen\Contracts\PasswordGeneratorInterface';
    }
}
