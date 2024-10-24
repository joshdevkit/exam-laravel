<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div id="app" class="flex h-screen">
        @include('layouts.admin.sidebar')
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md flex justify-between items-center p-4 z-20 relative">
                <button id="toggleSidebar" class="text-gray-600 focus:outline-none md:hidden">
                    <x-lucide-menu class="w-8 h-8" />
                </button>
                <h1 class="text-2xl font-bold">@yield('title')</h1>
                <div class="relative">
                    <button id="userMenuButton" class="flex items-center space-x-3 focus:outline-none">
                        <img class="w-10 h-10 rounded-full object-cover" src="https://via.placeholder.com/100"
                            alt="User Avatar">
                        <span class="hidden md:inline-block font-medium text-gray-800">{{ Auth::user()->name }}</span>
                    </button>

                    <div id="userMenu"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-10">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="p-6 flex-1 bg-gray-100">
                @yield('content')
            </main>

        </div>
    </div>
    <script>
        const sidebar = document.getElementById('sidebar');

        const toggleButton = document.getElementById('toggleSidebar');
        const closeButton = document.getElementById('closeSidebar');

        toggleButton.addEventListener('click', function() {
            sidebar.classList.remove('-translate-x-full');
        });

        closeButton.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
        });


        //user avatar dropdown

        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');

        userMenuButton.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!userMenuButton.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>


</body>

</html>
