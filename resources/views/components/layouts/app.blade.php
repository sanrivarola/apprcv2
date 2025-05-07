<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased">
    {{ $slot }}
    @livewireScripts
</body>
</html>
