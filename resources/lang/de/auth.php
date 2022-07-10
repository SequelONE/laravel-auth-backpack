<?php

return [

    /*
    |--------------------------------------------------------------------------
    / Authentifizierungssprachen zeilen
    |--------------------------------------------------------------------------
    |
    / Die folgenden Sprachzeilen werden bei der Authentifizierung für verschiedene
    / nachrichten, die wir dem Benutzer anzeigen müssen. Sie sind frei zu ändern
    / diese Sprachzeilen entsprechend den Anforderungen Ihrer Anwendung.
    |
    */

    'failed' => 'Diese Anmeldeinformationen stimmen nicht mit unseren Datensätzen überein.',
    'passwordIncorrect' => 'Das angegebene Passwort ist falsch.',
    'throttle' => 'Zu viele Anmeldeversuche. Bitte versuchen Sie es erneut in :Sekunden Sekunden.',

    // Aktivierungselemente
    'sentEmail' => 'Wir haben eine E-Mail gesendet an :E-Mail.',
    'clickInEmail' => 'Bitte klicken Sie auf den darin enthaltenen Link, um Ihr Konto zu aktivieren.',
    'anEmailWasSent' => 'Eine E-Mail wurde gesendet an :E-Mail am :Datum.',
    'clickHereResend' => 'Klicken Sie hier, um die E-Mail erneut zu senden.',
    'successActivated' => 'Erfolg, Ihr Konto wurde aktiviert.',
    'erfolglos' => 'Ihr Konto konnte nicht aktiviert werden; bitte versuchen Sie es erneut.',
    'notCreated' => 'Ihr Konto konnte nicht erstellt werden; bitte versuchen Sie es erneut.',
    'tooManyEmails' => 'Es wurden zu viele Aktivierung E-Mails gesendet an :email. <br />Bitte versuchen Sie es erneut in <span class="label label-danger">:hours Stunden</span>.',
    'regThanks' => 'Vielen Dank für Ihre Registrierung, ',
    'invalidToken' => 'Ungültiges Aktivierungstoken. ',
    'activationSent' => 'Aktivierungs-E-Mail gesendet. ',
    'alreadyActivated' => 'Bereits aktiviert. ',
    'confirmPasswordContinuing' => 'Bitte bestätigen Sie Ihr Passwort, bevor Sie fortfahren.',

    // Etikett
    'whoops' => 'Hoppla! ',
    'someProblems' => 'Es gab einige Probleme mit deiner Eingabe.',
    'email' => 'E-Mail-Adresse',
    'password' => 'Passwort',
    'rememberMe' => ' Erinnere dich an mich',
    'login' => 'Anmelden',
    'forgot' => 'Passwort vergessen?',
    'forgot_message' => 'Probleme mit dem Passwort?',
    'name' => 'Benutzername',
    'first_name' => 'Vorname',
    'last_name' => 'Nachname',
    'confirmPassword' => 'Passwort bestätigen',
    'registrieren' => 'Registrieren',
    'captcha' => 'Eingabeaufforderung',

    // Platzhalter
    'ph_name' => 'Benutzername',
    'ph_email' => 'E-Mail-Adresse',
    'ph_firstname' => 'Vorname',
    'ph_lastname' => 'Nachname',
    'ph_password' => 'Passwort',
    'ph_password_conf' => 'Passwort bestätigen',

    // Benutzer-Flash-Nachrichten
    'sendResetLink' => 'Link zum Zurücksetzen des Passworts senden',
    'resetPassword' => 'Passwort zurücksetzen',
    'loggedIn' => 'Sie sind angemeldet!',

    // e-Mail-Links
    'pleaseActivate' => 'Bitte aktivieren Sie Ihr Konto.',
    'clickHereReset' => 'Klicken Sie hier, um Ihr Passwort zurückzusetzen: ',
    'clickHereActivate' => 'Klicken Sie hier, um Ihr Konto zu aktivieren: ',

    // Prüfer
    'userNameTaken' => 'Benutzername ist vergeben',
    'userNameRequired' => 'Benutzername ist erforderlich',
    'fNameRequired' => 'Vorname ist erforderlich',
    'lNameRequired' => 'Nachname ist erforderlich',
    'emailRequired' => 'E-Mail ist erforderlich',
    'emailInvalid' => 'E-Mail ist ungültig',
    'passwordRequired' => 'Passwort ist erforderlich',
    'passwordMin' => 'Passwort muss mindestens 6 Zeichen lang sein',
    'passwordMax' => 'Die maximale Länge des Passworts beträgt 20 Zeichen',
    'captcha_require' => 'Captcha ist erforderlich',
    'captcha_wrong' => 'Falsches Captcha, bitte versuchen Sie es erneut.',
    'roleRequired' => 'Benutzerrolle ist erforderlich.',

    // Passwort-Validierung
    'charactersLong' => 'Ihr Passwort muss 8-20 Zeichen lang sein, muss Sonderzeichen enthalten "!@#$%&*_?", Zahlen, nur Klein- und Großbuchstaben.',
    'characters' => 'Mindestens 8 Zeichen, Zahl, Sonderzeichen Groß- und Kleinbuchstaben',
    'strongPassword' => 'Starkes Passwort!',

    'specialChars' => 'Sonderzeichen',
    'upperCase' => 'Großbuchstaben',
    'numbers' => 'Zahlen',
    'lowerCase' => 'Kleinbuchstaben',

    'wayTooWeak' => 'Viel zu schwach',
    'veryWeak' => 'Sehr schwach',
    'weak' => 'Schwach',
    'mittel' => 'Mittel',
    'strong' => 'Stark',
    'moreChars' => 'weitere Zeichen',
    'yourRequest' => 'Ihre Anfrage',

    // Labels soziale Anbieter
    'socialProviders' => 'Soziale Anbieter',
    'loginSocialProvider' => 'Sie können sich bei sozialen Netzwerken anmelden, um sich einfach anzumelden.',
    'yandex' => 'Mit Yandex anmelden',
    'twitter' => 'Mit Twitter anmelden',
    'facebook' => 'Mit Facebook anmelden',
    'vk' => 'Mit VK anmelden',
    'github' => 'Mit GitHub anmelden',
    'google' => 'Mit Google anmelden',

    // E-Mail verifizieren
    'emailVerify' => 'Verifizieren Sie Ihre E-Mail-Adresse',
    'verificationLink' => 'Ein neuer Bestätigungslink wurde an Ihre E-Mail-Adresse gesendet.',
    'checkEmail' => 'Bevor Sie fortfahren, überprüfen Sie bitte Ihre E-Mail auf einen Bestätigungslink.',
    'notReceive' => 'Wenn Sie die E-Mail nicht erhalten haben',
    'clickHereRequest' => 'hier klicken, um eine weitere Anfrage zu stellen',
];
