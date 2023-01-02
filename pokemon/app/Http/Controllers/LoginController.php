<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Check if email exists in database
    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $user = \App\Models\User::where('email', $email)->first();

        if ($user) {
            return response()->json(['message' => 'Email exists'], 200);
        } else {
            return response()->json(['message' => 'Email does not exist'], 404);
        }
    }

    // Register 
    public function register(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        if ($check) {
            return response()->json(['message' => 'Registered'], 201);
        }
        return response()->json(['message' => 'Not Registered'], 500);
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    // Authenticate
    public function authenticate(Request $request)
    {   
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Authenticated'], 200);
        }
        return response()->json(['message' => 'Not Authenticated'], 404);
    }

    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
    
}
