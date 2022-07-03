<?php

use App\Models\Setting;

return [
    'logo' => Setting::get('logo'),

    'favicon' => Setting::get('favicon'),

    'email' => Setting::get('email'),
];
