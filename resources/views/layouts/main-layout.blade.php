<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />     
    <meta name="description" content="Сайт-визитка Плотникова Александра" /> 
    <meta name="keywords" content="plotnikov, plotnikovap, Плотников, Плотников Александр" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/main.css') }}" />
    <!-- Scripts -->                                                 
    <script src="{{ asset('/js/jquery.js') }}"></script>             
    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/js/functions.js') }}"></script> 
    <script src="{{ asset('/js/my.js') }}"></script>               
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>
<body onload="onloadd()";>
    <x-my-header />
    {{ $content }}
    <x-my-footer /> 
</body>
</html>