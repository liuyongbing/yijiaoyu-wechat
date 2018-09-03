<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class WechatOauthEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'wechat_oauth';
    }
}
