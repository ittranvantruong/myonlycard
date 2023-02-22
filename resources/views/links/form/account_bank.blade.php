<x-input type="hidden" name="type_social_network_id" :value="$socialNetwork->type" />
<div class="mb-3">
    <label class="form-label">{{ __('Chọn ngân hàng') }}</label>
    <x-select id="selectBank" name="plain_value[bank_id]" class="form-select" :required="true">
        @foreach ($banks as $bank)
            <x-option :value="$bank->id" :option="$link->plain_value['bank']['id'] ?? ''"
                data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url({{ asset($bank->logo) }})&quot;&gt;&lt;/span&gt;">
                <span>{{ $bank->name.'('.$bank->abbreviation_name.')' }}</span>
            </x-option>
        @endforeach
    </x-select>
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Tên chủ tài khoản') }}</label>
    <x-input name="plain_value[account_name]" :value="$link->plain_value['account_name'] ?? ''" :required="true" :placeholder="__('Vui lòng nhập tên tài khoản')"/>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Số tài khoản') }}</label>
    <x-input name="plain_value[account_number]" :value="$link->plain_value['account_number'] ?? ''" :required="true" :placeholder="__('Vui lòng nhập số tài khoản')"/>
</div>
{{-- <script>beautySelectImage("selectBank")</script> --}}
