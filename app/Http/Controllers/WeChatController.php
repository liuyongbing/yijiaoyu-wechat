<?php

namespace App\Http\Controllers;

use Log;

class WeChatController extends Controller
{
    
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });
        
        return $app->server->serve();
    }
    
    public function menu()
    {
        $buttons = [
            [
                "type" => "click",
                "name" => "会员卡",
                "url"  => "http://wechat.test.100yjy.com/students"
            ]
        ];
        
        $app = app('wechat.official_account');
        $app->menu->create($buttons);
        
        return ;
    }
}