<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Models\Auth\User;
use Auth;
use App\Http\Controllers\Controller;
//引入laravel-permission模型
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//用于输出一次性信息
use Session;

class UserController extends Controller
{

    public function __construct()
    {
        // isAdmin中间件让具备指定权限的用户才能访问该资源
        $this->middleware(['auth', 'clearance']);
    }

    /**
     * 显示用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('auth.user.index')->with('users', $users);
    }

    /**
     * 显示创建用户角色表单
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所有角色并将其传递到视图
        $roles = Role::get();
        //与compact()一样
        return view('auth.user.create', ['roles' => $roles]);
    }

    /**
     * 在数据库中保存新建的资源
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证 name、email 和 password 字段
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:fam_users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password')); //只获取 email、name、password 字段

        $roles = $request['roles']; // 获取输入的角色字段
        // 检查是否某个角色被选中
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning roles to user
            }
        }
        // 重定向到 user.index 视图并显示消息
        return redirect()->route('auth.user.index')
            ->with('flash_message',
                'User successfully added.');
    }

    /**
     * 显示指定用户
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('user');
    }

    /**
     * 显示编辑用户角色表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // 通过给定id获取用户
        $roles = Role::get(); // 获取所有角色

        return view('auth.user.edit', compact('user', 'roles')); // 将用户和角色数据传递到视图
    }

    /**
     * 更新数据库中的给的用户
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // 通过id获取给定角色

        // 验证 name, email 和 password 字段
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:fam_users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email', 'password']); // 获取 name, email 和 password 字段
        $roles = $request['roles']; // 获取所有角色
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  // 如果有角色选中与用户关联则更新用户角色
        } else {
            $user->roles()->detach(); // 如果没有选择任何与用户关联的角色则将之前关联角色解除
        }
        return redirect()->route('auth.user.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    /**
     * 删除用户
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('auth.user.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
