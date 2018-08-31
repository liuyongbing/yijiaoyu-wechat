<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Authenticate
{
    const ignoreRouteName = ['wechat', 'wechat.callback'];
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null($request->session()->get('id')) &&
            ! in_array(Route::currentRouteName(), self::ignoreRouteName)){
            return redirect()->route('students.index');
        }
        
        View::share([
            'id' => $request->session()->get('id')
        ]);
        
        return $next($request);
    }
}
