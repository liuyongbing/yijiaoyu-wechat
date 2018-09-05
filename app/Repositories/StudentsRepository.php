<?php
namespace App\Repositories;

use App\Endpoints\StudentsEndpoint;

class StudentsRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new StudentsEndpoint();
    }
    
    /**
     * 详情
     *
     * @param int $openid
     * @return array
     */
    public function showByOpenid($openid)
    {
        return $this->endPoint->showByOpenid($openid);
    }
    
    public function bindWechat($data)
    {
        return $this->endPoint->bindWechat($data);
    }
}