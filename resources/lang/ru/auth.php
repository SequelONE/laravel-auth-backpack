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

    'failed' => 'Эти учетные данные не соответствуют нашим записям.',
    'passwordIncorrect' => 'Указанный пароль неверен.',
    'throttle' => 'Слишком много попыток входа в систему. Пожалуйста, повторите попытку через :seconds секунд.',

    // Activation items
    'sentEmail' => 'Мы отправили электронное письмо на e-mail :email.',
    'clickInEmail' => 'Пожалуйста, нажмите на ссылку в нем, чтобы активировать свою учетную запись.',
    'anEmailWasSent' => 'Электронное письмо было отправлено на e-mail :email :date.',
    'clickHereResend' => 'Нажмите здесь, чтобы повторно отправить электронное письмо.',
    'successActivated' => 'Поздравляем, ваша учетная запись активирована.',
    'unsuccessful' => 'Ваша учетная запись не может быть активирована. Пожалуйста, повторите попытку.',
    'notCreated' => 'Ваша учетная запись не может быть создана. Пожалуйста, повторите попытку.',
    'tooManyEmails' => 'Слишком много писем с активацией было отправлено на :email. <br />Пожалуйста, попробуйте еще раз в <span class="label label-danger">:hours часов</span>.',
    'regThanks' => 'Благодарим вас за регистрацию, ',
    'invalidToken' => 'Недопустимый токен активации. ',
    'activationSent' => 'Отправлено электронное письмо для активации. ',
    'alreadyActivated' => 'Уже активирован. ',
    'confirmPasswordContinuing' => 'Пожалуйста, подтвердите свой пароль, прежде чем продолжить.',

    // Labels
    'whoops' => 'Ой! ',
    'someProblems' => 'Были некоторые проблемы с вашим вводом.',
    'email' => 'E-Mail',
    'password' => 'Пароль',
    'rememberMe' => ' Запомнить меня',
    'login' => 'Войти',
    'logout' => 'Выйти',
    'forgot' => 'Забыли свой пароль?',
    'forgot_message' => 'Проблемы с паролем?',
    'name' => 'Имя пользователя',
    'first_name' => 'Имя',
    'last_name' => 'Фамилия',
    'confirmPassword' => 'Подтвердите пароль',
    'register' => 'Регистрация',
    'captcha' => 'Капча',

    // Placeholders
    'ph_name' => 'Имя пользователя',
    'ph_email' => 'E-mail',
    'ph_firstname' => 'Имя',
    'ph_lastname' => 'Фамилия',
    'ph_password' => 'Пароль',
    'ph_password_conf' => 'Подтвердить пароль',

    // User flash messages
    'sendResetLink' => 'Отправить ссылку для сброса пароля',
    'resetPassword' => 'Сброс пароля',
    'loggedIn' => 'Вы вошли в систему!',

    // email links
    'pleaseActivate' => 'Пожалуйста, активируйте свою учетную запись.',
    'clickHereReset' => 'Нажмите здесь, чтобы сбросить свой пароль: ',
    'clickHereActivate' => 'Нажмите здесь, чтобы активировать свою учетную запись: ',

    // Validators
    'userNameTaken' => 'Имя пользователя занято',
    'userNameRequired' => 'Имя пользователя обязательно',
    'fNameRequired' => 'Имя обязательно',
    'lNameRequired' => 'Фамилия обязательна',
    'emailRequired' => 'Требуется электронная почта',
    'emailInvalid' => 'Адрес электронной почты недействителен',
    'passwordRequired' => 'Требуется ввести пароль',
    'PasswordMin' => 'Пароль должен содержать не менее 6 символов',
    'PasswordMax' => 'Максимальная длина пароля 20 символов',
    'captcha_require' => 'Требуется ввод капчи',
    'captcha_wrong' => 'Неправильная капча, пожалуйста, попробуйте еще раз.',
    'roleRequired' => 'Требуется роль пользователя.',

    // Password validation
    'charactersLong' => 'Ваш пароль должен состоять из 8-20 символов и содержать специальные символы "!@#$%&*_?", цифры, только строчные и прописные буквы.',
    'characters' => 'Не менее 8 символов, число, специальный символ, заглавная буква и строчные буквы',
    'strongPassword' => 'Надежный пароль!',

    'specialChars' => 'специальные символы',
    'upperCase' => 'верхний регистр',
    'numbers' => 'числа',
    'lowerCase' => 'нижний регистр',

    'wayTooWeak' => 'Слишком слаб',
    'veryWeak' => 'Очень слабый',
    'weak' => 'Слабый',
    'medium' => 'Средний',
    'strong' => 'Сильный',
    'moreChars' => 'больше символов',
    'yourRequest' => 'ваш запрос',

    // Labels social providers
    'socialProviders' => 'Социальные провайдеры',
    'loginSocialProvider' => 'Вы можете войти в социальные сети для удобства входа в систему.',
    'yandex' => 'Войти через Яндекс',
    'twitter' => 'Войти через Twitter',
    'facebook' => 'Войти через Facebook',
    'vk' => 'Войти через VK',
    'github' => 'Войти через GitHub',
    'google' => 'Войти через Google',

    // E-mail verify
    'emailVerify' => 'Подтвердите свой адрес электронной почты',
    'verificationLink' => 'На ваш адрес электронной почты была отправлена новая ссылка для подтверждения.',
    'checkEmail' => 'Прежде чем продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения.',
    'notReceive' => 'Если вы не получили электронное письмо',
    'clickHereRequest' => 'нажмите здесь, чтобы запросить другой',
];
