<!DOCTYPE>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
    <!-- css/app.cssを先に-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a463021397.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    <div class="template">
        <div class="main-page">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    @livewireScripts
</body>
</html>
