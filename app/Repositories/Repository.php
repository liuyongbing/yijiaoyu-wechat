<?php

namespace App\Repositories;

use App\Endpoints\Endpoints;

class Repository
{
    public $endPoint = null;
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        $this->endPoint = new Endpoints();
    }
    
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($params = [], $offset = 0, $size = 10, $order = '')
    {
        $params['offset'] = $offset;
        $params['size'] = $size;
        
        if (!empty($order)) 
        {
            $params['order'] = $order;
        }
        
        return $this->endPoint->list($params);
    }
    
    /**
     * 详情
     *
     * @param int $id
     * @return array
     */
    public function detail($id)
    {
        return $this->endPoint->detail($id);
    }
    
    /**
     * 修改
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update($id, $data = [])
    {
        return $this->endPoint->update($id, $data);
    }
    
    /**
     * 增加
     *
     * @param array $data
     * @return array
     */
    public function store($data = [])
    {
        return $this->endPoint->store($data);
    }
    
    /**
     * 所有
     *
     * @param array $params
     * @return array
     */
    public function all($params = [], $orderBy = '')
    {
        if (!empty($orderBy))
        {
            $params['order'] = $orderBy;
        }
        
        return $this->endPoint->all($params);
    }
}
