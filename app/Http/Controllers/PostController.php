<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Protects the route so that only authenticated users can access it.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Displays the dashboard view for a specific user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }

    /**
     * Displays the post creation form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }
}
