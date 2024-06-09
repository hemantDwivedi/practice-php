<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    function welcomePage()
    {
        return view('welcome');
    }


    function handleLogin(Request $req){

        $req->validate([
            'email' => 'required | email',
            'password' => 'required | max:50'
        ]);

        $credentials = $req->only("email", "password");

        if (Auth::attempt($credentials)){
            return redirect(route("welcome"));
        } else {
            return redirect('login?success=false');
        }
    }

    function loginPage(Request $request)
    {

        if (View::exists('login')) { // checks view is exists or not
            return view('login', ['success'=>$request->__get('success')]);
        } else {
            echo 'Login page not found';
        }
    }

    function registerPage()
    {
        return view('register');
    }

    function handleRegister(Request $req)
    {
        $req->validate([
            'fullName'=>'required',
            'email' => 'required | email',
            'password' => 'required | max:50',
            'confirmPassword' => 'required | max:50'
        ],[
            'fullName.required' => 'Name field is required'
        ]);

        $user = new User();
        $user->name = $req->fullName;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);

        if ($user->save()){
            return redirect(route("login"))->with("success", "Registration successfully");
        }

        return redirect(route("register"))->with("failed", "Server down");
    }

    function contactPage()
    {
        return view('contactus');
    }
}
