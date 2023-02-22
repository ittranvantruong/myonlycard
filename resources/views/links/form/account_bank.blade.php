<x-input type="hidden" name="type_social_network_id" :value="$socialNetwork->type" />
<div class="mb-3">
    <label class="form-label">{{ __('Tên ngân hàng') }}</label>
    <x-input name="plain_value[bank_name]" :value="$link->plain_value['bank_name'] ?? ''" :required="true" :placeholder="__('Vui lòng nhập tên ngân hàng')" />
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Tên chủ tài khoản') }}</label>
    <x-input name="plain_value[account_name]" :value="$link->plain_value['account_name'] ?? ''" :required="true" :placeholder="__('Vui lòng nhập tên tài khoản')"/>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Số tài khoản') }}</label>
    <x-input name="plain_value[account_number]" :value="$link->plain_value['account_number'] ?? ''" :required="true" :placeholder="__('Vui lòng nhập số tài khoản')"/>
</div>
