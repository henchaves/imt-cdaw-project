<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
