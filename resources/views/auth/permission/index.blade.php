@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-key"></i> 权限管理

            {{--<a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>--}}
            {{--<a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>--}}
        </h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ URL::to('auth/permission/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">编辑</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['auth.permission.destroy', $permission->id] ]) !!}
                            {!! Form::submit('删除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ URL::to('auth/permission/create') }}" class="btn btn-success">添加权限</a>

    </div>

@endsection