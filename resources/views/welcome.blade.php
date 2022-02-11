<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>Bazzzz</title>

    </head>

    <body class="bg-light">
        <div id="app">
        <nav-bar></nav-bar>
        <router-view></router-view>
        </div>
    </body>

    <script src="{{ mix('js/app.js') }}"></script>
</html>
