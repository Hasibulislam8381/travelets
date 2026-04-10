<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/himel.css') }}?v={{ time() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Vromonkonna') – Women Exploring Bangladesh &amp; Beyond</title>
    <meta name="description" content="@yield('meta_description', 'A comprehensive women\'s platform redefining safety, growth, and opportunity in Bangladesh.')">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css"
        integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('styles')
</head>

<body>

    @include('partials.navbar')
    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js"
        integrity="sha512-nKXmKvJyiGQy343jatQlzDprflyB5c+tKCzGP3Uq67v+lmzfnZUi/ZT+fc6ITZfSC5HhaBKUIvr/nTLCV+7F+Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')

</body>

</html>
