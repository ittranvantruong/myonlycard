<div class="sticky-top">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xxl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('home') }}">
                OnlyCard
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url({{ asset(auth()->user()->avatar ?? config('custom.images.avatar_default')) }})"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>{{ auth()->user()->fullname}}</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">{{ __('Đăng xuất') }}</a>
              </div>
            </div>
          </div>
        </div>
    </header>
</div>