<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ProvisionServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Cache::put('name', 'simon');  // 缓存20分钟
        // Cache::put('key', 'value', 20);  // 缓存20分钟
        // $value = Cache::get('name');       // 获取缓存
        Redis::set('name', 'simon');
        $value = Redis::get('name');
        return $value;
    }
}
