<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Turbolinks -->
    <script defer src="{{ mix('js/app.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" data-turbolinks-track="true" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" data-turbolinks-track="true" />
    <script defer src="{{ asset('js/init-alpine.js') }}" data-turbolinks-track="true"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <link href="{{ asset('plugin/izi-toast/css/iziToast.css') }}" rel="stylesheet" data-turbolinks-track="true" />
    <script defer src="{{ asset('plugin/izi-toast/js/iziToast.js') }}" data-turbolinks-track="true"></script>
    <script defer src="{{ asset('plugin/jquery/jquery.js') }}" data-turbolinks-track="true"></script>

    @livewireStyles

    <!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script> --}}
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.menu')
        @include('layouts.mobile-menu')

        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navigation-dropdown')
            <main class="h-full overflow-y-auto">
                {{ $slot }}
            </main>
        </div>


        @stack('modals')

        @livewireScripts
    </div>

    @include('vendor.lara-izitoast.toast')

    @stack('scripts')

</body>

</html>