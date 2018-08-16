<?php

namespace App\Constants\Traits;

use Constants;

trait TeamTypes
{
    public static $teamTypes = [
        'manager' => 'manager',//管理团队
        'teacher' => 'teacher',//教练团队
    ];
    
    public static $teamTypesValues = [
        'manager' => '1',
        'teacher' => '2',
    ];
    
}