<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- Link css, js vite --}}
    @vite([
    'resources/css/app.css',
    'resources/js/main.js',
    'resources/js/app.js',
    'resources/assets/vendor/bootstrap/css/bootstrap.min.css',
    'resources/assets/vendor/bootstrap-icons/bootstrap-icons.css',
    'resources/assets/vendor/quill/quill.snow.css',
    'resources/assets/vendor/remixicon/remixicon.css',
    'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    ])

    {{-- Favicons --}}
    <link href="{{ Vite::asset('resources/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ Vite::asset('resources/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>

    @include('user.components.header')

    @yield('content')

</body>

</html>
