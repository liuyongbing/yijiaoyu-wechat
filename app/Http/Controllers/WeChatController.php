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
    
    public function callback()
    {
        $app = app('wechat.official_account');
        $oauth = $app->oauth;
        
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        
        $userAttr = $user->toArray();
file_put_contents('oauth.user.json', json_encode($userAttr));
    }
    
    public function menu()
    {
        $buttons = [
                [
                        "type" => "view",
                        "name" => "会员卡",
                        "url"  => "http://wechat.test.100yjy.com/students"
                ]
        ];
        
        $app = app('wechat.official_account');
        return $app->menu->create($buttons);
    }
}