<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin() {
        return view('signin');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
            'remember' => '',
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();

        if(!$userInfo) {
            return back()->with('fail', 'We dont recognize your email');
        } else {
            if(Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect()->route('home');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function register(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5'
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save) {
            return back()->with('success', 'User has been successfully registered'); 
        } else {
            return back()->with('fail', 'Something went wrong');
        } 
    }
}
