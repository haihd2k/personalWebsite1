<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function getLogin(){

        return view('admin.auth.logIn');
    }

    public function postLogin(Request $request){

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'required' => 'This field must not be blank!',
        ];

        $request->validate($rules, $messages);

        // $credentials = $request->only('username', 'password');

        if(Auth::guard('admins')->attempt(['username' => $request->username, 'password' => $request->password])){
            // dd(Auth::guard('admins')->check(), Auth::guard('admins')->user());
            return redirect()->route('admin.home')->with('success', 'Successfully Login!');
        }

        return redirect()->back()->with('error', 'Failed to login!');
    }

    public function getLogout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('admin.auth.logout');
    }

}
