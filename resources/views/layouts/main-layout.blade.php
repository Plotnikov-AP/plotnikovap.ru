<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/main.css') }}" />
    <!-- Scripts -->                                                 
    <script src="{{ asset('/js/jquery.js') }}"></script>             
    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/js/myjs.js') }}"></script>               
    <script src="/js/functions.js"></script>                         
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>
<body onload="onloadd()";>
    {{ $content }}
</body>
</html>