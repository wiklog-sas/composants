<?php

namespace Wiklog\WiklogInputs;

use Illuminate\Support\Facades\Facade;

class WiklogInputs extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wiklog-inputs';
    }
}
