<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/logo_slb_auth.png" alt="" /></a></p>

# Laravel + Backpack PRO + Auth

This build disables Backpack authentication and enables standard Laravel authentication methods. Authorization laravel/ui bootstrap is enabled by default. Account confirmation by email is also included. Authorization via social networks has also been added. The user's account can be protected using two-factor authentication.

Also, an example of how Backpack packages work on the frontend has been added to the assembly.

Localization of all routes is present. Make a multilingual website from scratch.

### !!! Only for Backpack PRO users !!!

## Laravel compatibility

Laravel      | Backpack | Auth
:-------------|:----------|:----------
8.x (PHP version >= 7.3 required)  | 5.x | 1.0.x
9.x (PHP version >= 8.0 required)  | 5.x | 2.0.x
10.x (PHP version >= 8.1 required) | 5.x | 3.0.x
10.x (PHP version >= 8.1 required) | 6.x | 4.0.x
11.x (PHP version >= 8.2 required) | 6.x | 5.0.x

Demonstration: [S01](https://s01.one)

## Installation

Clone the repository to your server directory:

```phpregexp
git clone https://github.com/SequelONE/laravel-auth-backpack.git
```

Rename the `.env.example` file to `.env`

Be sure to change the `localhost` to your domain or IP address without slash in end.

```phpregexp
APP_URL=http://localhost
APP_DOMAIN=localhost
```

Example:

```phpregexp
APP_URL=https://sequel.one
APP_DOMAIN=sequel.one
```

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
npm install && npm run build
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
##### Context
Added support for multi-domain through contexts. 

After installing the seeders, it is necessary to change the default host to the host of your site in the admin panel in the contexts (http://localhost/admin/context) section.

Pages linked to contexts will be displayed only on the specified subdomain or other domain. In the menu, items with the selected context are displayed only on are displayed only on a specific subdomain or domain.

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

#### Install FileManager
```phpregexp
php artisan backpack:filemanager:install
```

#### Install Basset
```phpregexp
php artisan basset:install

#OPTIONAL - publish the config file. 
php artisan vendor:publish --provider="Backpack\Basset\BassetServiceProvider"
```

> ##### Note
> Basset is disabled by default on local environment. If you want to change it, please set BASSET_DEV_MODE=false in your env file.

 In `.env`:
 
```phpregexp
BASSET_DEV_MODE=false
```

For local from CDNs:

```phpregexp
// instead of
<link href="{{ asset('path/to/public/file.css') }}">

// you can do
<link href="{{ basset('path/to/public/file.css' }}">
<link href="{{ basset('https://cdn.com/path/to/file.css') }}">
<link href="{{ basset(base_path('vendor/org/package/assets/file.css')) }}">
<link href="{{ basset(storage_path('file.css')) }}">
```

##### The basset Commands
```phpregexp
php artisan basset:cache         # internalizes all @bassets
php artisan basset:clear         # clears the basset directory
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
APP_URL=http://localhost/
APP_LOG=daily
APP_DOMAIN=localhost

BACKPACK_THEME=backpack.theme-tabler
BASSET_DEV_MODE=false

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
DB_PREFIX=

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
MAIL_TO=you@mail.com

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

OTP_ENABLED=true
OTP_LIFETIME=1
OTP_KEEP_ALIVE=true
OTP_THROW_EXCEPTION=true

API_DOMAIN=api.site.com

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

IPDATA_API_KEY=YOUR_API_KEY
MAXMIND_LICENSE_KEY=YOUR_LICENSE_KEY
```

In some cases, it is necessary to throw off the cache:

```php
php artisan optimize:clear
```

## Backpack's addons

By default, the following packages have been added and configured:

- [Backpack\CRUD](https://github.com/Laravel-Backpack/CRUD)
- [Backpack\PermissionManager](https://github.com/Laravel-Backpack/PermissionManager)
- [Backpack\Settings](https://github.com/Laravel-Backpack/Settings)
- [Backpack\PageManager](https://github.com/Laravel-Backpack/PageManager)
- [Backpack\MenuCRUD](https://github.com/Laravel-Backpack/MenuCRUD)
- [Backpack\NewsCRUD](https://github.com/Laravel-Backpack/NewsCRUD)
- [Backpack\FileManager](https://github.com/Laravel-Backpack/FileManager)
- [Backpack\LogManager](https://github.com/Laravel-Backpack/LogManager)
- [Backpack\BackupManager](https://github.com/Laravel-Backpack/BackupManager)
- [Backpack\ActivityLog](https://github.com/laravel-backpack/activity-log)
- [Backpack\Basset](https://github.com/Laravel-Backpack/basset)
- [Backpack\LanguageSwitcher](https://github.com/Laravel-Backpack/language-switcher)
- [Backpack\ReviseOperation](https://github.com/Laravel-Backpack/revise-operation)

## Backpack's templates
- [Backpack\ThemeCoreUIv2](https://github.com/Laravel-Backpack/theme-coreuiv2)
- [Backpack\ThemeCoreUIv4](https://github.com/Laravel-Backpack/theme-coreuiv4)
- [Backpack\ThemeTabler](https://github.com/Laravel-Backpack/theme-tabler)

## Screenshots

<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/screenshots/login.png" alt="" /></a></p>
<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/screenshots/register.png" alt="" /></a></p>
<p align="center"><a href="https://sequel.one"><img src="https://s01.one/img/screenshots/email_verify.png" alt="" /></a></p>

## Documentations

- [Laravel](https://laravel.com/docs)
- [Backpack 6](https://backpackforlaravel.com/docs)
- [Social Providers](https://socialiteproviders.com/usage/)

## Contributors

- [Andrej Kopp](https://github.com/SequelONE) ([SEQUEL.ONE](https://sequel.one))
- [Cristian Tabacitu](https://github.com/tabacitu) ([Backpack 6](https://backpackforlaravel.com))
- [Taylor Otwell](https://github.com/taylorotwell) ([Laravel](https://laravel.com))
