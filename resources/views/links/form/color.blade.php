<div class="row">
    <div class="mb-3 col-6">
        <label class="form-label">{{ __('Chọn màu nền') }}</label>
        <x-input type="color" class="form-control-color" :value="$background_color" name="plain_value[background_color]" :title="__('Choose your color')" />
    </div>
    <div class="mb-3 col-6">
        <label class="form-label">{{ __('Chọn màu chữ') }}</label>
        <x-input type="color" class="form-control-color" :value="$text_color" name="plain_value[text_color]" :title="__('Choose your color')" />
    </div>
</div>