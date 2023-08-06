@php
    $locale = App::currentLocale();
    $currentTheme = config()->get('backpack.ui.view_namespace');
    $theme = substr(str_replace('backpack.', '', $currentTheme),0,-2);
    $themesArray = [
        'theme-coreuiv2' => 'CoreUI v2',
        'theme-coreuiv4' => 'CoreUI v4',
        'theme-tabler' => 'Tabler',
    ];
    $currentThemeName = $themesArray[$theme];
@endphp
<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Theme">
        <i class="la la-free-code-camp me-2"></i>{{ $currentThemeName }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        @foreach($themesArray as $themeKey => $themeName)
            <a href="/{{ $themeKey }}/theme" class="dropdown-item">{{ $themeName }}</a>
        @endforeach
    </div>
</div>
<div class="nav-item dropdown">
    @php
        $array = config('laravellocalization.supportedLocales');
        $currentLanguageName = $array[$locale]['native'];
    @endphp
    <a href="#" hreflang="{{ $locale }}" id="navbarDropdown" class="nav-link d-flex lh-1 text-reset p-0" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <img width="31" height="31" src="{{asset('assets/img/flags/1x1/' . $locale . '.svg')}}" class="border border-1 rounded-circle">
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a class="dropdown-item" hreflang="{{ $localeCode }}" href="/{{ $localeCode }}/lang"><img width="30" height="30" src="{{asset('assets/img/flags/1x1/' . $localeCode . '.svg')}}" class="border border-1 rounded-circle me-2"> {{ $properties['native'] }}</a>
        @endforeach
    </div>
</div>
<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
        <span class="avatar avatar-sm rounded-circle">
            <img class="avatar avatar-sm rounded-circle bg-transparent" src="{{ backpack_avatar_url(backpack_auth()->user()) }}"
                 alt="{{ backpack_auth()->user()->name }}" onerror="this.style.display='none'"
                 style="margin: 0;position: absolute;left: 0;z-index: 1;">
            <span class="avatar avatar-sm rounded-circle backpack-avatar-menu-container text-center">
                {{ backpack_user()->getAttribute('name') ? mb_substr(backpack_user()->name, 0, 1, 'UTF-8') : 'A' }}
            </span>
        </span>
        <div class="d-none d-xl-block ps-2">
            <div>{{ backpack_user()->name }}</div>
            <div class="mt-1 small text-muted">{{ trans('backpack::crud.admin') }}</div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        @if(config('backpack.base.setup_my_account_routes'))
            <a href="{{ route('backpack.account.info') }}" class="dropdown-item"><i class="la la-user me-2"></i>{{ trans('backpack::base.my_account') }}</a>
            <div class="dropdown-divider"></div>
        @endif
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="la la-lock me-2"></i> {{ trans('backpack::base.logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
