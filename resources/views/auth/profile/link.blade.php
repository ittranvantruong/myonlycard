<div class="ui-sortable-handle item-link">
    <x-card-link :type="optional($link->socialNetwork)->type" :link="$link->plain_value" :name="optional($link->socialNetwork)->name" :logo="optional($link->socialNetwork)->logo">
        <div class="action dropup text-center">
            <div data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('public/assets/icons/dots.svg') }}" alt="">
            </div>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow custom-dropup-menu-arrow">
                <div data-route="{{ route('link.edit', $link->id) }}" class="dropdown-item edit-link">
                    <img src="{{ asset('public/assets/icons/edit.svg') }}" class="me-1 filter-orange" width="16" alt=""> 
                    {{ __('Chỉnh sửa') }}
                </div>
                <div data-route="{{ route('link.delete', $link->id) }}" class="dropdown-item delete-link">
                    <img src="{{ asset('public/assets/icons/trash.svg') }}" class="me-1 filter-red" width="16" alt=""> 
                    {{ __('Xóa') }}
                </div>
            </div>
        </div>
    </x-card-link>
    <x-input type="hidden" name="id[]" :value="$link->id" />
</div>