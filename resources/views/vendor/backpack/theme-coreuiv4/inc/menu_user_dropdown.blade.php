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
<li class="nav-item dropstart pr-4">
    <a href="#" id="navbarDropdown" data-coreui-toggle="dropdown" class="nav-link p-0" role="button" aria-haspopup="true" aria-expanded="false" style="position: relative;margin: 0 10px;">
        {{ $currentThemeName }}
    </a>
    <div class="dropdown-menu {{ backpack_theme_config('html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1" aria-labelledby="navbarDropdown">
        @foreach($themesArray as $themeKey => $themeName)
            <a href="/{{ $themeKey }}/theme" class="dropdown-item">{{ $themeName }}</a>
        @endforeach
    </div>
</li>
<li class="nav-item dropstart pr-4">
    @php
        $array = config('laravellocalization.supportedLocales');
        $currentLanguageName = $array[$locale]['native'];
    @endphp
    <a href="#" hreflang="{{ $locale }}" data-coreui-toggle="dropdown" class="nav-link p-0" role="button" aria-haspopup="true" aria-expanded="false" style="position: relative;width: 35px;height: 35px;margin: 0 10px;">
        <img width="35" height="35" src="{{asset('assets/img/flags/1x1/' . $locale . '.svg')}}" class="border border-1 rounded-circle">
    </a>
    <div class="dropdown-menu {{ backpack_theme_config('html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1" aria-labelledby="navbarDropdown">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a class="dropdown-item" hreflang="{{ $localeCode }}" href="/{{ $localeCode }}/lang"><img width="25" height="25" src="{{asset('assets/img/flags/1x1/' . $localeCode . '.svg')}}" class="border border-1 rounded-circle"> {{ $properties['native'] }}</a>
        @endforeach
    </div>
</li>
<li class="nav-item dropstart pr-4">
    <a class="nav-link p-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="position: relative;width: 35px;height: 35px;margin: 0 10px;">
        <img class="avatar-img" src="{{ backpack_avatar_url(backpack_auth()->user()) }}" alt="{{ backpack_auth()->user()->name }}" onerror="this.style.display='none'" style="margin: 0;position: absolute;left: 0;z-index: 1;">
        <span class="backpack-avatar-menu-container text-center" style="position: absolute;left: 0;width: 100%;background-color: #00a65a;border-radius: 50%;color: #FFF;line-height: 35px;font-size: 85%;font-weight: 300;">
      {{backpack_user()->getAttribute('name') ? mb_substr(backpack_user()->name, 0, 1, 'UTF-8') : 'A'}}
    </span>
    </a>
    <div class="dropdown-menu {{ backpack_theme_config('html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1">
        @if(config('backpack.base.setup_my_account_routes'))
            <a class="dropdown-item" href="{{ route('backpack.account.info') }}"><i class="la la-user"></i> {{ trans('backpack::base.my_account') }}</a>
            <div class="dropdown-divider"></div>
        @endif
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="la la-lock"></i> {{ trans('backpack::base.logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
