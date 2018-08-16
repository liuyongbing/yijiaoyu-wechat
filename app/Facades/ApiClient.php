<?php

namespace App\Facades;

use App\Endpoints\EndpointClient;

class ApiClient extends FacadeBase
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Endpoints\EndpointClient';
    }
}