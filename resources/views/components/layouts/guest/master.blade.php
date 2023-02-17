<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-layouts.guest.head />

</head>
<body class="border-top-wide border-primary d-flex flex-column">

    {{ $slot }}
    
    <x-layouts.guest.footer />

    <x-alert />

</body>
</html>