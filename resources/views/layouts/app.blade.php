<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Set the character encoding of the document -->
        <meta charset="utf-8">

        <!-- Set the viewport width to the width of the device and initial zoom level -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Set the title of the document -->
        <title>Instagram</title>

        <!-- Link to the CSS file -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="bg-gray-100">
        <!-- The header section of the page -->
        <header class="p-5 border-b bg-white shadow">

            <!-- Container that holds the header content -->
            <div class="container mx-auto flex justify-between items-center">

                <!-- The heading of the page -->
                <h1 class="text-3xl font-black">
                    DevStagram
                </h1>

                <!-- Check if the user is authenticated or not -->
                @auth
                <!-- Navigation bar for authenticated users -->
                <nav class="flex gap-2 items-center">
                    <!-- Link to create a new post -->
                    <a href="{{ route('posts.create')}}"
                        class="flex items-center gap-2 bg-white border p-2 text-gray-600  rounded text-sm uppercase font-bold cursor-pointer" >
                        Crear publicacion
                    </a>
                </nav>

                <!-- Link to the user profile and logout button -->
                <a class="font-bold uppercase text-gray-600 text-sm" href="#">Welcome
                    <span class="font-bold text-gray-600 text-sm" href="{{ route('posts.index', auth()->user()->username)}}">
                        {{ auth()->user()->name}}
                    </span>
                </a>

                <form method="POST" action="{{ route('logout')}}"> 
                    @csrf
                    <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesion</button>
                </form>
                @endauth

                <!-- Navigation bar for unauthenticated users -->
                @guest
                <nav class="flex-gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                </nav>
                @endguest

            </div>
        </header>

        <!-- The main content section of the page -->
        <main class="container mx-auto mt-10">
            <!-- The title of the page (will be replaced by the child page) -->
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            <!-- The content of the page (will be replaced by the child page) -->
            @yield('contenido')
        </main>

        <!-- The footer section of the page -->
        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos Los Derechos Reservados 
            {{ now()->year}}
        </footer>
    </body>
</html>
