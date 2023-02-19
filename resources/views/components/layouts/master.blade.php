<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-layouts.head />

</head>
<body>
    <div class="page">
        <x-layouts.header />
        {{ $slot }}
        <x-layouts.footer />
    </div>
    <x-layouts.scripts />
    <x-alert />
</body>
</html>