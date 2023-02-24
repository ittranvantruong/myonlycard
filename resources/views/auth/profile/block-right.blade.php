<div class="cover-block bg-personalize px-3 py-4 d-flex flex-column" 
    style="background-color: {{ optional($auth->personalize)->background_color }}; 
    background-image: url({{ asset(optional($auth->personalize)->background_image_url) }});">
    @include('partials.block-avatar', [
        'avatar' => $auth->avatar,
        'fullname' => $auth->fullname,
        'description' => $auth->description,
        'personalize' => $auth->personalize
    ])
    <div class="row row-deck row-cards justify-content-center">
        <div class="col-12">
            @include('partials.list-card', ['links' => $auth->links])
        </div>
    </div>
    @include('partials.footer-logo')
</div>