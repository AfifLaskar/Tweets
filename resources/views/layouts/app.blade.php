<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tweets') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>

    @yield('livewire-css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <section class="py-3">
            <header class="container">
                <h1>
                    <a href="/" class="text-decoration-none" style="color: #636b6f;">
                        {{ config('app.name', 'Tweets') }}
                    </a>
                </h1>
            </header>
        </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 mb-lg-0 mb-3">
                    @auth
                        @include('layouts.partials.sidebar')
                    @endauth
                </div>
                <div class="col-lg-6 order-lg-1 order-2 mb-5">
                    @yield('content')
                </div>
                <div class="col-lg-3 order-lg-2 order-1 mb-lg-0 mb-3">
                    @auth
                        @include('layouts.partials.friend-list')
                    @endauth
                </div>
            </div>
        </div>
    </div>    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

    @yield('scripts')

    @yield('livewire-scripts')

    <script>
        @if(Session::has('success'))
            toastr.options = {
                "positionClass": "toast-top-right",
                "timeOut": "4000",
                "progressBar": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
            }
            
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
</body>
</html>
