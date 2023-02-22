<div class="">
    <a {{ $attributes->merge([
        'class' => 'social-item hvr-bob collapse-item-link',
        'href' => '#collapseText'.$link->id,
    ]) }}>
        <div class="social-logo text-center">
            <img src="{{ asset($link->socialNetwork->logo) }}" alt="">
        </div>
        <div class="social-name">{{ $link->plain_value['title'] }}</div>
        <div class="icon-arrow text-center">
            <img src="{{ asset('/public/assets/icons/share.svg') }}" alt="">
        </div>
    </a>
    <div id="{{ 'collapseText'.$link->id }}" class="card d-none">
        <div class="card-body">
            <p>{{ $link->plain_value['content'] }}</p>
        </div>
    </div>
</div>
