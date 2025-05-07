@extends('layouts.app')
@section('header')
    <h2 class="text-xl font-semibold text-gray-800 leading-tight">
        Dashboard
    </h2>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-6">Panel de Módulos</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <x-dashboard-card 
                    title="Usuarios" 
                    route="usuarios.index" 
                    color="slate-500"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-slate-500' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z' />
                        </svg>
                    SVG" />

                <x-dashboard-card 
                    title="Horarios" 
                    route="horarios.index" 
                    color="orange-500"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-orange-500' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z' />
                        </svg>
                    SVG" />

                <x-dashboard-card 
                    title="Tareas" 
                    route="tareas.index" 
                    color="lime-500"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-lime-500' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184' />
                        </svg>
                    SVG" />

                <x-dashboard-card 
                    title="Mantenimientos" 
                    route="mantenimientos.index" 
                    color="yellow-400"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-yellow-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75' />
                        </svg>
                    SVG" />
                
                <x-dashboard-card 
                    title="Relevamientos" 
                    route="relevamientos.index" 
                    color="emerald-700"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-emerald-700' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5' />
                        </svg>
                    SVG" />

                <x-dashboard-card 
                    title="Pluviometro" 
                    route="pluviometro.index" 
                    color="cyan-500"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-cyan-500' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M16 13a4 4 0 10-8 0H5a3 3 0 100 6h14a3 3 0 100-6h-3zM8 19v2m4-2v2m4-2v2' />
                        </svg>
                    SVG" />

                <x-dashboard-card 
                    title="Inventario" 
                    route="productos.index" 
                    color="pink-700"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-pink-700' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z' />
                        </svg>
                    SVG" />


                <x-dashboard-card 
                    title="Compras" 
                    route="compras.index" 
                    color="purple-500"
                    :icon="<<<'SVG'
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-purple-500' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z' />
                        </svg>
                    SVG" />
            </div>
        </div>
    </div>
@endsection
