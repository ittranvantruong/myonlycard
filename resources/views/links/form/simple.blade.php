<x-input type="hidden" name="type_social_network_id" :value="$socialNetwork->type" />
<div class="mb-3">
    <label class="form-label">{{ __('Đường link') }}</label>
    <div class="input-group mb-2">
        @if($socialNetwork->prefix_link)
            <span class="input-group-text">
                {{ $socialNetwork->prefix_link }}
            </span>
        @endif
        <x-input name="plain_value[value_any]" :value="$link->plain_value['value_any'] ?? ''" :required="true" :placeholder="__('Vui lòng nhập đường link')" data-parsley-errors-container="#errorPlainValue"/>
    </div>
    <div id="errorPlainValue"></div>
</div>