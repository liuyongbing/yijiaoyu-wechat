<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $repository;
    public $route;
    
    public function __construct()
    {
        $this->init();
        
        View::share([
            'STATIC_VERSION' => '?v=' . env('APP_STATIC_VERSION', date('Ymd')),
        ]);
    }
    
    public function init()
    {
        $this->repository = new Repository();
        
        $this->route = '';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        $offset = ($page - 1) * $size;
        
        $results = $this->repository->list([], $offset, $size);
        
        return view($this->route . '.list', [
            'route' => $this->route,
            'items' => isset($results['list']) ? $results['list'] : [],
            'filters' => [],
            'pagination' => [
                'route' => $this->route . '.index',
                'page' => $page,
                'size' => $size,
                'total' => isset($results['total']) ? $results['total'] : 0
            ]
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
        
        if ('error' == $response['status'])
        {
            $rules = ['api_error' => 'string'];
            $messages = ['string' => $response['message']];
            
            return $this->showError($request, $rules, $messages);
        }
        
        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 修改 view
     *
     * @param int $id
     */
    public function edit(Request $request, $id)
    {
        $item = $this->repository->detail($id);
        
        return view($this->route . '.edit', [
                'route' => $this->route,
                'item' => $item
        ]);
    }
    
    /**
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        return view($this->route . '.add', [
                'route' => $this->route,
                'item' => [
                        'status' => 1
                ]
        ]);
    }
    
    /**
     * 新增 post
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $request->input('Record');
        //return $data;
        $response = $this->repository->store($data);
        
        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 附件上传
     *
     * @param Request $request
     * @return mixed
     */
    public function upload(Request $request, $filetype = 'courseware', $fileInput = 'upload_file')
    {
        $filename = $request->input('Record')['image'];
        
        $file = $_FILES[$fileInput];
        if (!empty($file['name'])) {
            $data = [
                    'name'     => 'upload_file',
                    'contents' => fopen($file['tmp_name'], 'r'),
                    'filename' => $file['name']
            ];
            $repository = new AttachmentRepository();
            $repository->setFiletype($filetype);
            $result = $repository->upload($data);
            if (!empty($result['filename'])) {
                $filename = $result['filename'];
            }
        }
        
        return $filename;
    }
    
    /**
     * 查看
     *
     * @param int $id
     */
    public function show($id)
    {
        return $this->repository->detail($id);
    }
    
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
    
    public function response($response)
    {
        return $response;
    }
    
    /**
     *
     * @param Request $request
     * @param array $rules
     * @param array $messages
     */
    protected function showError(Request $request, $rules, $messages)
    {
        return $this->validate($request, $rules, $messages);
        
        ;
    }
}
