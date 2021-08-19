<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')

    @yield('styles')
</head>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('includes.header')

        @yield('content')
    </main>

    @include('includes.footer')
    @yield('scripts')
</body>
</html>
