<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/js/app.js')
    </head>
    <body class="h-full text-gray-900 bg-gray-100">
        <div id="app" class="h-full"></div>
    </body>
</html>
