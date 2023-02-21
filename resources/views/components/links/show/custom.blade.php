<a {{ $attributes->merge(['class' => 'social-item hvr-bob', 'target' => '_blank', 'href' => $link->plain_value['url']]) }}>
    <div class="social-logo text-center">
        <img src="{{ asset($link->plain_value['icon_url'] ?? config('custom.images.icon_share')) }}" alt="">
    </div>
    <div class="social-name">{{ $link->plain_value['title'] }}</div>
    <div class="icon-arrow text-center">
        <img src="{{ asset('/public/assets/icons/share.svg') }}" alt="">
    </div>
</a>
