<x-form class="row" :action="route('personalize.update')" type="put" enctype="multipart/form-data" :validate="true">

    <div class="mb-3 col-6">
        <label class="form-label">{{ __('Chọn màu nền') }}</label>
        <x-input type="color" class="form-control-color" :value="optional($personalize)->background_color" name="background_color" :title="__('Choose your color')" />
    </div>
    <div class="mb-3 col-6">
        <label class="form-label">{{ __('Chọn màu tên') }}</label>
        <x-input type="color" class="form-control-color" :value="optional($personalize)->name_color" name="name_color" :title="__('Choose your color')" />
    </div>
    <div class="mb-3 col-12">
        <div class="form-label">{{ __('Chọn hình nền') }}</div>
        <x-input type="file" name="file" class="file-change-preview" data-preview="#previewBg img" data-input=""/>
        <x-input type="hidden" name="background_image_url" :value="optional($personalize)->background_image_url"/>
        <div id="previewBg" class="mt-3">
            <img id="imgPreview" src="{{ asset(optional($personalize)->background_image_url ?? config('custom.images.image_default')) }}" class="rounded img-fluid" alt="">
            <span id="clearImagePreview" class="badge bg-danger" data-preview="#imgPreview" data-input="input[name='background_image_url']">{{ __('Xóa') }}</span>
        </div>
    </div>
    <div class="form-footer text-center">
        <button type="submit" class="btn btn-primary">{{ __('Lưu thông tin') }}</button>
    </div>
</x-form>
