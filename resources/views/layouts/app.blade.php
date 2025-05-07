<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-white border-r">
                <div class="p-4 text-lg font-bold">
                    Rara Cuenca App
                </div>
                <nav class="mt-4 px-4">
                    <ul class="space-y-2">
                        <!-- Dashboard -->
                        <li>
                            <a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Dashboard
                            </a>
                        </li>

                        <!-- Inventario Expandible -->
                        <li x-data="{ open: false }">
                            <a href="#" @click.prevent="open = !open" class="block py-2 px-3 rounded hover:bg-gray-200 items-center">
                                <span class="mr-2">Inventario</span>
                                <svg :class="{'transform rotate-180': open}" class="w-4 h-4 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <ul x-show="open" x-collapse class="pl-6 space-y-2">
                                <li>
                                    <a href="{{ route('productos.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                        Ver Inventario
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('areas.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                        Áreas Inventario
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Otros enlaces -->
                        <li>
                            <a href="{{ route('usuarios.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('horarios.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Horarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tareas.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Tareas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mantenimientos.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Mantenimientos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('relevamientos.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Relevamientos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pluviometro.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Pluviometro
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('inventario.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Inventario
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('compras.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">
                                Compras
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Contenido principal -->
            <div class="flex-1">
                <livewire:layout.navigation />

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
