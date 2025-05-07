@props([
    'color' => 'slate-500',
    'title',
    'route',
    'icon',
])

<div 
    x-data="{ hover: false }"
    @mouseenter="hover = true"
    @mouseleave="hover = false"
    class="border-{{ $color }} bg-white border-2 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 p-6 cursor-pointer"
    @click="window.location.href='{{ route($route) }}'"
>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            {!! $icon !!}
            <h3 class="text-lg font-semibold text-{{ $color }}">{{ $title }}</h3>
        </div>
        <div x-show="hover" class="text-sm text-{{ $color }} transition-opacity duration-300">Ingresar →</div>
    </div>
</div>
