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
        $openid = $request->session()->get('openid');
        if (empty($openid))
        {
            $app = app('wechat.official_account');
            $oauth = $app->oauth;
            return $oauth->redirect();
        }
        else
        {
            $user = $_SESSION['wechat_user'];
            var_dump($user);
        }
        
        
        return view($this->route . '.list');
    }
    
    /**
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        return view($this->route . '.add');
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
        $inputs = $request->all();
        
        $data = [
            'name'      => !empty($inputs['username']) ? $inputs['username']: '',
            'gender'    => !empty($inputs['sexId']) ? $inputs['sexId']: '',
            'birthday'  => !empty($inputs['birthday']) ? $inputs['birthday']: '',
            'id_number' => !empty($inputs['cardId']) ? $inputs['cardId']: '',
            'address'   => !empty($inputs['address']) ? $inputs['address']: '',
            'school'    => !empty($inputs['school']) ? $inputs['school']: '',
            'linkman'   => !empty($inputs['user']) ? $inputs['user']: '',
            'mobile'    => !empty($inputs['phoneNum']) ? $inputs['phoneNum']: '',
        ];
        
        $response = $this->repository->store($data);
        return $response;
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