<div class="row d-flex justify-content-center align-items-center">
    <div class="col-12">
        @include('partials.avatar', ['avatar' => $avatar])
    </div>
    <div class="col-12">
        <h1 class="text-center mt-3" style="color: {{ optional($personalize)->name_color }}">{{ $fullname }}</h1>
    </div>
    <div class="col-12">
        <p class="text-center" style="color: {{ optional($personalize)->name_color }}">{{ $description }}</p>
    </div>
</div>