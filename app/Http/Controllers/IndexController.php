<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //定义index方法
    public function index() {
        return view('welcome1', ['title' => 'Laravel 5']);
    }

    public function index2() {
        echo '222';
    }
}
