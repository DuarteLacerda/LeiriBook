<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Your Default Title')</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="favicon" href="images/logo.ico" type="image/x-icon">
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/smoothscroll.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/navbar.js"></script>
</body>

</html>
