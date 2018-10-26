<?php
/**
 * Created by PhpStorm.
 * User: lmb
 * Date: 2018/10/25
 * Time: 9:50
 */


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//核心控制器类
use App\Http\Controllers\Controller;
use App\Http\Models\User;
//引入Input表单接收类
use Illuminate\Support\Facades\Input;
//引入DB类
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   public function login(Request $request)
   {
       $this->validateLogin($request);

       if ($this->attemptLogin($request)) {
           $user = $this->guard()->user();
           $user->generateToken();

           return response()->json([
               'data' => $user-toArry(),
           ]);
       }
       return $this->sendFailedLoginResponse($request);
   }
}