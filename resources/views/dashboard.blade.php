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



<div class="grid grid-cols-3 gap-4">
    @foreach ($posts as $post)
        <div class="bg-gray-100 p-2">
            <a href="">
                <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen Post {{ $post->titulo }}">
            </a>
        </div>
    @endforeach
</div>
    
@endsection