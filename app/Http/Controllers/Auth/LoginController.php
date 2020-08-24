<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $loginAdmin = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => config('const.admin')
        ];

        $loginUser = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => config('const.user')
        ];

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($loginAdmin, $remember)) {

            return redirect()->route('admin.home');
        } elseif (Auth::attempt($loginUser, $remember)) {

            return redirect()->route('home');
        } else {
            
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
