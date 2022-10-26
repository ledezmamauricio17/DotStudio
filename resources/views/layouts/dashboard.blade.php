<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='css/app.css'>
    <link rel="shortcut icon" href="{{ asset('/storage/images/pagina/2nQVJg2qb4o7S7MSXMQzKdhkZo7UBxpKzZlxZp9d.png') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> --}}

    <title>Dashboard - Admin</title>
</head>

<body>
    <!-- component -->
    <header class="fixed w-full bg-primary h-20 pl-3 pr-10 flex justify-between z-50">
        <nav class="items-center flex text-2xl font-semibold">
            <a href="{{ asset('admin') }}" class="mr-12">
				<img src="{{ asset('/storage/images/pagina/2nQVJg2qb4o7S7MSXMQzKdhkZo7UBxpKzZlxZp9d.png') }}" alt="logo" class="z-50 w-36 h-32 transform lg:translate-y-6 mt-2">
			</a>CorpShekhina Dashboard
        </nav>

        <div class="cursor-pointer flex items-center">
        @if (Auth::user()->id == 1)
        <a href="{{ asset('crud-admin') }}" @if(request()->is('crud-admin')) class="pl-2 pt-1 rounded bg-blue-400 text-white hover:bg-blue-500  font-bold" @endif class="pl-2 pt-1 text-black text-md font-bold hover:bg-blue-400 hover:text-white rounded">
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg " viewBox="0 0 20 20 " fill="currentColor ">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
            </svg>
        </a>
        @endif
        <h1 class="ml-4 font-semibold  ">{{ Auth::user()->nombre }}</h1>
        </div>
    </header>


    <div class=" flex w-full pt-20 z-50">
        <div class="w-52 block">
            <div class="flex flex-col justify-between h-full p-4 bg-primary ">
                <div class="text-sm mt-16 pl-1 space-y-2 fixed ">
    				<p><a href="{{ asset('admin') }}" @if(request()->is('admin')) class="rounded bg-blue-400 text-white p-1 font-bold" @endif class="text-black text-md font-bold hover:bg-blue-400 hover:text-white p-1 rounded">Inicio</a></p>
    				<p><a href="{{ asset('edit-home') }}" @if(request()->is('edit-home')) class="rounded bg-blue-400 text-white p-1 font-bold" @endif class="text-black text-md font-bold hover:bg-blue-400 hover:text-white p-1 rounded">Página principal</a></p>
    				<p><a href="{{ asset('edit-quienes-somos') }}" @if(request()->is('edit-quienes-somos')) class="rounded bg-blue-400 text-white p-1 font-bold" @endif class="text-black text-md font-bold hover:bg-blue-400 hover:text-white p-1 rounded">¿Quienes somos?</a></p>
    				<p><a href="{{ asset('edit-nuestros-proyectos') }}" @if(request()->is('edit-nuestros-proyectos')) class="rounded bg-blue-400 text-white p-1 font-bold" @endif class="text-black text-md font-bold hover:bg-blue-400 hover:text-white p-1 rounded">Nuestros proyectos</a></p>
    				<p><a href="{{ asset('edit-pqr') }}" @if(request()->is('edit-pqr')) class="rounded bg-blue-400 text-white p-1 font-bold" @endif class="text-black text-md font-bold hover:bg-blue-400 hover:text-white p-1 rounded">PQR</a></p>
    				<p><a href="{{ asset('edit-contactenos') }}" @if(request()->is('edit-contactenos')) class="rounded bg-blue-400 text-white p-1 font-bold" @endif class="text-black text-md font-bold hover:bg-blue-400 hover:text-white p-1 rounded">Contáctenos</a></p>

    			</div>

                <div>
                    <div class="text-sm mt-16">
                    <p><a href="{{ route('password.confirm') }}" class="flex fixed bottom-16 text-black text-md font-bold hover:bg-blue-400 hover:text-white p-1 rounded">Cambiar contraseña</a></p>
                </div>
                    <form action="{{ route( 'logout') }} " method="POST">
                        @csrf
                        <button type="submit" class="fixed bottom-4 p-2 inline-flex items-center text-white bg-red-500 rounded cursor-pointer hover:bg-red-700 text-sm">
                            <svg class="w-4 h-4 mr-2 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 20 20 " fill="currentColor ">
                                <path fillRule="evenodd " d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z " clipRule="evenodd" />
                            </svg>
                            <span class="font-semibold ">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @yield('admin')
        @yield('edit-home')
        @yield('edit-contactenos')
        @yield('edit-nuestros-proyectos')
        @yield('edit-pqr')
        @yield('edit-quienes-somos')
        @yield('crud')
        @yield('create')
        @yield('edit')
    </div>

</body>


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</html>

