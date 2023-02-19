<div class="cover-block px-3 py-4">
    @include('partials.block-avatar', [
        'avatar' => $auth->avatar,
        'fullname' => $auth->fullname,
        'description' => $auth->description,
    ])
    <div class="row row-deck row-cards justify-content-center">
        <div class="col-12">
            @include('partials.list-card', ['links' => $auth->links])
        </div>
    </div>
</div>