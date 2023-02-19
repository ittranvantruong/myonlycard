@section('title', __('Tạo mã sản phẩm'))    

<x-layouts.master>
    <div class="page page-center">
        <div class="container-tight py-4">
            <x-form :action="route('user.store')" class="card card-md" type="post" :validate="true">
                <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ __('Tạo mã sản phẩm') }}</h2>
                <div class="mb-3">
                    <label class="form-label">{{ __('Mã sản phẩm') }}</label>
                    <x-input name="code_card" :value="old('code_card')" :required="true" placeholder="Mã sản phẩm" />
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Mật khẩu') }}</label>
                    <x-input-password name="password" :required="true" />
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Tạo ngay') }}</button>
                </div>
                </div>
            </x-form>
        </div>
    </div>
</x-layouts.master>