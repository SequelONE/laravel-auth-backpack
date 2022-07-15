<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/logo_slb_auth.png" alt="" /></a></p>

# Laravel + Backpack 5 + Auth

This build disables Backpack authentication and enables standard Laravel authentication methods. Authorization laravel/ui bootstrap is enabled by default. Account confirmation by email is also included. Authorization via social networks has also been added. The user's account can be protected using two-factor authentication.

Also, an example of how Backpack 5 packages work on the frontend has been added to the assembly.

PHP >= 7.3 and Laravel >= 8 support.

## Installation

Clone the repository to your server directory:

```phpregexp
git clone https://github.com/SequelONE/laravel-auth-backpack.git
```

Rename the `.env.example` file to `.env`

Run the command:

```phpregexp
composer update
```

Generate a key for Laravel:

```phpregexp
php artisan key:generate
```

Then run the command:

```phpregexp
npm install && npm run dev
```

Create a symbolic link to the file storage folder:

```phpregexp
php artisan storage:link
```

Configure the file `.env` for database access:

```phpregexp
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

After configuring the database, run the command:

```phpregexp
php artisan migrate
```

Add the default content to the database:

```phpregexp
php artisan db:seed
```

> Or run this command to completely delete and re-create tables and data.
> 
```phpregexp
php artisan migrate:fresh --seed
```

##### Seeded Users

| Email             |Password| Access           |
|:------------------|:------------|:-----------------|
| admin@s01.one     |password| Admin Access     |
| developer@s01.one |password| Developer Access |
| manager@s01.one   |password| Manager Access   |
| user@s01.one      |password| User Access      |
| banned@s01.one    |password| Banned Access    |

Also set up your mail server in file `.env`:

```phpregexp
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

> Setting up a mail server is necessary to receive emails for user confirmation.

Example of setting up a yandex mail server:

```phpregexp
MAIL_MAILER=smtp
MAIL_HOST=smtp.yandex.ru
MAIL_PORT=465
MAIL_USERNAME=email@email.com
MAIL_PASSWORD=password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=email@email.com
MAIL_FROM_NAME="${APP_NAME}"
```

To install Backpack, run the following commands:

```phpregexp
composer require --dev backpack/generators
```

and

```phpregexp
php artisan backpack:install
```

### Routes

```bash
+--------+----------------------------------------+--------------------------------------+-----------------------------+-----------------------------------------------------------------------------------------+----------------------------------------------------+
| Domain | Method                                 | URI                                  | Name                        | Action                                                                                  | Middleware                                         |
+--------+----------------------------------------+--------------------------------------+-----------------------------+-----------------------------------------------------------------------------------------+----------------------------------------------------+
|        | GET|HEAD                               | /                                    | generated::kcB7PkCLCZBqvorC | Closure                                                                                 | web                                                |
|        | GET|HEAD                               | admin                                | backpack                    | Backpack\CRUD\app\Http\Controllers\AdminController@redirect                             | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/backup                         | backup.index                | Backpack\BackupManager\app\Http\Controllers\BackupController@index                      | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | PUT                                    | admin/backup/create                  | backup.store                | Backpack\BackupManager\app\Http\Controllers\BackupController@create                     | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | DELETE                                 | admin/backup/delete/{file_name?}     | backup.destroy              | Backpack\BackupManager\app\Http\Controllers\BackupController@delete                     | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/backup/download/{file_name?}   | backup.download             | Backpack\BackupManager\app\Http\Controllers\BackupController@download                   | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | POST                                   | admin/change-password                | backpack.account.password   | Backpack\CRUD\app\Http\Controllers\MyAccountController@postChangePasswordForm           | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/dashboard                      | backpack.dashboard          | Backpack\CRUD\app\Http\Controllers\AdminController@dashboard                            | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | POST                                   | admin/edit-account-info              | backpack.account.info.store | Backpack\CRUD\app\Http\Controllers\MyAccountController@postAccountInfoForm              | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/edit-account-info              | backpack.account.info       | Backpack\CRUD\app\Http\Controllers\MyAccountController@getAccountInfoForm               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/elfinder                       | elfinder.index              | Barryvdh\Elfinder\ElfinderController@showIndex                                          | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/elfinder/ckeditor              | elfinder.ckeditor           | Barryvdh\Elfinder\ElfinderController@showCKeditor4                                      | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | admin/elfinder/connector             | elfinder.connector          | Barryvdh\Elfinder\ElfinderController@showConnector                                      | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/elfinder/filepicker/{input_id} | elfinder.filepicker         | Barryvdh\Elfinder\ElfinderController@showFilePicker                                     | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/elfinder/popup/{input_id}      | elfinder.popup              | Barryvdh\Elfinder\ElfinderController@showPopup                                          | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/elfinder/tinymce               | elfinder.tinymce            | Barryvdh\Elfinder\ElfinderController@showTinyMCE                                        | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/elfinder/tinymce4              | elfinder.tinymce4           | Barryvdh\Elfinder\ElfinderController@showTinyMCE4                                       | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/elfinder/tinymce5              | elfinder.tinymce5           | Barryvdh\Elfinder\ElfinderController@showTinyMCE5                                       | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/log                            | log.index                   | Backpack\LogManager\app\Http\Controllers\LogController@index                            | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | DELETE                                 | admin/log/delete/{file_name}         | log.destroy                 | Backpack\LogManager\app\Http\Controllers\LogController@delete                           | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/log/download/{file_name}       | log.download                | Backpack\LogManager\app\Http\Controllers\LogController@download                         | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | GET|HEAD                               | admin/log/preview/{file_name}        | log.show                    | Backpack\LogManager\app\Http\Controllers\LogController@preview                          | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        | POST                                   | admin/menu-item                      | menu-item.store             | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@store               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/menu-item                      | menu-item.index             | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@index               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/menu-item/create               | menu-item.create            | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@create              | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/menu-item/reorder              | menu-item.reorder           | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@reorder             | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/menu-item/reorder              | menu-item.save.reorder      | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@saveReorder         | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/menu-item/search               | menu-item.search            | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@search              | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | DELETE                                 | admin/menu-item/{id}                 | menu-item.destroy           | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@destroy             | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | PUT                                    | admin/menu-item/{id}                 | menu-item.update            | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@update              | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/menu-item/{id}/details         | menu-item.showDetailsRow    | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@showDetailsRow      | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/menu-item/{id}/edit            | menu-item.edit              | Backpack\MenuCRUD\app\Http\Controllers\Admin\MenuItemCrudController@edit                | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/page                           | page.store                  | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@store                | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/page                           | page.index                  | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@index                | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/page/create                    | page.create                 | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@create               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/page/search                    | page.search                 | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@search               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | DELETE                                 | admin/page/{id}                      | page.destroy                | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@destroy              | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | PUT                                    | admin/page/{id}                      | page.update                 | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@update               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/page/{id}/details              | page.showDetailsRow         | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@showDetailsRow       | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/page/{id}/edit                 | page.edit                   | Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController@edit                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/permission                     | permission.index            | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@index          | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/permission                     | permission.store            | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@store          | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/permission/create              | permission.create           | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@create         | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/permission/search              | permission.search           | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@search         | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | DELETE                                 | admin/permission/{id}                | permission.destroy          | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@destroy        | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | PUT                                    | admin/permission/{id}                | permission.update           | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@update         | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/permission/{id}/details        | permission.showDetailsRow   | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@showDetailsRow | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/permission/{id}/edit           | permission.edit             | Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController@edit           | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/role                           | role.index                  | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@index                | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/role                           | role.store                  | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@store                | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/role/create                    | role.create                 | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@create               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/role/search                    | role.search                 | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@search               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | DELETE                                 | admin/role/{id}                      | role.destroy                | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@destroy              | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | PUT                                    | admin/role/{id}                      | role.update                 | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@update               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/role/{id}/details              | role.showDetailsRow         | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@showDetailsRow       | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/role/{id}/edit                 | role.edit                   | Backpack\PermissionManager\app\Http\Controllers\RoleCrudController@edit                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/setting                        | setting.index               | Backpack\Settings\app\Http\Controllers\SettingCrudController@index                      | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/setting/search                 | setting.search              | Backpack\Settings\app\Http\Controllers\SettingCrudController@search                     | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | PUT                                    | admin/setting/{id}                   | setting.update              | Backpack\Settings\app\Http\Controllers\SettingCrudController@update                     | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/setting/{id}/details           | setting.showDetailsRow      | Backpack\Settings\app\Http\Controllers\SettingCrudController@showDetailsRow             | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/setting/{id}/edit              | setting.edit                | Backpack\Settings\app\Http\Controllers\SettingCrudController@edit                       | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/user                           | user.index                  | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@index                | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/user                           | user.store                  | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@store                | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/user/create                    | user.create                 | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@create               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | POST                                   | admin/user/search                    | user.search                 | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@search               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | DELETE                                 | admin/user/{id}                      | user.destroy                | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@destroy              | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | PUT                                    | admin/user/{id}                      | user.update                 | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@update               | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/user/{id}/details              | user.showDetailsRow         | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@showDetailsRow       | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | admin/user/{id}/edit                 | user.edit                   | Backpack\PermissionManager\app\Http\Controllers\UserCrudController@edit                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | admin                                              |
|        |                                        |                                      |                             |                                                                                         | Closure                                            |
|        | GET|HEAD                               | api/user                             | generated::eIasnv5xO6UjdXKD | Closure                                                                                 | api                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate:sanctum           |
|        | GET|HEAD                               | auth/provider/{provider}             | social.redirect             | App\Http\Controllers\Auth\SocialLoginController@redirectToProvider                      | web                                                |
|        | GET|HEAD                               | auth/provider/{provider}/callback    | generated::W5MhtvHDAtqJiPyU | App\Http\Controllers\Auth\SocialLoginController@providerCallback                        | web                                                |
|        | POST                                   | email/verification-notification      | verification.resend         | Closure                                                                                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Routing\Middleware\ThrottleRequests:6,1 |
|        | GET|HEAD                               | email/verify                         | verification.notice         | Closure                                                                                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | GET|HEAD                               | email/verify/{id}/{hash}             | verification.verify         | Closure                                                                                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Routing\Middleware\ValidateSignature    |
|        | GET|HEAD                               | home                                 | home                        | App\Http\Controllers\HomeController@index                                               | web                                                |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Auth\Middleware\EnsureEmailIsVerified   |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | GET|HEAD                               | login                                | login                       | App\Http\Controllers\Auth\LoginController@showLoginForm                                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\RedirectIfAuthenticated        |
|        | POST                                   | login                                | generated::Nl81kkGSEWRL83vd | App\Http\Controllers\Auth\LoginController@login                                         | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\RedirectIfAuthenticated        |
|        | POST                                   | logout                               | logout                      | App\Http\Controllers\Auth\LoginController@logout                                        | web                                                |
|        | GET|HEAD                               | password/confirm                     | password.confirm            | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm                     | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | POST                                   | password/confirm                     | generated::Ggd7F2Ehn2NDkl3T | App\Http\Controllers\Auth\ConfirmPasswordController@confirm                             | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | POST                                   | password/email                       | password.email              | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail                   | web                                                |
|        | GET|HEAD                               | password/reset                       | password.request            | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm                  | web                                                |
|        | POST                                   | password/reset                       | password.update             | App\Http\Controllers\Auth\ResetPasswordController@reset                                 | web                                                |
|        | GET|HEAD                               | password/reset/{token}               | password.reset              | App\Http\Controllers\Auth\ResetPasswordController@showResetForm                         | web                                                |
|        | GET|HEAD                               | profile                              | profile                     | App\Http\Controllers\Auth\UserController@profile                                        | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\LoginSecurityMiddleware        |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Auth\Middleware\EnsureEmailIsVerified   |
|        | GET|HEAD                               | register                             | register                    | App\Http\Controllers\Auth\RegisterController@showRegistrationForm                       | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\RedirectIfAuthenticated        |
|        | POST                                   | register                             | generated::6xteb9g989MGS8Fs | App\Http\Controllers\Auth\RegisterController@register                                   | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\RedirectIfAuthenticated        |
|        | GET|HEAD                               | sanctum/csrf-cookie                  | generated::kxty6C5UFAEjA8oU | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show                              | web                                                |
|        | GET|HEAD                               | settings                             | settings                    | App\Http\Controllers\Auth\UserController@settings                                       | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\LoginSecurityMiddleware        |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Auth\Middleware\EnsureEmailIsVerified   |
|        | GET|HEAD                               | settings/2fa                         | settings.2fa                | App\Http\Controllers\LoginSecurityController@show2faForm                                | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Auth\Middleware\EnsureEmailIsVerified   |
|        | GET|HEAD                               | settings/social                      | settings.social             | App\Http\Controllers\Auth\UserController@socialProviders                                | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\LoginSecurityMiddleware        |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Auth\Middleware\EnsureEmailIsVerified   |
|        | GET|HEAD                               | user/2fa                             | generated::ZY1kQyFoyIXE11Go | Closure                                                                                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\LoginSecurityMiddleware        |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Auth\Middleware\EnsureEmailIsVerified   |
|        | POST                                   | user/2fa/disable                     | disable2fa                  | App\Http\Controllers\LoginSecurityController@disable2fa                                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | POST                                   | user/2fa/enable                      | enable2fa                   | App\Http\Controllers\LoginSecurityController@enable2fa                                  | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | POST                                   | user/2fa/generate/password           | newTotp2fa                  | App\Http\Controllers\LoginSecurityController@newPassword                                | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | POST                                   | user/2fa/generate/secret             | generate2faSecret           | App\Http\Controllers\LoginSecurityController@generate2faSecret                          | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | GET|HEAD                               | user/2fa/scratch                     | generated::wQgCZis5RPijJc8G | App\Http\Controllers\LoginSecurityController@show2faFormTotp                            | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | POST                                   | user/2fa/scratch                     | totp2fa                     | App\Http\Controllers\LoginSecurityController@totpValidate                               | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\Authenticate                   |
|        | POST                                   | user/2fa/validate                    | 2faVerify                   | Closure                                                                                 | web                                                |
|        |                                        |                                      |                             |                                                                                         | App\Http\Middleware\LoginSecurityMiddleware        |
|        |                                        |                                      |                             |                                                                                         | Illuminate\Auth\Middleware\EnsureEmailIsVerified   |
|        | GET|HEAD                               | {link}                               | pages                       | App\Http\Controllers\PageController@pages                                               | web                                                |
+--------+----------------------------------------+--------------------------------------+-----------------------------+-----------------------------------------------------------------------------------------+----------------------------------------------------+

```

### Socialite

#### Get Socialite Login API Keys:
* [Google Captcha API](https://www.google.com/recaptcha/admin#list)
* [Facebook API](https://developers.facebook.com/)
* [Twitter API](https://apps.twitter.com/)
* [Google API](https://console.developers.google.com/)
* [GitHub API](https://github.com/settings/applications/new)
* [Yandex API](https://oauth.yandex.ru/client/new)
* [VK API](https://vk.com/editapp?act=create)

#### Add More Socialite Logins
* See full list of providers: [https://socialiteproviders.github.io](https://socialiteproviders.github.io/#providers)
###### **Steps**:
1. Go to [https://socialiteproviders.github.io](https://socialiteproviders.github.io/providers/twitch/) and select the provider to be added.
2. From the projects root folder, in the terminal, run composer to get the needed package.
    * Example:

    ```
       composer require socialiteproviders/facebook
    ```

3. From the projects root folder run ```composer update```
4. Add the service provider to ```/config/services.php```
    * Example:

   ```
      'facebook' => [
          'client_id'   => env('FACEBOOK_CLIENT_ID'),
          'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
          'redirect'    => env('FACEBOOK_CALLBACK_URL'),
      ],
   ```

5. Add the API credentials to ``` /.env  ```
    * Example:

    ```
    FACEBOOK_CLIENT_ID=YOURKEYHERE
    FACEBOOK_CLIENT_SECRET=YOURSECRETHERE
    FACEBOOK_CALLBACK_URL="${APP_URL}/auth/provider/facebook/callback"
    ```

6. Add the social media login link:
    * Example:
      In file ```/resources/views/auth/login.blade.php``` add ONE of the following:
        * Conventional HTML:
      ```
      <a href="{{ route('social.redirect','facebook') }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Facebook"><i class="fa-brands fa-facebook"></i></a>
      ```

### Environment File
Example `.env` file:

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_LOG=daily

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

RECAPTCHA_SITE_KEY=YOUR_API_SITE_KEY
RECAPTCHA_SECRET_KEY=YOUR_API_SECRET_KEY

FACEBOOK_CLIENT_ID=YOUR_CLIENT_ID
FACEBOOK_CLIENT_SECRET=YOUR_CLIENT_SECRET
FACEBOOK_CALLBACK_URL="${APP_URL}/auth/provider/facebook/callback"

GITHUB_CLIENT_ID=YOUR_CLIENT_ID
GITHUB_CLIENT_SECRET=YOUR_CLIENT_SECRET
GITHUB_CALLBACK_URL="${APP_URL}/auth/provider/github/callback"

GOOGLE_CLIENT_ID=YOUR_CLIENT_ID
GOOGLE_CLIENT_SECRET=YOUR_CLIENT_SECRET
GOOGLE_REDIRECT_URI="${APP_URL}/auth/provider/google/callback"

TWITTER_CLIENT_ID=YOUR_CLIENT_ID
TWITTER_CLIENT_SECRET=YOUR_CLIENT_SECRET
TWITTER_REDIRECT_URI="${APP_URL}/auth/provider/twitter/callback"

VKONTAKTE_CLIENT_ID=YOUR_CLIENT_ID
VKONTAKTE_CLIENT_SECRET=YOUR_CLIENT_SECRET
VKONTAKTE_REDIRECT_URI="${APP_URL}/auth/provider/vkontakte/callback"

YANDEX_CLIENT_ID=YOUR_CLIENT_ID
YANDEX_CLIENT_SECRET=YOUR_CLIENT_SECRET
YANDEX_REDIRECT_URI="${APP_URL}/auth/provider/yandex/callback"
```

## Backpack's addons

By default, the following packages have been added and configured:

- [CRUD](https://github.com/Laravel-Backpack/CRUD)
- [PermissionManager](https://github.com/Laravel-Backpack/PermissionManager)
- [Settings](https://github.com/Laravel-Backpack/Settings)
- [PageManager](https://github.com/Laravel-Backpack/PageManager)
- [MenuCRUD](https://github.com/Laravel-Backpack/MenuCRUD)
- [FileManager](https://github.com/Laravel-Backpack/FileManager)
- [LogManager](https://github.com/Laravel-Backpack/LogManager)
- [BackupManager](https://github.com/Laravel-Backpack/BackupManager)

## Screenshots

<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/screenshots/login.png" alt="" /></a></p>
<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/screenshots/register.png" alt="" /></a></p>
<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/screenshots/email_verify.png" alt="" /></a></p>

## Documentations

- [Laravel](https://laravel.com/docs)
- [Backpack 5](https://backpackforlaravel.com/docs)
- [Social Providers](https://socialiteproviders.com/usage/)

## Contributors

- [Andrej Kopp](https://github.com/SequelONE)
- [Cristian Tabacitu](https://github.com/tabacitu) ([Backpack 5](https://backpackforlaravel.com))
- [Taylor Otwell](https://github.com/taylorotwell) ([Laravel](https://laravel.com))
