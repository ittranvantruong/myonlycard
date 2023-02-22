<div class="">
    <a {{ $attributes->merge([
        'class' => 'social-item hvr-bob collapse-item-link',
        'href' => '#collapseText'.$link->id,
        'style' => 'background-color: '.$link->plain_value['background_color'].'; color: '.$link->plain_value['text_color']
    ]) }}>
        <div class="social-logo text-center" style="color: {{ $link->plain_value['text_color'] }}">
            <img src="{{ asset($link->socialNetwork->logo) }}" alt="">
        </div>
        <div class="social-name" style="color: {{ $link->plain_value['text_color'] }}">{{ $link->plain_value['title'] }}</div>
        <div class="icon-arrow text-center" style="color: {{ $link->plain_value['text_color'] }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-share" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M8.7 10.7l6.6 -3.4"></path>
                <path d="M8.7 13.3l6.6 3.4"></path>
             </svg>
        </div>
    </a>
    <div id="{{ 'collapseText'.$link->id }}" class="card d-none" style="background-color: {{ $link->plain_value['background_color'] }};color: {{ $link->plain_value['text_color'] }};">
        <div class="card-body">
            <p style="color: {{ $link->plain_value['text_color'] }}">{{ $link->plain_value['content'] }}</p>
        </div>
    </div>
</div>
