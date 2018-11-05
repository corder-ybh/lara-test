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
//引入Input表单接收类
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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

    /**
     * 参数验证
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }
}