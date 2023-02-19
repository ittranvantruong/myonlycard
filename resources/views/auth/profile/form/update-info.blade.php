<x-form :action="route('profile.update')" type="put" enctype="multipart/form-data" :validate="true">
    <div class="form-avatar">
        @include('partials.avatar', ['avatar' => $auth->avatar])
        <div id="labelUpload" class="label-upload" data-target="input[name='avatar']">
            <img src="{{ asset('public/assets/icons/camera.svg') }}" alt="">
        </div>
        <input type="file" class="d-none" name="avatar">
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('Họ và tên') }}</label>
        <x-input name="fullname" :value="$auth->fullname" :required="true" :placeholder="__('Họ và tên')"/>
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('Thông tin về bạn') }}</label>
        <textarea name="description" class="form-control">{{ $auth->description }}</textarea>
    </div>
    <div class="mb-3">
        <label class="row">
            <span class="col">{{ __('Publish') }}</span>
            <span class="col-auto">
            <label class="form-check form-check-single form-switch">
                <input class="form-check-input" type="checkbox" name="publish" value="1" {{ $auth->publish ? 'checked' : '' }}>
            </label>
            </span>
        </label>
    </div>
    <div class="form-footer text-center">
        <button type="submit" class="btn btn-primary">{{ __('Lưu thông tin') }}</button>
    </div>
</x-form>