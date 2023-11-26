<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="Best site to find electronics product.">

    <!-- tailwind css -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <!-- alpinejs -->
    <script defer src="{{ asset('js/init-alpine.js') }}" data-turbolinks-track="true"></script>
    <!-- izi toast -->
    <link href="{{ asset('plugin/izi-toast/css/iziToast.css') }}" rel="stylesheet" data-turbolinks-track="true" />
    <script defer src="{{ asset('plugin/izi-toast/js/iziToast.js') }}" data-turbolinks-track="true"></script>
    <!-- jQuery -->
    <script defer src="{{ asset('plugin/jquery/jquery.js') }}" data-turbolinks-track="true"></script>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
    .work-sans {
        font-family: 'Work Sans', sans-serif;
    }

    #menu-toggle:checked+#menu {
        display: block;
    }

    .hover\:grow {
        transition: all 0.3s;
        transform: scale(1);
        filter: grayscale(2)
    }

    .hover\:grow:hover {
        transform: scale(1.02);
        filter: grayscale(0)
    }

    .carousel-open:checked+.carousel-item {
        position: static;
        opacity: 100;
    }

    .carousel-item {
        -webkit-transition: opacity 0.6s ease-out;
        transition: opacity 0.6s ease-out;
    }

    #carousel-1:checked~.control-1,
    #carousel-2:checked~.control-2,
    #carousel-3:checked~.control-3,
    #carousel-4:checked~.control-4,
    #carousel-5:checked~.control-5,
    #carousel-6:checked~.control-6 {
        display: block;
    }

    .carousel-indicators {
        list-style: none;
        margin: 0;
        padding: 0;
        position: absolute;
        bottom: 2%;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 10;
    }

    #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
    #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
    #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet,
    #carousel-4:checked~.control-4~.carousel-indicators li:nth-child(4) .carousel-bullet,
    #carousel-5:checked~.control-5~.carousel-indicators li:nth-child(5) .carousel-bullet,
    #carousel-6:checked~.control-6~.carousel-indicators li:nth-child(6) .carousel-bullet {
        color: #000;
        /*Set to match the Tailwind colour you want the active one to be */
    }
    </style>

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    @include('layouts._customer-nav')

    <main class="pt-24">
        {{ $slot }}
    </main>

    @include('layouts._customer-footer')
    @include('vendor.lara-izitoast.toast')

    @stack('scripts')
</body>

</html>