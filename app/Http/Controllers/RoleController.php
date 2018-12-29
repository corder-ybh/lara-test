<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
//引入laravel-permission 模型
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']); //isAdmin中间件只让具备指定权限的用户才能访问该资源
    }

    /**
     * 显示角色列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();  //获取所有角色
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * 显示创建角色表单
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();  //获取所有权限

        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * 保存新建的角色
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证 name 和 permissions 字段
        $this->validate($request, [
                'name'=>'required|unique:roles|max:10',
                'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
        // 遍历选择的权限
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            // 获取新创建的角色并分配权限
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }

        return redirect()->route('roles.index')
            ->with('flash_message',
                'Role'. $role->name.' added!');
    }

    /**
     * 显示指定角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('roles');
    }

    /**
     * 显示编辑角色表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * 更新角色
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
