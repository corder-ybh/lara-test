<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Http\Models\Article;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return Article::all();
    }

    public function add()
    {
        $time = date("Y-m-d H:i:s");
        $data = [
            'title' => 'lalatitle' . rand(10, 100),
            'description' => '备注' . rand(10, 100),
            'content' => '内容fawefwae' . rand(10, 100),
            'author' => '测试',
            'addtime' => $time,
        ];
        //实现模型关联
        $flag = DB::table('article')->insert($data);
        dd($flag);
    }

    public function edit()
    {
        $data = [
            'title' => 'Laravel框架修改版'
        ];
        $flag = DB::table('article')->where('id', 2)->update($data);
        dd($flag);
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        var_dump($request->all());
        $article =  Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
