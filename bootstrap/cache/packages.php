<?php return array (
  'backpack/backupmanager' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\BackupManager\\BackupManagerServiceProvider',
    ),
  ),
  'backpack/basset' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\Basset\\BassetServiceProvider',
    ),
    'aliases' => 
    array (
      'Basset' => 'Backpack\\Basset\\Facades\\Basset',
    ),
  ),
  'backpack/crud' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\CRUD\\BackpackServiceProvider',
    ),
    'aliases' => 
    array (
      'CRUD' => 'Backpack\\CRUD\\app\\Library\\CrudPanel\\CrudPanelFacade',
      'Widget' => 'Backpack\\CRUD\\app\\Library\\Widget',
    ),
  ),
  'backpack/filemanager' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\FileManager\\FileManagerServiceProvider',
    ),
  ),
  'backpack/generators' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\Generators\\GeneratorsServiceProvider',
    ),
  ),
  'backpack/logmanager' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\LogManager\\LogManagerServiceProvider',
    ),
  ),
  'backpack/menucrud' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\MenuCRUD\\MenuCRUDServiceProvider',
    ),
  ),
  'backpack/pagemanager' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\PageManager\\PageManagerServiceProvider',
    ),
  ),
  'backpack/permissionmanager' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\PermissionManager\\PermissionManagerServiceProvider',
    ),
  ),
  'backpack/pro' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\Pro\\AddonServiceProvider',
    ),
  ),
  'backpack/settings' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\Settings\\SettingsServiceProvider',
    ),
  ),
  'backpack/theme-coreuiv2' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\ThemeCoreuiv2\\AddonServiceProvider',
    ),
  ),
  'backpack/theme-coreuiv4' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\ThemeCoreuiv4\\AddonServiceProvider',
    ),
  ),
  'backpack/theme-tabler' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\ThemeTabler\\AddonServiceProvider',
    ),
  ),
  'barryvdh/laravel-elfinder' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Elfinder\\ElfinderServiceProvider',
    ),
  ),
  'biscolab/laravel-recaptcha' => 
  array (
    'providers' => 
    array (
      0 => 'Biscolab\\ReCaptcha\\ReCaptchaServiceProvider',
    ),
    'aliases' => 
    array (
      'ReCaptcha' => 'Biscolab\\ReCaptcha\\Facades\\ReCaptcha',
    ),
  ),
  'bkwld/croppa' => 
  array (
    'providers' => 
    array (
      0 => 'Bkwld\\Croppa\\CroppaServiceProvider',
    ),
    'aliases' => 
    array (
      'Croppa' => 'Bkwld\\Croppa\\Facades\\Croppa',
    ),
  ),
  'creativeorange/gravatar' => 
  array (
    'providers' => 
    array (
      0 => 'Creativeorange\\Gravatar\\GravatarServiceProvider',
    ),
    'aliases' => 
    array (
      'Gravatar' => 'Creativeorange\\Gravatar\\Facades\\Gravatar',
    ),
  ),
  'cviebrock/eloquent-sluggable' => 
  array (
    'providers' => 
    array (
      0 => 'Cviebrock\\EloquentSluggable\\ServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/socialite' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
    ),
    'aliases' => 
    array (
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravel/ui' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Ui\\UiServiceProvider',
    ),
  ),
  'mcamara/laravel-localization' => 
  array (
    'providers' => 
    array (
      0 => 'Mcamara\\LaravelLocalization\\LaravelLocalizationServiceProvider',
    ),
    'aliases' => 
    array (
      'LaravelLocalization' => 'Mcamara\\LaravelLocalization\\Facades\\LaravelLocalization',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'overtrue/laravel-follow' => 
  array (
    'providers' => 
    array (
      0 => 'Overtrue\\LaravelFollow\\FollowServiceProvider',
    ),
  ),
  'pragmarx/google2fa-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'PragmaRX\\Google2FALaravel\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Google2FA' => 'PragmaRX\\Google2FALaravel\\Facade',
    ),
  ),
  'prologue/alerts' => 
  array (
    'providers' => 
    array (
      0 => 'Prologue\\Alerts\\AlertsServiceProvider',
    ),
    'aliases' => 
    array (
      'Alert' => 'Prologue\\Alerts\\Facades\\Alert',
    ),
  ),
  'socialiteproviders/manager' => 
  array (
    'providers' => 
    array (
      0 => 'SocialiteProviders\\Manager\\ServiceProvider',
    ),
  ),
  'spatie/laravel-backup' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Backup\\BackupServiceProvider',
    ),
  ),
  'spatie/laravel-ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
  'spatie/laravel-permission' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Permission\\PermissionServiceProvider',
    ),
  ),
  'spatie/laravel-signal-aware-command' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\SignalAwareCommand\\SignalAwareCommandServiceProvider',
    ),
    'aliases' => 
    array (
      'Signal' => 'Spatie\\SignalAwareCommand\\Facades\\Signal',
    ),
  ),
  'spatie/laravel-translatable' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Translatable\\TranslatableServiceProvider',
    ),
  ),
  'torann/geoip' => 
  array (
    'providers' => 
    array (
      0 => 'Torann\\GeoIP\\GeoIPServiceProvider',
    ),
    'aliases' => 
    array (
      'GeoIP' => 'Torann\\GeoIP\\Facades\\GeoIP',
    ),
  ),
);