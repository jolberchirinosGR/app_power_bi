<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link id="favicon" rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo.webp') }}">
</head>

<body id="app">
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</html>
