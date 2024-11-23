<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow-md p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ url('/') }}" class="font-semibold text-xl text-gray-800">{{ config('app.name', 'Laravel') }}</a>
                <div>
                    @guest
                        <a href="{{ route('login') }}" class="text-blue-600">Login</a>
                        <a href="{{ route('register') }}" class="ml-4 text-blue-600">Register</a>
                    @else
                        <div class="relative inline-block">
                            <button class="text-gray-700">{{ Auth::user()->name }}</button>
                            <div class="absolute right-0 mt-2 bg-white border shadow-lg p-2 rounded-md">
                                <a href="{{ route('logout') }}" class="block text-red-600" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
