<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::firstWhere('username', $request->username);

        if (!$user) {
            return back()->with('error', 'User Not Found!');
        }

        if (!Hash::check($request->password, $user->password, [])) {
            return back()->with('error', "Email or password doesn't match!");
        }

        $credentials['email'] = $user->email;
        $credentials['password'] = $request->password;

        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Authentication Failed!');
        }

        $request->session()->regenerate();
        return redirect()->intended('admin/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/auth/login');
    }
}
