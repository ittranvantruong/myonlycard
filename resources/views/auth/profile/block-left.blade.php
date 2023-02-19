<div class="card">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a href="#tabOne" class="nav-link active fw-bold" data-bs-toggle="tab" aria-selected="true" role="tab">
            {{ __('Thông tin') }}
          </a>
        </li>
        <li class="nav-item">
            <a href="#tabTwo" class="nav-link fw-bold" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                {{ __('Quản lý link') }}
            </a>
          </li>
      </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <!-- Content of card #1 -->
            <div id="tabOne" class="tab-pane active show" role="tabpanel">
                @include('auth.profile.form.update-info', ['auth' => $auth])
            </div>
            <!-- Content of card #2 -->
            <div id="tabTwo" class="tab-pane" role="tabpanel">
              <h1 class="text-center mb-4">{{ __('Thêm đường link vào tài khoản') }}</h1>
                @include('auth.profile.form.update-link', ['auth' => $auth])
            </div>
        </div>
    </div>
</div>