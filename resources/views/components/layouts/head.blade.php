<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0, viewport-fit=cover"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<meta name="X-TOKEN" content="{{ csrf_token() }}">
<title>@yield('title')</title>
<!-- CSS files -->
<link href="{{ asset('/public/lib/Tabler/dist/css/tabler.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('/public/lib/Tabler/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('public/lib/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/assets/css/hover.css') }}"> 
<link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
@stack('css-lib')
@stack('css')