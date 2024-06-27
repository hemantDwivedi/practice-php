<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    function signUpView(){
        return view('sign_up');
    }

    function signInView(Request $request){
        return view('sign_in', ['success'=>$request->__get('success')]);
    }

    function handleSignUp(Request $request){

        // validate request
        $request->validate([
            'signUpName' => 'required',
            'username' => 'required|max:30',
            'signUpEmail' => 'required|email',
            'password' => 'required_with:confirmPassword|same:confirmPassword|min:6|',
            'confirmPassword' => 'min:6',
        ]);


        $user = new User();
        $user->name = $request->signUpName;
        $user->username = $request->username;
        $user->email = $request->signUpEmail;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('signin'));
    }

    function handleSignIn(Request $request){
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)){
            return redirect(route('viewContact'));
        } else {
            return redirect('signin?success=false');
        }
    }
}
