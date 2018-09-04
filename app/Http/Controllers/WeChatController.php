<?php

namespace App\Http\Controllers;

use App\Repositories\WechatOauthRepository;
use Log;
use Illuminate\Http\Request;

class WeChatController extends Controller
{
    public function init()
    {
        $this->repository = new WechatOauthRepository();
        
        $this->route = 'wechat_oauth';
    }
    
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
            return "欢迎关注！";
        });
        
        return $app->server->serve();
    }
    
    /**
     * 微信用户授权后的回调
     */
    public function callback(Request $request)
    {
        $app = app('wechat.official_account');
        $oauth = $app->oauth;
        
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        
        // $user 可以用的方法:
        // $user->getId();  // 对应微信的 OPENID
        // $user->getNickname(); // 对应微信的 nickname
        // $user->getName(); // 对应微信的 nickname
        // $user->getAvatar(); // 头像网址
        // $user->getOriginal(); // 原始API返回的结果
        // $user->getToken(); // access_token， 比如用于地址共享时使用
        
        if (!empty($user))
        {
            $openid = $user->getId();
            
            //1. 将用户openid保存至数据库
            $data = [
                'openid' => $openid,
                'original' => $user->getOriginal(),
            ];
            $this->repository->store($data);
            
            //2. 设置session:openid
            $request->session()->put('openid', $openid);
            
            return redirect()->route('students');
        }
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