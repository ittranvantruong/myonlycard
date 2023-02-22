<x-form id="formUpdateLink" :action="route('link.update')" type="put" enctype="multipart/form-data" :validate="true">
    <x-input type="hidden" name="id" :value="$link->id" />
    <div class="modal-header">
        <h5 class="modal-title">{{ __('Sửa link') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">{{ __('Chọn loại') }}</label>
            <x-select id="selectTypeLink" name="social_network_id" class="form-control" :required="true">
                @foreach($socialNetwork as $item)
                    <x-option :value="$item->id" :option="$link->social_network_id" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url({{ asset($item->logo) }})&quot;&gt;&lt;/span&gt;">
                        <span>{{ $item->name }}</span>
                    </x-option>
                @endforeach
            </x-select>
        </div>
        <div id="inputRender">
            @include('links.form.'.\Str::snake($link->socialNetwork->type->key), ['link' => $link, 'socialNetwork' => $link->socialNetwork])
        </div>
        @include('links.form.color', [
            'background_color' => $link->plain_value['background_color'],
            'text_color' => $link->plain_value['text_color'],
        ])
    </div>
    <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ __('Đóng') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Sửa link') }}</button>
    </div>
</x-form>
