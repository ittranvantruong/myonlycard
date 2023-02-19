<div class="list-link row justify-content-center">
    <div class="col-12 col-md-10">
        <x-form id="formReorderLink" :action="route('link.reorder')" type="put" enctype="multipart/form-data" :validate="true">
            <div id="listLink" class="d-flex social-wrap reorder-link-list">
                @foreach($auth->links as $link)
                    @include('auth.profile.link', ['link' => $link])
                @endforeach
            </div>
            <div class="text-center mt-4">
                <button type="button" id="btnCreateLink" class="btn btn-bitbucket rounded-pill">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                     </svg>
                    {{ __('Thêm link') }}
                </button>
            </div>
        </x-form>
    </div>
</div>