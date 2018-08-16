<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class StudentsEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'students';
    }
}
