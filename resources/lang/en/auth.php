<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'passwordIncorrect' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    // Activation items
    'sentEmail' => 'We have sent an email to :email.',
    'clickInEmail' => 'Please click the link in it to activate your account.',
    'anEmailWasSent' => 'An email was sent to :email on :date.',
    'clickHereResend' => 'Click here to resend the email.',
    'successActivated' => 'Success, your account has been activated.',
    'unsuccessful' => 'Your account could not be activated; please try again.',
    'notCreated' => 'Your account could not be created; please try again.',
    'tooManyEmails' => 'Too many activation emails have been sent to :email. <br />Please try again in <span class="label label-danger">:hours hours</span>.',
    'regThanks' => 'Thank you for registering, ',
    'invalidToken' => 'Invalid activation token. ',
    'activationSent' => 'Activation email sent. ',
    'alreadyActivated' => 'Already activated. ',
    'confirmPasswordContinuing' => 'Please confirm your password before continuing.',

    // Labels
    'whoops' => 'Whoops! ',
    'someProblems' => 'There were some problems with your input.',
    'email' => 'E-Mail Address',
    'password' => 'Password',
    'rememberMe' => ' Remember Me',
    'login' => 'Login',
    'logout' => 'Logout',
    'forgot' => 'Forgot Your Password?',
    'forgot_message' => 'Password Troubles?',
    'name' => 'Username',
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'confirmPassword' => 'Confirm Password',
    'register' => 'Register',
    'captcha' => 'Captcha',

    // Placeholders
    'ph_name' => 'Username',
    'ph_email' => 'E-mail Address',
    'ph_firstname' => 'First Name',
    'ph_lastname' => 'Last Name',
    'ph_password' => 'Password',
    'ph_password_conf' => 'Confirm Password',

    // User flash messages
    'sendResetLink' => 'Send Password Reset Link',
    'resetPassword' => 'Reset Password',
    'loggedIn' => 'You are logged in!',

    // email links
    'pleaseActivate' => 'Please activate your account.',
    'clickHereReset' => 'Click here to reset your password: ',
    'clickHereActivate' => 'Click here to activate your account: ',

    // Validators
    'userNameTaken' => 'Username is taken',
    'userNameRequired' => 'Username is required',
    'fNameRequired' => 'First Name is required',
    'lNameRequired' => 'Last Name is required',
    'emailRequired' => 'Email is required',
    'emailInvalid' => 'Email is invalid',
    'passwordRequired' => 'Password is required',
    'PasswordMin' => 'Password needs to have at least 6 characters',
    'PasswordMax' => 'Password maximum length is 20 characters',
    'captcha_require' => 'Captcha is required',
    'captcha_wrong' => 'Wrong captcha, please try again.',
    'roleRequired' => 'User role is required.',

    // Password validation
    'charactersLong' => 'Your password must be 8-20 characters long, must contain special characters "!@#$%&*_?", numbers, lower and upper letters only.',
    'characters' => 'At least 8 characters, number, special character capital letter and small letters',
    'strongPassword' => 'Strong Password!',

    'specialChars' => 'special chars',
    'upperCase' => 'upper case',
    'numbers' => 'numbers',
    'lowerCase' => 'lower case',

    'wayTooWeak' => 'Way too weak',
    'veryWeak' => 'Very Weak',
    'weak' => 'Weak',
    'medium' => 'Medium',
    'strong' => 'Strong',
    'moreChars' => 'more chars',
    'yourRequest' => 'your request',

    // Labels social providers
    'socialProviders' => 'Social providers',
    'loginSocialProvider' => 'You can log in to social networks for easy login.',
    'yandex' => 'Login with Yandex',
    'twitter' => 'Login with Twitter',
    'facebook' => 'Login with Facebook',
    'vk' => 'Login with VK',
    'github' => 'Login with GitHub',
    'google' => 'Login with Google',

    // E-mail verify
    'emailVerify' => 'Verify Your Email Address',
    'verificationLink' => 'A fresh verification link has been sent to your email address.',
    'checkEmail' => 'Before proceeding, please check your email for a verification link.',
    'notReceive' => 'If you did not receive the email',
    'clickHereRequest' => 'click here to request another',
];
