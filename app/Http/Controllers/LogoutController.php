<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Logs out the currently authenticated user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        auth()->logout(); // Logs out the currently authenticated user.
        return redirect()->route('login'); // Redirects the user to the login page.
    }
}

