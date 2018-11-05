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
use App\User;
//引入Input表单接收类
use Illuminate\Support\Facades\Input;
//引入DB类
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Here the request is validated. The validator method is located
        // inside the RegisterController, and makes sure the name, email
        // password and password_confirmation fields are required.
//        $this->validator($request->all())->validate();
          $this->validate($request,[
              'name' => 'required|string|max:255|unique:users',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|max:255',
          ]);

        // A Registered event is created and will trigger any relevant
        // observers, such as sending a confirmation email or any
        // code that needs to be run as soon as the user is created.
//        event(new Registered($user = $this->create($request->all())));
        $user = new User();
        $user = $user->create($request->all());

        // After the user is created, he's logged in.
        //$this->guard()->login($user);

        // And finally this is the hook that we want. If there is no
        // registered() method or it returns null, redirect him to
        // some other URL. In our case, we just need to implement
        // that method to return the correct response.
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        $user->generateToken();

        return response()->json(['data' => $user->toArray()], 201);
    }
}