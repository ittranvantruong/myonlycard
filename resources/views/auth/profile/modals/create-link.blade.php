
<x-form id="formCreateLink" :action="route('link.store')" type="post" enctype="multipart/form-data" :validate="true">
    <div class="modal-header">
        <h5 class="modal-title">{{ __('Tạo link mới') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">{{ __('Chọn loại') }}</label>
            <x-select name="social_network_id" class="form-control" :required="true">
                @foreach($socialNetwork as $item)
                    <x-option :value="$item->id">
                        <span>{{ $item->name }}</span>
                    </x-option>
                @endforeach
            </x-select>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Đường link') }}</label>
            <x-input name="plain_value" :required="true" :placeholder="__('Vui lòng nhập đường link')"/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ __('Đóng') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Tạo link') }}</button>
    </div>
</x-form>
<script>
$('form').parsley();
</script>
