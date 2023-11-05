<?php

namespace App\Http\Controllers\API;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponsData($success, 'User register successfully.');
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            $success['id'] =  $user->id;
   
            return $this->sendResponsData($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    // Assuming have a User model and the necessary routes and controller methods set up


    public function updateUserInfo(Request $request, $id)
    {
        // Validate the request data before updating the user info
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            // Add any other fields you want to update and validate
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user information
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // Update any other fields you want

        // Save the updated user info
        $user->save();

        // Optional: redirect to a success page or show a success message
        return $this->sendResponseMessage('User updated successfully.');
    }
    public function getUserInfo($id)
    {
        // Find the user by ID
        $user = User::select('id', 'name', 'email', 'email_verified_at')->findOrFail($id);

        // Optional: redirect to a success page or show a success message
        return $this->sendResponsData($user, 'User information.');
    }

}
