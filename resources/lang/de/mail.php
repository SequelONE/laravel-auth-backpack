<?php

return [
    'hello' => 'Hallo',
    'whoops' => 'Hoppla!',
    'messageFromSite' => 'Sie haben eine Nachricht von Ihrer Website erhalten. Sie können es unten lesen.',
    'name' => 'Name',
    'email' => 'E-mail',
    'phone' => 'Telefon',
    'message' => 'Nachricht',
    'captcha' => 'Captcha',
    'submit' => 'Senden',
    'subject' => 'Thema',
    'attachment' => 'Anlage',

    'clickButton' => 'Klicken Sie auf die Schaltfläche unten, um Ihre E-Mail-Adresse zu bestätigen.',
    'verifyEmail' => 'E-Mail-Adresse bestätigen',
    'copyLink' => 'Wenn Sie Probleme beim Klicken auf die Schaltfläche :actionText haben, kopieren Sie die unten stehende URL und fügen Sie sie ein. In Ihren Webbrowser:',

    // Password reset
    'resetPasswordNotification' => 'Benachrichtigung zum Zurücksetzen des Passworts',
    'passwordResetRequest' => 'Sie erhalten diese E-Mail, weil wir eine Anfrage zum Zurücksetzen des Passworts für Ihr Konto erhalten haben.',
    'passwordReset' => 'Passwort zurücksetzen',
    'passwordResetLink' => 'Dieser Link zum Zurücksetzen des Passworts läuft ab in :count Minuten.',
    'notRequestPasswordReset' => 'Wenn Sie kein Zurücksetzen des Passworts angefordert haben, sind keine weiteren Maßnahmen erforderlich.',

    // User Auth
    'ipAdresse' => 'IP-Adresse',
    'isoCode' => 'ISO Code',
    'country' => 'Land',
    'city' => 'Stadt',
    'state' => 'Staat',
    'stateName' => 'Staatsname',
    'postalCode' => 'Postleitzahl',
    'timezone' => 'Zeitzone',
    'questionsOrFeedback' => 'Wenn Sie Fragen oder Feedback haben, schreiben Sie einfach',
    'reply' => 'auf diese E-Mail antworten',
    'emailWasUsed' => 'Ihre Sicherheit ist uns sehr wichtig. Diese E-Mail-Adresse wurde verwendet, um von einer neuen IP-Adresse aus auf das ' . config('app.name', 'Laravel') . ' Dashboard zuzugreifen:',
    '2faProfile' => 'Wenn Sie es waren, können Sie diese Warnung ignorieren. Wenn Sie verdächtige Aktivitäten in Ihrem Konto bemerkt haben, ändern Sie bitte Ihr Passwort und aktivieren Sie die Zwei-Faktor-Authentifizierung auf Ihrer Kontoseite unter <a href="' . config('app.url', 'http://localhost/') . 'profile">' . config('app.url', 'http://localhost/') . 'profile.</a>.',
    'support' => 'Wenn Sie Fragen oder Bedenken haben, zögern Sie nicht, den Support bei ' . config('app.name', 'Laravel') . ' zu kontaktieren <a href="' . config('mail.body.website_support') . '">' . config('mail.body.website_support') . '</a>.',
];
