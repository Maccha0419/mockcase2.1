<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ mix('js/like.js') }}" defer></script>
    <script src="{{ mix('js/menu.js') }}" defer></script>
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ mix('css/menu.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
</head>

    <body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <div id="menu" >
                    @guest
                    <menu-component><menu-component>
                    @endguest
                    @auth
                    <menu2-component><menu2-component>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>