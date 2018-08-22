<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\StudentsRepository;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function init()
    {
        $this->repository = new StudentsRepository();
        
        $this->route = 'students';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $brandId = $request->input('brand_id', 0);
        $teamType = $request->input('team_type', 0);
        $username = $request->input('username', '');
        $status = $request->input('status', '');
        
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        $offset = ($page-1) * $size;
        
        $gender = Dictionary::$gender;
        
        $filters = [
            'brand_id' => 0,
            'team_type' => 0,
            'username' => '',
            'status' => '',
        ];
        
        $params = [];
        if (!empty($brandId))
        {
            $params['brand_id'] = $brandId;
        }
        if (!empty($teamType))
        {
            $params['team_type'] = $teamType;
        }
        if (!empty($username))
        {
            $params['username'] = $username;
        }
        if (is_numeric($status))
        {
            $params['status'] = $status;
        }
        $filters = array_merge($filters, $params);
        
        $orderBy = [
            'status' => 'desc',
            'id' => 'desc',
        ];
        $results = $this->repository->list($params, $offset, $size, $orderBy);
return $results;
        return view($this->route . '.list', [
            'filters' => $filters,
            'gender' => $gender,
            'items' => isset($results['list']) ? $results['list'] : [],
            'pagination' => [
                'route' => $this->route . '.index',
                'page' => $page,
                'size' => $size,
                'total' => isset($results['total']) ? $results['total'] : 0
            ],
            'route' => $this->route,
        ]);
    }
    
    /**
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $gender = Dictionary::$gender;
        
        return view($this->route . '.add', [
            'gender' => $gender,
            'item' => [
                'status' => 1
            ],
            'route' => $this->route,
        ]);
    }
    
    /**
     * 修改 view
     *
     * @param int $id
     */
    public function edit(Request $request, $id)
    {
        $item = $this->repository->detail($id);
        
        $gender = Dictionary::$gender;
        
        return view($this->route . '.edit', [
            'gender' => $gender,
            'item' => $item,
            'route' => $this->route,
        ]);
    }
    
    /**
     * 修改 put
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $data = $request->input('Record');
        
        $response = $this->repository->update($id, $data);
        
        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 新增 post
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $request->input('Record');
        
        $response = $this->repository->store($data);
        
        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 查看
     *
     * @param int $id
     */
    public function show($id)
    {
        $detail = $this->repository->detail($id);
        
        return view($this->route . '.detail', [
            'item' => $detail,
        ]);
    }
}