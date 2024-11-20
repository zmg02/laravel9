<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function testInsert()
    {
        $user = User::create([
            'name' => 'Taylor3',
            'email' => 'test3@gmial.com',
            'password' => 'Developer',
        ]);
        
        return $user;
    }

    public function testList()
    {
        return User::all();
    }

    public function testRedis1($id)
    {
        // 设置键值
        Redis::set('user:profile:2', json_encode(['name' => 'Simon2', 'age' => 31, 'sex' => 'man']));
        // 获取键值
        $value = Redis::get('user:profile:2');
        return $value;
    }
}
