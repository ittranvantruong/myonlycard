@section('title', __('Chỉnh sửa trang'))
@push('css')
<link rel="stylesheet" href="{{ asset('public/lib/jquery-ui/jquery-ui.css') }}"> 
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<style>
    .form-avatar{
        position: relative;
        width: 190px;
        height: 190px;
        margin: 0 auto 20px auto;
    }
    .form-avatar .label-upload {
        position: absolute;
        padding: 10px;
        right: 0;
        bottom: -20px;
        background-color: #d3d3d3;
        border-radius: 50%;
        cursor: pointer;
    }
    .form-avatar .label-upload img{
        filter: invert(0.5) sepia(1) saturate(5) hue-rotate(185deg);
    }
    .preview-profile{
        width: 100%;
        height: 700px;
        border: 8px solid #42444a;
        border-radius: 20px;
        margin: 0 auto;
        overflow-y: scroll;
        position: relative;
    }
    .preview-profile::-webkit-scrollbar {
        display: none;
    }
    .preview-profile .cover-block {
        height: auto;
        position: relative;
        min-height: 700px;
    }
    .reorder-link-list .social-item{
        cursor: move;
    }
    .portlet-placeholder {
        border: 1px dotted black;
        margin: 0 1em 1em 1em;
        width: 100%;
        height: 89px;
    }
    .action.dropup{
        cursor: pointer;
    }
    /* preview img */
    #previewBg{
        position: relative;
    }
    #clearImagePreview{
        position: absolute;
        right: 5px;
        bottom: 5px;
        cursor: pointer;
    }
    .ts-wrapper .ts-control{
        min-height: calc(1.4285714em + 0.875rem + 2px);
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        display: flex;
        align-items: center;
        padding: 0.4375rem 0.75rem;
        width: 100%;
        overflow: hidden;
        position: relative;
        z-index: 1;
        box-sizing: border-box;
        box-shadow: none;
        border-radius: 4px;
        flex-wrap: wrap;
        font-family: inherit;
        font-size: inherit;
        line-height: 1.4285714;
    }
    .ts-wrapper .dropdown-menu{
        width: 100%;
        height: auto;
    }
</style>
@endpush
@push('js-lib')
{{-- <script src="{{ asset('public/lib/Tabler/lib/tom-select/dist/js/tom-select.base.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
@endpush
@push('js')
<script src="{{ asset('public/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('public/lib/jquery-ui/jquery.ui.touch-punch.min.js') }}"></script>
    @include('auth.profile.script')
@endpush

<x-layouts.master>
    <div class="page-wrapper">
        @include('auth.profile.page-header')
        <div class="page-body">
            <div class="container-xl">
                <div class="row align-items-center">
                    <div class="col col-sm-12 col-md-6">
                        @include('auth.profile.block-left', ['auth' => $auth])
                    </div>
                    <div id="viewDemoProfile" class="col col-sm-12 col-md-6 d-none d-sm-block">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="preview-profile">
                                    @include('auth.profile.block-right', ['auth' => $auth])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.modal')
    @include('qrcode.modal', ['user' => $auth])
</x-layouts.master>

