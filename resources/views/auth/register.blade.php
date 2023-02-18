@extends('layouts.app')


@section('titulo')
    Registrate en DevStagram  <!-- Page title -->
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-5/12">
           <img class="rounded-lg" src="{{ asset('img/6.jpg') }}" alt="Imagen de registro">
        </div>


        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">

            <!-- Registration form -->

          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-5">
                <!-- Name input field label -->
                <label  for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>

                
                <input value="{{ old('name')}}" id="name" name="name" type="text" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg
                @error('name') border-red-500 @enderror">

             @error('name')
                <!-- Display error message for name input field -->
                 <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
             @enderror
            </div>

            <div class="mb-5">
                 <!-- Username input field label -->
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>

                <input value="{{ old('username')}}" id="username" name="username" type="text" placeholder="Tu Nombre De Usuario"  class="border p-3 w-full rounded-lg
                @error('username') border-red-500 @enderror">
                
                @error('username')

                 <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>

                @enderror
            </div>

            <div class="mb-5">
                <!-- Email input field label -->
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Tu Email
                </label>

                <input value="{{ old('email')}}" id="email" name="email" type="text" placeholder="Tu Emai" class="border p-3 w-full rounded-lg
                @error('username') border-red-500 @enderror">

                @error('email')
                   <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <!-- Password input field label -->
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>

                <input id="password" name="password" type="password" placeholder="Tu Password" class="border p-3 w-full rounded-lg
                @error('password') border-red-500 @enderror">

                
                @error('password')

                     <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>

                @enderror
            </div>

            <div class="mb-5">
              <!-- Password confirmation input field label -->
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                Repetir Password
                </label>

                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite Tu Password"class="border p-3 w-full rounded-lg
                  @error('password_confirmation') border-red-500 @enderror">


              
                @error('password_confirmation')
                  <p class=" my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
                @enderror
         </div>

           <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3  text-white rounded-lg">

        </form>



        </div>
    </div>
@endsection