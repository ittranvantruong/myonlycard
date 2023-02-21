@section('title', config('custom.site_name'))
<x-layouts.master>
    <div class="page-wrapper bg-personalize" 
        style="background-color: {{ optional($auth->personalize)->background_color }}; 
        background-image: url({{ asset(optional($auth->personalize)->background_image_url) }});">
        <div class="page-body">
            <div class="container-xl">
                @include('partials.block-avatar', [
                    'avatar' => $auth->avatar,
                    'fullname' => $auth->fullname,
                    'description' => $auth->description,
                    'personalize' => $auth->personalize
                ])
                <div class="row mb-3">
                    <div class="col text-center">
                        <a href="{{ route('profile.edit') }}" class="btn btn-bitbucket rounded-pill">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                <path d="M13.5 6.5l4 4"></path>
                             </svg>
                            {{ __('Chỉnh sửa') }}
                        </a>
                    </div>
                </div>
                <div class="row row-deck row-cards justify-content-center">
                    <div class="col-12 col-md-4">
                        @include('partials.list-card', ['links' => $auth->links])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>