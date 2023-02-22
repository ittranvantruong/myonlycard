<div class="">
    <a {{ $attributes->merge([
        'class' => 'social-item hvr-bob collapse-item-link',
        'href' => '#collapseText'.$link->id,
        ]) }}>
        <div class="social-logo text-center">
            <img src="{{ asset($link->socialNetwork->logo) }}" alt="">
        </div>
        <div class="social-name">{{ $link->plain_value['bank_name'] }}</div>
        <div class="icon-arrow text-center">
            <img src="{{ asset('/public/assets/icons/share.svg') }}" alt="">
        </div>
    </a>
    <div id="{{ 'collapseText'.$link->id }}" class="card d-none">
        <div class="card-body">
            <p><strong>{{ __("Tên tài khoản: ") }}</strong>{{ $link->plain_value['account_name'] }}</p>
            <p>
                <strong>{{ __("Số tài khoản: ") }}</strong>
                <span class="bank_account_number">{{ $link->plain_value['account_number'] }}</span>
            </p>
            <div class="text-center">
                <button type="button" class="btn btn-sm copy-text btn-outline-secondary ms-auto me-auto" data-target=".bank_account_number">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                        <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                    </svg>
                    <span>{{ __('Copy Stk') }}</span>
                </button>
            </div>
        </div>
    </div>
</div>
