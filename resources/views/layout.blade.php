<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de Cursos {{ $title ?? '' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-10">
    @include('partials.menu')
</header>

{{-- Seção opcional full-width para a largura total caso precise--}}
@yield('fullwidth')

<!-- Conteúdo centralizado -->
<main class="max-w-6xl mx-auto py-10 px-4 grid gap-6 md:grid-cols-3">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white border-t mt-10 py-6 text-center text-sm text-gray-500">
    © 2025 LailsonDev. Todos os direitos reservados.
</footer>
</body>
</html>
