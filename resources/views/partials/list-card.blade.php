<div class="d-flex social-wrap">
    @if($links)
        @foreach($links as $link)
            <x-card-link target="_blank" :type="optional($link->socialNetwork)->type" :link="$link->plain_value" :name="optional($link->socialNetwork)->name" :logo="optional($link->socialNetwork)->logo">
                <div class="icon-arrow text-center">
                    <img src="{{ asset('/public/assets/icons/share.svg') }}" alt="">
                </div>
            </x-card-link>
        @endforeach
    @endif
</div>
