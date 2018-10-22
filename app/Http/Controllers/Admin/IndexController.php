<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//核心控制器类
use App\Http\Controllers\Controller;
//引入Input表单接收类
use Illuminate\Support\Facades\Input;
//引入DB类
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        return view('index.index');
    }
}
