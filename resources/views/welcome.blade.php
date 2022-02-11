<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>Bazzzz</title>

    </head>

    <body class="bg-light">
        <div id="app">
            <b-nav tabs fiil class="bg-info">
                <b-nav-item active>Bazzzzzzzzzzzzzzzzzzzzzz</b-nav-item>
            </b-nav>
        <router-view></router-view>
        </div>
    </body>

    <script src="{{ mix('js/app.js') }}"></script>
</html>
