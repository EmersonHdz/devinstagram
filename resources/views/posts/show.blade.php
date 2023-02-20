@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')

<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
        <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del Post {{$post->titulo}}">

        <div class="p-3">
            <p>0 likes</p>
        </div>

        <div class="shadow mt-5">
            <p class="font-bold">{{ $post->user->username }}</p>
            <p class="mt-5">{{ $post->descripcion }}</p>
            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
        </div>
         
        @auth
         @if($post->user_id === auth()->user()->id)
        
           <form method="POST" action="{{ route('posts.destroy', $post) }}" >
            @method('DELETE') 
            @csrf
               <input type="submit" value="Eliminar Publicacion" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-5 cursor-pointer" >
           </form>
        @endif
        @endauth
    </div>

    <div class="md:w-1/2 p-5">

        <div class="shadow bg-white p-5 mb-4">

            @auth
            <p class="font-bold text-2xl text-center mb-7">Agregar un nuevo comentario</p>

            @if (session('mensaje'))
              <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                 {{session('mensaje')}}
              </div>
            @endif

            <form method="POST" action="{{ route('comentarios.store' , ['post' => $post, 'user' => $user ]) }}">
            @csrf
                <div class="mb-5 mt-5">
        
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                        Comentario
                    </label>
          
                    <textarea id="comentario" name="comentario" placeholder="Crea un comentario" class="border p-3 w-full rounded-lg text-gray-500">
                   
                     </textarea>          
          
                     @error('comentario')
                       <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
                     @enderror
          
          
                </div>

                <input  type="submit" value="Crear un comentario" class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3  text-white rounded-lg">

            </form>
            @endauth

           <div class="bg-white shadow mb-5 max-h-95 overflow-scroll mt-10">
            @if ($post->comentarios->count())

               @foreach ($post->comentarios as $comentario)

                 <div class="p-5 border-gray-400 border-b">
                    <a class="font-bold" href="{{ route('posts.index', $comentario->user ) }}">{{ $comentario->user->username }}</a>
                    <p>{{ $comentario->comentario }}</p>
                    <p class="text-sm text-gray-600 ">{{ $comentario->created_at->diffForHumans() }}</p>
                 </div>
                   
               @endforeach

            @else
              <p class="p-10 text-center">No Hay Comentarios Aun</p>                
            @endif
           </div>

        </div>
    </div>
</div>
    
@endsection