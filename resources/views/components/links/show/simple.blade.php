<a {{ $attributes->merge(['class' => 'social-item hvr-bob', 'target' => '_blank', 'href' => $link->socialNetwork->prefix_link.$link->plain_value['value_any']]) }}>
    <div class="social-logo text-center">
        <img src="{{ asset($link->socialNetwork->logo) }}" alt="">
    </div>
    <div class="social-name">{{ $link->socialNetwork->name }}</div>
    <div class="icon-arrow text-center">
        <img src="{{ asset('/public/assets/icons/share.svg') }}" alt="">
    </div>
</a>
