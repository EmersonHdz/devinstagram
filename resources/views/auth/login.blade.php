@extends('layouts.app')

@section('titulo')
    Login en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <!-- Div for image -->
        <div class="md:w-5/12">
            <img class="rounded-lg" src="{{ asset('img/login.jpg') }}" alt="Imagen de registro">
        </div>

        <!-- Div for login form -->
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">

            <!-- Login form -->
            <form method="POST" action="{{route('login')}}">
                
              @csrf
                @if (session('mensaje'))
                    <!-- Display any error message stored in the session -->
                    <p class="my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <!-- Email input field -->
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Tu Email</label>
                    <input id="email" name="email" type="text" placeholder="Tu Emai" class="border p-3 w-full rounded-lg">

                    @error('email')
                        <!-- Display any validation error messages for email field -->
                        <p class="my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <!-- Password input field -->
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" type="password" placeholder="Tu Password" class="border p-3 w-full rounded-lg">

                    @error('password')
                        <!-- Display any validation error messages for password field -->
                        <p class="my-2 rounded-lg text-sm p-2 text-center font-bold bg-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <!-- "Remember me" checkbox -->
                    <input type="checkbox" name="remember">Mantener mi sesion abierta
                </div>

                <!-- Submit button for form -->
                <input type="submit" value="Iniciar Session" class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
