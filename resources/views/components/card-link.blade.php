<a {{ $attributes->merge(['class' => 'social-item hvr-bob', 'href' => $handleLink()]) }}>
    <div class="social-logo text-center">
        <img src="{{ asset($logo) }}" alt="">
    </div>
    <div class="social-name">{{ $name }}</div>
    {{ $slot }}
</a>
