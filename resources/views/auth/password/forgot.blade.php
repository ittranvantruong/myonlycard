@section('title', __('Quên mật khẩu'))    

<x-layouts.guest.master>
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <img src="{{ asset(config('custom.images.logo')) }}" width="200" alt="">
            </div>
            <x-form :action="route('password.forgot.check')" class="card card-md" type="post" :validate="true">
                <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ __('Quên mật khẩu') }}</h2>
                <div class="mb-3">
                    <label class="form-label">{{ __('Email') }}</label>
                    <x-input-email name="email" :required="true" />
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Xác nhận') }}</button>
                </div>
                </div>
            </x-form>
            <div class="text-center text-muted mt-3">
                {{ __('Chưa có tài khoản?') }} <a href="{{ route('signup') }}" tabindex="-1">{{ __('Đăng ký ngay') }}</a>
            </div>
        </div>
    </div>
</x-layouts.guest.master>