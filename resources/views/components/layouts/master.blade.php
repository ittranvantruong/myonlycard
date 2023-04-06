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
    <x-form id="formDeleteAccount" :action="route('profile.delete')" type="delete" />
    <x-layouts.scripts />
    <x-alert />
</body>
</html>