<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row">
            <div class="col-12 d-flex justify-content-center justify-content-lg-start align-items-center gap-2">
                <div class="mylink fw-bold d-none d-sm-block">
                    <span class="link-title">{{ __('Link của bạn') }}: </span>
                    <span class="link-brower text-primary">{{ route('share.show', $auth->code_card) }}</span>
                </div>
                <div class="">
                    <button type="button" class="btn btn-sm copy-text btn-outline-secondary" data-target=".link-brower">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                        </svg>
                        <span>{{ __('Copy link') }}</span>
                    </button>
                </div>
                <div class="">
                    <a href="{{ route('share.show', $auth->code_card) }}" target="_blank" class="btn btn-sm btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                         </svg>
                        {{ __('Xem trang') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>