<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/himel.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}?v={{ time() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Vromonkonna') – Women Exploring Bangladesh &amp; Beyond</title>
    <meta name="description" content="@yield('meta_description', 'A comprehensive women\'s platform redefining safety, growth, and opportunity in Bangladesh.')">
    {{-- google font --}}
    <link href="asset('frontend/css/css2.css')" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}" />
    @yield('styles')
</head>

<body>

    @include('partials.navbar')
    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    @stack('scripts')
    @yield('scripts')

</body>

</html>
