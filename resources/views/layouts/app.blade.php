<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title : 'Laravel' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        @yield('scripts')
    </head>
    <body class="flex flex-col font-vcr relative min-h-screen">
        @include('layouts.partials._header')
        <main class="mt-6 min-h-full h-fill">
            @yield('content')
        </main>

        @include('layouts.partials._footer')

        <div id="popup" class="hidden">
        </div>
    </body>
</html>
