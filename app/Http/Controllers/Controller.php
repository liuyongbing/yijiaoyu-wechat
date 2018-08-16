<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
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
}
