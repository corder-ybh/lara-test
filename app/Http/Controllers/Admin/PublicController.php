<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//核心控制器类
use App\Http\Controllers\Controller;
//引入Input表单接收类
use Illuminate\Support\Facades\Input;
//引入DB类
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    //定义login方法
    public function login() {
        return view('public.login');
    }

    //check方法
    public function check() {
        //表单接收类
        $input = Input::all();
        //获取用户名、密码及code验证码
        $username = $input['username'];
        $password = $input['password'];
        if (empty($username) || empty($password)) {
            return back()->with('msg','用户名或密码不能为空');
        }
        $password = md5($password);

        $row = DB::table('admin')->where(
            [
                'username' => $username,
                'password' => $password,
            ])->first();

        if ($row) {
            session(['admin' => $row]);
            return redirect('admin/index');
        } else {
            return back()->with('msg','用户名密码错误！');
        }
    }
}
