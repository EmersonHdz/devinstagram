@extends('layouts.app')

@section('titulo')
  Crea una nueva publicacion
@endsection

@section('contenido')
<div 
class="md:flex md:justify-center md:gap-10 md:items-center">

  <div class="md:w-5/12">

  <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">



  </form>
    
  </div>


  <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">

    <form 
      method="POST" 
      action="{{route('register')}}">

      @csrf
      <div 
      class="mb-5">

          <label
            for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
              Titulo
          </label>

          <input
           id="titulo"
           value="{{ old('titulo')}}" 
           name="titulo" 
           type="text" 
           placeholder="Titulo de la publicacion" 
           class="border p-3 w-full rounded-lg uppercase">
          

           @error('titulo')
             <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
         @enderror

      </div>

      <div 
      class="mb-5">

          <label
            for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
              Descripcion
          </label>

          <textarea
           id="descripcion"
           name="descripcion" 
           placeholder="Descripcion de la publicacion" 
           class="border p-3 w-full rounded-lg">
        {{ old ('titulo')}}  
        
        </textarea>
          

           @error('titulo')
             <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
         @enderror

      </div>

     

     

     <input 
     type="submit" 
     value="Crear Publicacion" 
     class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3  text-white rounded-lg">
   
  </form>
  </div>
</div>

@endsection