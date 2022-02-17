<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function confirmLogin(AuthRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $adminInfo = Auth::user();
            $request->session()->put('user', $adminInfo->name);
            return redirect()->intended('login');
        }
        else{
            return redirect(route('login'))->withErrors('Credentials not matched.');
        }
    }
}
