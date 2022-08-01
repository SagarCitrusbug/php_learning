<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <main class="py-4">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://cdn.ckeditor.com/4.4.7/standard-all/adapters/jquery.js"></script>
    <script>
        $(document).ready(function(){
        var config = {
            height : 280,
            width : 1000,
            fullPage : true,
            linkShowAdvancedTab : false,
            scayt_autoStartup : true,
            enterMode : Number(2),
            toolbar : [
                ['Styles','Bold', 'Italic', 'Underline', '-', 
                'NumberedList',
                'BulletedList', 'SpellChecker', '-', 'Undo',
                'Redo', '-', 'SelectAll', 'NumberedList',
                'BulletedList','FontSize' ], [ 'UIColor' ] ]
        };
        $("#body").ckeditor(config);
    });
    </script>
</body>
</html>
