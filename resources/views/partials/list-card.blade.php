<div class="d-flex social-wrap">
    @if($links)
        @foreach($links as $link)
            <x-link-show :link="$link" />
        @endforeach
    @endif
</div>
