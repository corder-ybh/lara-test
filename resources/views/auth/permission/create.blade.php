@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> 添加权限</h1>
        <br>

        {{ Form::open(array('url' => 'auth/permission')) }}

        <div class="form-group">
            {{ Form::label('name', '权限名') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div><br>
        @if(!$roles->isEmpty())
        <h4>分配权限给角色</h4>

        @foreach ($roles as $role)
            {{ Form::checkbox('roles',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
        @endif
        <br>
        {{ Form::submit('添加', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection