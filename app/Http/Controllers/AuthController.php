<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login')->with(['body_class' => 'bg-primary']);
    }

    public function login_action(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field is must be an email.',
            'password.required' => 'Password field is required.'
        ]);

        $remember_me = $request->has('remember') ? true : false;

        $user = User::whereEmail($request->email)->first();

        if ($user && $user->isAdmin() && Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            return redirect('dashboard');
        } else {
            return back()->withErrors(['error' => 'Credentials not matched', 'email' => $request->email]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    private function admin_login()
    {
        // $role_id = Role::create(['name' => 'customer'])->id;

        $user_id = User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'contact_no' => '6291839827',
            'password' => Hash::make('password')
        ])->id;

        RoleUser::create([
            'user_id' => $user_id,
            'role_id' => 2,
        ]);
    }
}