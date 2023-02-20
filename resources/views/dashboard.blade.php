@extends('layouts.app')

@section('titulo')
Perfil: {{ $user->username }}
@endsection

@section('contenido')

<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
    <div class="md:w-8/12 lg:w-6/12 px-5">
        <img class="rounded-lg" src="{{ asset('img/usuario.svg') }}" alt="Imagen de registro">
    </div>
    
    <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
    
        <p class="text-gray-700 text-2xl">{{ $user->username}}</p>

        <p class="text-gray-800 text-sm mb-3 font-bold">
            0
            <span class="font-normal">Seguidores</span>
        </p>

        <p class="text-gray-800 text-sm mb-3 font-bold">
            0
            <span class="font-normal">Siguiendo</span>
        </p>

        <p class="text-gray-800 text-sm mb-3 font-bold">
            0
            <span class="font-normal">Post</span>
        </p>

    </div>
    
    </div>
</div>


<section class="container  mx-auto mt-10">

   <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

   @if ($posts->count())
       
   
<div class="grid md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-2 place-items-center">
    @foreach ($posts as $post)
        <div class="place-items-center">
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $user ]) }}">
                <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen Post {{ $post->titulo }}">
            </a>
            
        </div>
    @endforeach
</div>

<div class="flex justify-center font-bold text-4xl m-5">
    {{ $posts->links() }}
</div>
    
   @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold" >No hay post</p>
   @endif

</section>

    
@endsection