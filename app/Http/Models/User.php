<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'enable',
        'is_admin',
        'description',
        'head_image',
        'remember_token',
        'last_login_at',
        'create_at',
        'updated_at',
        'phone',
        'api_token'
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }
}
