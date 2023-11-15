<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Your Default Title')</title>
    <!-- Include your stylesheets, scripts, or other head elements here -->
</head>
<body>
    <header>
        @include('layout.parcial.nav') <!-- Include your navigation here -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('layout.parcial.footer') <!-- Include your footer here -->
    </footer>
    <!-- Include your scripts, such as JavaScript libraries, at the end of the body -->
    @yield('scripts')
</body>
</html>
