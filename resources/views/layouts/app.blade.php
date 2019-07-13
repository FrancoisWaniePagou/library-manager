<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Home Page')</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    <script src="{{ URL::asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/index.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div id="app" class="container">
        <main class="py-4">
            <h2>Library Manager App</h2>
            @section('content')
            @show
        </main>
    </div>
</body>
</html>
