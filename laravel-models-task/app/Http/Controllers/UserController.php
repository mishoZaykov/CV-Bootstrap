<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->get();

        return view('users.index', [
            'users'=>$users
        ]);
    }

    public function create(){

        return view('users.manage');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:6',
            // 'password_confirmation' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = strtolower($request->email);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('userAdmin.users.index')->with('success', 'User created successfully');
    }

    public function edit($id){

        $user = User::find($id);

        return view('users.manage',[
            'user' => $user
        ]);
    }
    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'required|unique:users,phone,'.$id,
            'password' => 'nullable|min:6',
            // 'password_confirmation' => 'required|same:password',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;

        if($request->password){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('userAdmin.users.index')->with('success', 'User updated successfully');
    }
}
