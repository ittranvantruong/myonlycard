<div class="modal modal-blur fade" id="modalQRcode" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-4">
                            <img src="{{ asset(config('custom.images.logo')) }}" width="200" alt="">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <p>{{ __('Chia sẻ với bạn bè, đối tác bằng cách') }}<br>
                            {{ __('scan mã QR dưới đây') }}</p>
                    </div>
                    <div class="col-12 text-center mb-3">
                        <div id="canvas"></div>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center gap-2">
                        <div class="">
                            <button type="button" class="btn btn-sm download-qr btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-qrcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                    <path d="M7 17l0 .01"></path>
                                    <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                    <path d="M7 7l0 .01"></path>
                                    <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                    <path d="M17 7l0 .01"></path>
                                    <path d="M14 14l3 0"></path>
                                    <path d="M20 14l0 .01"></path>
                                    <path d="M14 14l0 3"></path>
                                    <path d="M14 20l3 0"></path>
                                    <path d="M17 17l3 0"></path>
                                    <path d="M20 17l0 3"></path>
                                 </svg>
                                <span>{{ __('Tải Qrcode') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">{{ __('Đóng') }}</button>
            </div>
        </div>
    </div>
</div>
@push('js-lib')
    <script src="{{ asset('public/lib/qr-code-styling/qr-code-styling.js') }}"></script>
@endpush
@push('js')
<script>
    var link = "{{ route('share.show', $user->code_card) }}",
    qrCode = createQRcode(link, 'canvas');
    $(".download-qr").click(function(){
        downloadQRcode(qrCode);
    })
</script>
@endpush
