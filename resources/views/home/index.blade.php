@section('title', config('custom.site_name'))
@push('css')
<link rel="stylesheet" href="{{ asset('public/assets/css/hover.css') }}">
<style>
    .wrap-avatar{
        width: 190px;
        height: 190px;
        margin: 0 auto;
    }
    .wrap-avatar img{
        object-fit: cover;
        width: 190px;
        height: 190px;
    }
    .social-item{
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 10px;
        background: white;
        box-shadow: 3px 4px 2px #e0e0e0, 6px 8px 8px #b0b0b0;
        border-radius: 5px;
        border: 1px solid #dddddd;
    }
    .social-item div{
        flex-basis: 0;
        flex-grow: 1;
    }
    .social-item .social-name{
        flex-grow: 5;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        color: #242424;
    }
    a.social-item:hover{
        text-decoration: none;
    }

    .social-item .social-logo{
        background-color: #f6f6f6;
        border-radius: 50%;
    }
    .social-item .social-logo img{
        padding: 10px;
    }
</style>   
@endpush
<x-layouts.master>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="wrap-avatar">
                            <img class="shadow-sm rounded" src="{{ asset($auth->avatar ?? config('custom.images.avatar_default')) }}" alt="">
                        </div>
                    </div>
                    <div class="col-12">
                        <h1 class="text-center mt-3">{{ $auth->fullname }}</h1>
                    </div>
                    <div class="col-12">
                        <p class="text-center mt-3">{{ $auth->description }}</p>
                    </div>
                </div>
                <div class="row row-deck row-cards justify-content-center">
                    <div class="col-12 col-md-4">
                        <div class="d-flex social-wrap">
                            @if($auth->userSocialNetwork)
                                @foreach($auth->userSocialNetwork as $item)
                                <a href="#" class="social-item hvr-bob">
                                    <div class="social-logo text-center">
                                        <img src="{{ asset(optional($item->socicalNetwork)->logo) }}" alt="">
                                    </div>
                                    <div class="social-name">{{ optional($item->socicalNetwork)->name }}</div>
                                    <div class="icon-arrow text-center">
                                        <img src="{{ asset('/public/assets/icons/share.svg') }}" alt="">
                                    </div>
                                </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>