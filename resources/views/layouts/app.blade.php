@php($currentRoute = Route::currentRouteName())
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }} - {{ ucfirst($currentRoute) }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/5.1.0/bootstrap.min.css') }}">
    <script src="{{ asset('js/fontawesome.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery/3.6.0/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/toastify-js.js') }}"></script>
    {{--    Toastify --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{-- CKEditor --}}
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
@include('layouts._header')
<main>
    <!-- Intro -->
    @include('components.alert')
    @yield('intro')
    <!--Search by category-->
    <div class="container @if($currentRoute != "Trang chủ") mt-140 @endif">
        @yield('content')
    </div>
</main>
<!-- Footer -->
@include('layouts._footer')
<script src="{{ asset('js/nav-bg.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
