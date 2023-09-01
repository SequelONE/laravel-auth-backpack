<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses",
    |            "postmark", "log", "array", "failover"
    |
    */

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'auth_mode' => null,
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -t -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    'body' => [
        'top_logo'          => env('APP_URL', 'http://localhost/') . '/img/logo-white.png',
        'welcome_url'       => env('APP_URL', 'http://localhost/') . 'login',
        'street_address'    => '74706 Osterburken',
        'phone_number'      => '+49 (1514) 000-00-00',
        'info_email'        => 'admin@sequel.one',
        'play_url'          => 'https://play.google.com',
        'ios_url'           => 'https://store.apple.com',

        'icon_one'          => env('APP_URL', 'http://localhost/') . '/assets/img/emails/Email-1_Icon-1.png',
        'icon_two'          => env('APP_URL', 'http://localhost/') . '/assets/img/emails/Email-5_Intro.png',
        'icon_three'        => env('APP_URL', 'http://localhost/') . '/assets/img/emails/Email-3_Intro.png',

        // To remove from the email footer - make the value blank
        'facebook_url'      => 'https://facebook.com',
        'twitter_url'       => 'https://twitter.com',
        'instagram_url'     => 'https://instagram.com',
        'pinterest_url'     => 'https://pinterest.com',
        'linkedin_url'      => 'https://linkedin.com',

        // Copyright
        'copyright' => '© ' . copyright(2015),
        'website_name' => env('APP_NAME', 'Laravel'),
        'website' => env('APP_URL', 'http://localhost/'),
        'website_support' => env('APP_URL', 'http://localhost/') . 'support',
    ],

];
