@extends('layouts.app')

@section('titulo')
   Editar Perfil: {{auth()->user()->username}}
    
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" enctype="multipart/form-data">

             @csrf
                <div class="mb-5">
                    <!-- Name input field label -->
                    <label  for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
    
                    
                    <input value="{{ auth()->user()->username }}" id="username" name="username" type="text" placeholder="Tu Nombre de usuario" class="border p-3 w-full rounded-lg
                    @error('username') border-red-500 @enderror">
    
                 @error('username')
                    <!-- Display error message for name input field -->
                     <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
                 @enderror
                </div>


                <div class="mb-5">
                    <!-- Name input field label -->
                    <label  for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen de perfil
                    </label>
    
                    
                    <input value="" id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-lg"
                    accept=".jpg, .jpeg, .png">
                </div>

                <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3  text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection