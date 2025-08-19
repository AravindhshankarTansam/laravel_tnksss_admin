<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
@vite('resources/css/app.css')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
    <div class="p-4 text-xl font-bold border-b">
        Admin Panel
    </div>
    <nav class="mt-4">
        <ul>
            <li class="px-4 py-2 hover:bg-gray-200">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>

            <!-- Website Management Dropdown -->
            <li x-data="{ open: false }" class="px-4 py-2 hover:bg-gray-200 cursor-pointer">
                <div @click="open = !open" class="flex justify-between items-center">
                    Website Management
                    <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <ul x-show="open" class="mt-2 pl-4">
                    <li class="py-1 hover:bg-gray-100">
                        <a href="{{ route('slider.index') }}">Home Page Slider</a>
                    </li>
                    <!-- You can add more dropdown items here -->
                     <li class="py-1 hover:bg-gray-100">
                        <a href="{{ route('aboutus.index') }}">About us</a>
                    </li>
                </ul>
            </li>

            <li class="px-4 py-2 hover:bg-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
</aside>


        <!-- Main Content -->
        <div class="flex-1 p-6">
            @include('layouts.navigation') <!-- optional top nav -->
            @yield('content')
        </div>

    </div>
</body>
</html>
