<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::where('user_id', $user->id)->get();

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
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


    public function store(Request $request)
    {
        $this->validate($request, [
           'titulo' => 'required|max:255',
           'descripcion' => 'required',
           'imagen' => 'required',
        ]);

   //     Post::create([
     //       'titulo' => $request->titulo,
     //       'descripcion' => $request->descripcion,
     //       'imagen' => $request->imagen,
      //      'user_id' => auth()->user()->id
      //  ]);

      $request->user()->posts()->create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'imagen' => $request->imagen,
        'user_id' => auth()->user()->id
      ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
