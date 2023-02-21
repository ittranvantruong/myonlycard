<x-input type="hidden" name="type_social_network_id" :value="$socialNetwork->type" />
<div class="mb-3">
    <label class="form-label">{{ __('Tiêu đề') }}</label>
    <x-input name="plain_value[title]" :value="$link->plain_value['title'] ?? ''" :required="true" :placeholder="__('Vui lòng nhập tiêu đề')" />
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Văn bản') }}</label>
    <textarea name="plain_value[content]" class="form-control" required placeholder="{{ __('Vui lòng nhập đoạn văn bản') }}" data-parsley-required-message="{{ __('Trường này không được bỏ trống.') }}">{{ $link->plain_value['content'] ?? '' }}</textarea>
</div>