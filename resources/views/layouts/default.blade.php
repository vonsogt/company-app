<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')

    @yield('styles')
</head>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('partials.header')

        @yield('content')
    </main>

    @include('partials.footer')
    @yield('scripts')
</body>
</html>
