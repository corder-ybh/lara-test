<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //
    public function index() {
        $row = DB::table('article')->where('id', 2)->first();
        //读取数据
        echo '编号:' . $row->id;
        echo '</br>';
        echo '标题:' . $row->title;
        echo '</br>';
        echo '描述:' . $row->description;
        echo '</hr>';
    }

    public function add() {
        $time = date("Y-m-d H:i:s");
        $data = [
            'title' => 'lalatitle' . rand(10,100),
            'description' => '备注' . rand(10,100),
            'content' => '内容fawefwae' . rand(10, 100),
            'author' => '测试',
            'addtime' => $time,
        ];
        //实现模型关联
        $flag = DB::table('article')->insert($data);
        dd($flag);
    }

    public function delete() {
        $flag = DB::table('article')->where('id',1)->delete();
        dd($flag);
    }

    public function edit() {
        $data = [
            'title' => 'Laravel框架修改版'
        ];
        $flag = DB::table('article')->where('id',2)->update($data);
        dd($flag);
    }
}
