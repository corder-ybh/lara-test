<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //新建模型需要添加，否则报错"Add [title] to fillable property to allow mass assignment on [App\Post]."
    protected $fillable = ['title', 'body'];
}
