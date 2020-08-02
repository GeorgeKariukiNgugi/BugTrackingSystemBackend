<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {     
           
        // $validatedData = $request->validate([
        //     'name' => 'required|max:55',
        //     'email' => 'email|required|unique:users',
        //     'password' => 'required|confirmed'
        // ]);		        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),422);

        }
        
        $hashedPassword = bcrypt($request->password);

        // $user = User::create($validatedData);
        // ! creating a user to the database. 

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $hashedPassword;

        $user->save();
        
        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($loginData->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($loginData->errors(),422);

        }
        $credentials = $request->only('email', 'password');
        if (!auth()->attempt($credentials)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }
}
