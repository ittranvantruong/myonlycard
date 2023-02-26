@section('title', config('custom.site_name'))    
@push('css')
    <link rel="stylesheet" href="{{ asset('public/assets/css/hover.css') }}"> 
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
@endpush
<x-layouts.guest.master>
    <div class="page-wrapper bg-personalize" 
        style="background-color: {{ optional($user->personalize)->background_color }}; 
        background-image: url({{ asset(optional($user->personalize)->background_image_url) }});">
        <div class="page-body">
            <div class="container-xl">
                @include('partials.block-avatar', [
                    'avatar' => $user->avatar,
                    'fullname' => $user->fullname,
                    'description' => $user->description,
                    'personalize' => $user->personalize
                ])
                <div class="row row-deck row-cards justify-content-center">
                    <div class="col-12 col-md-4">
                        @include('partials.list-card', ['links' => $user->links])
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer-logo')
    </div>
    @include('qrcode.modal', ['user' => $user])
</x-layouts.guest.master>