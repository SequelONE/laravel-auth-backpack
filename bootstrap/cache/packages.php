<?php return array (
  'backpack/backupmanager' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\BackupManager\\BackupManagerServiceProvider',
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
  'backpack/settings' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\Settings\\SettingsServiceProvider',
    ),
  ),
  'barryvdh/laravel-elfinder' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Elfinder\\ElfinderServiceProvider',
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
  'digitallyhappy/assets' => 
  array (
    'providers' => 
    array (
      0 => 'DigitallyHappy\\Assets\\AssetsServiceProvider',
    ),
    'aliases' => 
    array (
      'Assets' => 'DigitallyHappy\\Assets\\Facades\\Assets',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
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
  'spatie/laravel-backup' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Backup\\BackupServiceProvider',
    ),
  ),
  'spatie/laravel-permission' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Permission\\PermissionServiceProvider',
    ),
  ),
);