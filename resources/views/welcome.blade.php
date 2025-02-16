<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles / Scripts -->

    </head>
    <body class="font-sans antialiased flex items-center justify-center min-h-screen bg-gray-500 bg-pattern">
        <div class="flex flex-col container gap-10 bg-">
            <x-alert type="success">
                This is a success message
            </x-alert>
            <x-alert type="error">
                This is a error message
            </x-alert>
            <x-alert type="warning">
                This is a warning message
            </x-alert>
            <x-alert type="info">
                This is a info message
            </x-alert>
        </div>
    </body>
</html>
