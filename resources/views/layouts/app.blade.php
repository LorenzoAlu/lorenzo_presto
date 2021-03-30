<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/2af1bb5c84.js" crossorigin="anonymous"></script>
    
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{--   <link rel="stylesheet" href="../package/swiper-bundle.min.css"> --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />

</head>
<body>
    <div id="app">
        
        <x-navbar/>

        <main class="py-4">
            @yield('content')
        </main>
    </div>



</body>
</html>
