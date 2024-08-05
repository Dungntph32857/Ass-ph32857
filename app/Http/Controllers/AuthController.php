<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->type == User::TYPE_ADMIN) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->intended('/');
            }

           
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        \request()->session()->invalidate();
        return redirect('/');
    }
    public function home()
    {
        return view('client.index');
    }

    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::query()->create($data);
        // dd($user);
        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('auth/login');
    }
}
