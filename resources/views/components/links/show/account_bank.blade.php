<a href="#" {{ $attributes->merge(['class' => 'social-item hvr-bob']) }}>
    <div class="social-logo text-center">
        <img src="{{ asset($link->socialNetwork->logo) }}" alt="">
    </div>
    <div class="social-name">{{ $link->plain_value['bank_name'] }}</div>
    <div class="icon-arrow text-center">
        <img src="{{ asset('/public/assets/icons/share.svg') }}" alt="">
    </div>
</a>
