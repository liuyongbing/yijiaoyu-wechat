<?php
namespace App\Repositories;

use App\Endpoints\StudentsEndpoint;

class StudentsRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new StudentsEndpoint();
    }
}