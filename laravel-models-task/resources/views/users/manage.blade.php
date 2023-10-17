@extends('adminlte::page')

@section('title', 'Manage users')

@section('content_header')
    <h1>Manage Users</h1>
@stop

@section('content')
<form method="POST" action="{{ route('userAdmin.users.update', $user) }}">
    @if($user)
        @method('PUT')
    @else
        @method('POST')
    @endif

    @csrf
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name='name' id="name" placeholder="Name" value="{{$user->name ?? ''}}">
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name='email' id="email" placeholder="Email" value="{{$user->email ?? ''}}">
        @error('email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name='phone' id="phone" placeholder="Phone Number" value="{{$user->phone ?? ''}}">
        @error('phone')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name='password' id="password" placeholder="Password">
        @error('password')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop

@section('css')

@stop

@section('js')

@stop