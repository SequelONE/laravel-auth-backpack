<?php

return [
    'hello' => 'Hello',
    'whoops' => 'Whoops!',

    // E-mail verification
    'clickButton' => 'Click the button below to verify your email address.',
    'verifyEmail' => 'Verify Email Address',
    'copyLink' => 'If youre having trouble clicking the :actionText button, copy and paste the URL below. Into your web browser:',

    // Password reset
    'resetPasswordNotification' => 'Reset Password Notification',
    'passwordResetRequest' => 'You are receiving this email because we received a password reset request for your account.',
    'passwordReset' => 'Reset Password',
    'passwordResetLink' => 'This password reset link will expire in :count minutes.',
    'notRequestPasswordReset' => 'If you did not request a password reset, no further action is required.',

    // User Auth
    'ipAdresse' => 'IP-Adresse',
    'isoCode' => 'ISO Code',
    'country' => 'Country',
    'city' => 'City',
    'state' => 'State',
    'stateName' => 'State name',
    'postalCode' => 'Postal code',
    'timezone' => 'Timezone',
    'questionsOrFeedback' => 'If you have any questions or feedback, just',
    'reply' => 'reply to this email',
    'emailWasUsed' => 'Your security is very important to us. This email address was used to access the ' . config('app.name', 'Laravel') . ' dashboard from a new IP address:',
    '2faProfile' => 'If this was you, you can ignore this alert. If you noticed any suspicious activity on your account, please change your password and enable two-factor authentication on your account page at <a href="' . config('app.url', 'http://localhost/') . 'profile">' . config('app.url', 'http://localhost/') . 'profile.</a>',
    'support' => 'If you have any questions or concerns, dont hesitate to contact ' . config('app.name', 'Laravel') . ' support at <a href="' . config('mail.body.website_support') . '">' . config('mail.body.website_support') . '</a>.',
];
