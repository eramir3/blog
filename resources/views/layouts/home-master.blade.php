<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Blog')}}</title>    
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/toastr.css') }}">
    @yield('styles')
</head>
<body>

    <x-home.header></x-home.header>
    @auth
        <section class="auth">
            Logged in as <a href="{{route('user.entries.index', Auth::user()->id)}}"><span class="entry-author">{{Auth::user()->username}}</span></a>
        </section>
    @endauth
        @yield('content')
        
    <x-home.footer></x-home.footer>
    
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/components/toastr.min.js') }}"></script>
    <script src="{{ asset('js/components/toastr.js') }}"></script>
    @yield('scripts')
</html>