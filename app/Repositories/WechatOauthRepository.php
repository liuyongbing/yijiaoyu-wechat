<?php
namespace App\Repositories;

use App\Endpoints\WechatOauthEndpoint;

class WechatOauthRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new WechatOauthEndpoint();
    }
}