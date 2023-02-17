<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<title>@yield('title')</title>
<!-- CSS files -->
<link href="{{ asset('/public/lib/Tabler/dist/css/tabler.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('public/lib/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
@stack('css-lib')
@stack('css')