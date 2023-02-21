<div class="social-logo text-center">
    <img src="{{ asset($link->plain_value['icon_url'] ?? config('custom.images.icon_share')) }}" alt="">
</div>
<div class="social-name">{{ $link->plain_value['title'] }}</div>