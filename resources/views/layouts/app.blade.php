<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
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
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">

        {{-- Sidebar --}}
        <aside
            :class="sidebarOpen ? 'block' : 'hidden md:block'"
            class="fixed inset-y-0 left-0 w-64 bg-white border-r z-20 md:relative md:z-auto">
            <div class="p-4 text-lg font-bold">{{ config('app.name') }}</div>
            <nav class="mt-4 px-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}"
                           class="block py-2 px-3 rounded hover:bg-gray-200">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('usuarios.index') }}"
                           class="block py-2 px-3 rounded hover:bg-gray-200">
                            Usuarios
                        </a>
                    </li>

                    {{-- Horarios --}}
                    @if(Auth::user()->role === 'admin')
                        <li x-data="{ open: false }">
                            <a href="#" @click.prevent="open = ! open"
                               class="flex justify-between py-2 px-3 rounded hover:bg-gray-200">
                                <span>Horarios</span>
                                <svg :class="{ 'transform rotate-180': open }"
                                     class="w-4 h-4 transition-transform"
                                     xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                            <ul x-show="open" x-collapse class="pl-6 space-y-2">
                                <li>
                                    <a href="{{ route('horarios.index') }}"
                                       class="block py-2 px-3 rounded hover:bg-gray-200">
                                        Horarios Admin
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('horarios.jornales') }}"
                                       class="block py-2 px-3 rounded hover:bg-gray-200">
                                        Jornales
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('horarios.history') }}"
                                       class="block py-2 px-3 rounded hover:bg-gray-200">
                                        Ver Historial
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @elseif(Auth::user()->role === 'editor')
                        <li>
                            <a href="{{ route('horarios.index') }}"
                               class="block py-2 px-3 rounded hover:bg-gray-200">
                                Horarios
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('tareas.index') }}"
                           class="block py-2 px-3 rounded hover:bg-gray-200">
                            Tareas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mantenimientos.index') }}"
                           class="block py-2 px-3 rounded hover:bg-gray-200">
                            Mantenimientos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('relevamientos.index') }}"
                           class="block py-2 px-3 rounded hover:bg-gray-200">
                            Relevamientos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pluviometro.index') }}"
                           class="block py-2 px-3 rounded hover:bg-gray-200">
                            Pluviometro
                        </a>
                    </li>

                    {{-- Inventario --}}
                    <li x-data="{ open: false }">
                        <a href="#" @click.prevent="open = !open"
                           class="flex justify-between py-2 px-3 rounded hover:bg-gray-200">
                            <span>Inventario</span>
                            <svg :class="{'transform rotate-180': open}"
                                 class="w-4 h-4 transition-transform"
                                 xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <ul x-show="open" x-collapse class="pl-6 space-y-2">
                            <li>
                                <a href="{{ route('productos.index') }}"
                                   class="block py-2 px-3 rounded hover:bg-gray-200">
                                    Ver Inventario
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('areas.index') }}"
                                   class="block py-2 px-3 rounded hover:bg-gray-200">
                                    Áreas Inventario
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('compras.index') }}"
                           class="block py-2 px-3 rounded hover:bg-gray-200">
                            Compras
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        {{-- Overlay móvil --}}
        <div x-show="sidebarOpen"
             class="fixed inset-0 bg-black bg-opacity-50 z-10 md:hidden"
             @click="sidebarOpen = false">
        </div>

        {{-- Contenido principal --}}
        <div class="flex-1 flex flex-col">

            {{-- Header móvil --}}
            <header class="bg-white border-b flex items-center justify-between px-4 py-2 md:hidden">
                <button @click="sidebarOpen = !sidebarOpen"
                        class="text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!sidebarOpen" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="sidebarOpen" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">{{ config('app.name') }}</h1>
            </header>

            {{-- Navbar escritorio --}}
            <nav class="hidden md:flex items-center justify-between bg-white border-b px-6 py-3">
                {{-- Logo / App Name --}}
                <div class="flex items-center space-x-2">
                    <a href="{{ route('dashboard') }}"
                       class="text-xl font-bold text-gray-800">
                        {{ config('app.name') }}
                    </a>
                </div>
                {{-- User menu --}}
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <a href="{{ route('profile') }}"
                       class="text-gray-600 hover:text-gray-800">
                        Perfil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-red-600 hover:text-red-800 focus:outline-none">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </nav>

            {{-- Page Heading (todos los tamaños) --}}
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Main content --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>