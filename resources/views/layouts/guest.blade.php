<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Rara Cuenca APP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  
</head>
<body class="relative min-h-screen overflow-hidden bg-login">
  <main class="relative flex items-center justify-center min-h-screen px-4">
    @yield('content')
  </main>
  @livewireScripts
</body>
</html>
