<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'We-Bless')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.menu')

    <div class="py-4 w-full px-16" id="app">
        @yield('content')
    </div>

    <div class="absolute bottom-0">
        <div class="relative flex items-center justify-between h-16 px-6">
            <div class="text-blue-200 flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                01418442 @saacsos
            </div>
        </div>
    </div>


</body>
</html>
