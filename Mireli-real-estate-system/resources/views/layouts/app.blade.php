<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mireli Real Estate')</title>

    @fonts

    {{-- Styles load only after "npm run dev" or "npm run build" (see SETUP.md). --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/main.css', 'resources/js/app.js'])
    @endif

    @stack('head')
</head>
<body>
    @include('partials.header')

    <main class="site-main">
        {{-- Full-width band at the top of a page (used by the home page hero) --}}
        @yield('hero')

        {{-- INTERFACE I2: every page puts its content in this one section --}}
        <div class="container">
            @include('partials.flash')
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
