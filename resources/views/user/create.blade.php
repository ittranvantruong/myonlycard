@section('title', __('Tạo mã sản phẩm'))    

<x-layouts.guest.master>
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <h1>OnlyCard</h1>
            </div>
            <x-form :action="route('user.store')" class="card card-md" type="post" :validate="true">
                <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ __('Tạo mã sản phẩm') }}</h2>
                <div class="mb-3">
                    <label class="form-label">{{ __('Mã sản phẩm') }}</label>
                    <x-input name="code_card" :required="true" placeholder="Mã sản phẩm" />
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Tạo ngay') }}</button>
                </div>
                </div>
            </x-form>
            <div class="text-center text-muted mt-3">
                {{ __('Tới trang người dùng') }} 
                <a href="{{ route('home') }}" tabindex="-1">{{ __('ngay') }}</a>
            </div>
        </div>
    </div>
</x-layouts.guest.master>