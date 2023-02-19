@section('title', __('Đăng nhập'))    

<x-layouts.guest.master>
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <h1>{{ config('custom.site_name') }}</h1>
            </div>
            <x-form :action="route('login.post')" class="card card-md" type="post" :validate="true">
                <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ __('Đăng nhập') }}</h2>
                <div class="mb-3">
                    <label class="form-label">{{ __('Email') }}</label>
                    <x-input-email name="email" :required="true" />
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Mật khẩu') }}</label>
                    <x-input-password name="password" :required="true" />
                </div>
                <div class="text-end">
                    <a href="{{ route('password.forgot.index') }}">{{ __('Quên mật khẩu?') }}</a>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Đăng nhập') }}</button>
                </div>
                </div>
            </x-form>
            <div class="text-center text-muted mt-3">
                {{ __('Chưa có tài khoản?') }} <a href="{{ route('signup') }}" tabindex="-1">{{ __('Đăng ký ngay') }}</a>
            </div>
        </div>
    </div>
</x-layouts.guest.master>