<div class="mb-3">
    <label class="form-label">{{ __('Tiêu đề') }}</label>
    <x-input name="plain_value['title']" :required="true" :placeholder="__('Vui lòng nhập tiêu đề')" />
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Đường link') }}</label>
    <x-input name="plain_value['url']" :required="true" :placeholder="__('Vui lòng nhập đường link')"/>
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Icon') }}</label>
    <x-input type="file" name="plain_value['icon_url']" class="file-change-preview" data-preview="#linkIconPreview"/>
    <div id="customLinkIcon" class="mt-3">
        <img id="linkIconPreview" src="{{ asset(config('custom.images.image_default')) }}" class="rounded img-fluid" width="100" height="100" alt="">
    </div>
</div>
