<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Image Uploader</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- JS -->
    @vite('resources/js/main.js')
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div id="app">
        <App :data={{json_encode($data)}} imgs-folder='{{url('src/imgs')}}' />
    </div>
</body>

</html>
