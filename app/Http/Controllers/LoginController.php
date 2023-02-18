<?php

namespace App\Http\Controllers;

use view;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // The index method displays the login form.
    public function index() {
        return view('auth.login');
    }
    // The store method is used to authenticate the user.
    public function store(Request $request) {
    // Validation rules for the email and password fields.
        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required'
        ]);
    // Attempt to authenticate the user.
        if(!auth()->attempt($request->only('email' , 'password'), $request->remember)) {
              return back()->with('mensaje', 'Credenciales Incorrectas');   
         }
    // If authentication is successful, redirect to the posts index page with the user's username.
         return redirect()->route('posts.index', auth()->user()->username);
    }
}
