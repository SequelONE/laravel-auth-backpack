@php
    $locale = App::currentLocale();
    $array = config('laravellocalization.supportedLocales');
    $currentLanguageName = $array[$locale]['native'];
@endphp
<div class="w-100 justify-content-center d-none d-lg-flex sidebar-shortcuts">
    @includeWhen(backpack_theme_config('options.showColorModeSwitcher'), backpack_view('layouts.partials.switch_theme'))
    <button class="btn-link text-secondary nav-link px-0 shadow-none" data-bs-toggle="modal" data-bs-target="#modal-layout">
        <i class="la la-palette fs-2 me-1"></i>
    </button>
    <a href="#" hreflang="{{ $locale }}" class="btn-link text-secondary nav-link px-0 shadow-none" data-bs-toggle="modal" data-bs-target="#languages">
        <img width="20" height="20" src="{{asset('assets/img/flags/1x1/' . $locale . '.svg')}}" class="border border-1 rounded-circle">
    </a>
</div>

@include('vendor.backpack.theme_switch_modal_bs5')
