<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;
use App\Facades\ApiClient;

class StudentsEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'students';
    }
    
    /**
     * 详情
     *
     * @param int $openid
     * @return array
     */
    public function showByOpenid($openid)
    {
        $response = ApiClient::get($this->api . '/wechat/' . $openid);
        
        return $this->response($response);
    }
}
