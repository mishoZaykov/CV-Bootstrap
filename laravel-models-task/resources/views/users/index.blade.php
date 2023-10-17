@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <p>User List</p>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Info</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->get_user_info()}}</td>
            <td>
                <a href="{{ route('userAdmin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@stop

@section('css')

@stop

@section('js')

@stop