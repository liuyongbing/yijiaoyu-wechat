<?php

namespace App\Constants\Traits;

use Constants;

trait Brand
{
    public static $brands = [
        'wukong'    => 'wukong',//齐天大圣
        'pocketcat' => 'pocketcat',//口袋猫
        'town'      => 'town',//童画镇
    ];
    
    public static $brandValues = [
        'wukong'    => '1',
        'pocketcat' => '2',
        'town'      => '3',
    ];
}