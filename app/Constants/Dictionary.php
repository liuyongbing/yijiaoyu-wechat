<?php

namespace App\Constants;

use App\Constants\Traits\Brand;
use App\Constants\Traits\Gender;
use App\Constants\Traits\TeamTypes;

class Dictionary
{
    use Brand;
    use Gender;
    use TeamTypes;
    
    const PAGE_SIZE = 10;//页容量
    const PAGE_SIZE_7 = 7;
    const PAGE_SIZE_8 = 8;
    
    const ACCOUNT_TYPE = [
        //'ADMINISTRATOR' => 1,//超给级管理员
        'EDITOR' => 2,//普通管理员
        'TEACHER' => 3,//教练
    ];
}
