<div class="mb-3">
    <label class="form-label">{{ __('Tên ngân hàng') }}</label>
    <x-input name="plain_value['bank_name']" :required="true" :placeholder="__('Vui lòng nhập tên ngân hàng')" />
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Tên tài khoản') }}</label>
    <x-input name="plain_value['account_name']" :required="true" :placeholder="__('Vui lòng nhập tên tài khoản')"/>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Số tài khoản') }}</label>
    <x-input name="plain_value['account_number']" :required="true" :placeholder="__('Vui lòng nhập số tài khoản')"/>
</div>
