<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id','title','description','content','author','addtime'];

    public function index() {
        $data = \App\Http\Models\Article::all();
        //获取数据
        foreach ($data as $row) {
            echo '编号：' . $row->id;
            echo '<br/>';
            echo '标题：' . $row->title;
            echo '<br/>';
        }
    }

    public function getOne() {
        $row = \App\Http\Models\Article::find(2);
        echo '编号：' . $row->id;
        echo '<br/>';
        echo '标题：' . $row->title;
    }

    public function add() {
        $article = new \App\Http\Models\Article();
        $article->title = 'Laravel框架中模型';
        $article->save();
    }
}
