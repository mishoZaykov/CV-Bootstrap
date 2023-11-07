<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a list of users in the dashboard.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('users.dashboard',['users' => $users]);
    }

    /**
     * Display the user creation form.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a new user in the database.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\ReidrectResponse 
     */
    public function store(Request $request)
    {
        $this->validateUserRequest($request);

        $user = new User([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        
        return redirect()->route('admin.index')->with('success', 'User was created  successfully');
    }

    /**
     * Display the form for editing a user.
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit',['user' => $user]);
    }


    /**
     * Update an existing user record in the database.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $this->validateUserRequest($request);

        $user = User::find($id);
        $user->name = $request->name;

        if($request->password){
            $user->password = bcrypt($request->password);
        }

        $user->phone_number = $request->phone_number;
        $user->email = strtolower($request->email);

        $user->save();

        return redirect()->route('admin.index')->with('success', 'User was updated successfully');
    }

    /**
     * Delete a user record from the database.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User was deleted successfully');
    }

    /**
     * Validate the user request data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateUserRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'requred|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 400);
        }
    }
}
