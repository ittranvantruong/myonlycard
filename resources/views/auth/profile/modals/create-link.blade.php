<x-form id="formCreateLink" :action="route('link.store')" type="post" enctype="multipart/form-data" :validate="true">
    <div class="modal-header">
        <h5 class="modal-title">{{ __('Tạo link mới') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">{{ __('Chọn loại') }}</label>
            <x-select id="selectTypeLink" name="social_network_id" class="form-select" :required="true">
                @foreach ($socialNetwork as $item)
                    <x-option :value="$item->id"
                        data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url({{ asset($item->logo) }})&quot;&gt;&lt;/span&gt;">
                        <span>{{ $item->name }}</span>
                    </x-option>
                @endforeach
            </x-select>
        </div>
        <div id="inputRender">
            @include('links.form.create_'.\Str::snake($socialNetwork[0]->type->key), ['socialNetwork' => $socialNetwork[0]])
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ __('Đóng') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Tạo link') }}</button>
    </div>
</x-form>
