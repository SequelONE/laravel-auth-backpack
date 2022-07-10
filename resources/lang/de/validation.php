<?php

return [

    /*
    |--------------------------------------------------------------------------
    / Validierungssprachenzeilen
    |--------------------------------------------------------------------------
    |
    / Die folgenden Sprachzeilen enthalten die Standardfehlermeldungen, die von
    / die Validator-Klasse. Einige dieser Regeln haben mehrere Versionen wie
    / wie die Größenregeln. Fühlen Sie sich frei, jede dieser Nachrichten hier zu optimieren.
    |
    */

    'accepted' => 'Das Attribut :attribute muss akzeptiert werden.',
    'accepted_if' => 'Das Attribut :attribute muss akzeptiert werden, wenn :other :value ist.',
    'active_url' => 'Das Attribut :attribute ist keine gültige URL.',
    'after' => 'Das Attribut :attribute muss ein Datum nach :date sein.',
    'after_or_equal' => 'Das Attribut :attribute muss ein Datum nach oder gleich :date sein.',
    'alpha' => 'Das Attribut :attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das Attribut :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das Attribut :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das Attribut :attribute muss ein Array sein.',
    'before' => 'Das Attribut :attribute muss ein Datum vor :date sein.',
    'before_or_equal' => 'Das Attribut :attribute muss ein Datum vor oder gleich :date sein.',
    'zwischen' => [
        'numeric' => 'Das Attribut :attribute muss zwischen :min und :max liegen.',
        'file' => 'Das Attribut :attribute muss zwischen :min und :max Kilobyte liegen.',
        'string' => 'Das Attribut :attribute muss zwischen :min und :max Zeichen liegen.',
        'array' => 'Das Attribut :attribute muss zwischen :min und :max Elemente enthalten.',
    ],
    'boolean' => 'Das Feld :attribute muss true oder false sein.',
    'confirmed' => 'Das Attribut :attribute Bestätigung stimmt nicht überein.',
    'current_password' => 'Das Passwort ist falsch.',
    'date' => 'Das Attribut :attribute ist kein gültiges Datum.',
    'date_equals' => 'Das Attribut :attribute muss ein Datum sein, das gleich :date ist.',
    'date_format' => 'Das Attribut :attribute stimmt nicht mit dem Format :format überein.',
    'declined' => 'Das Attribut :attribute muss abgelehnt werden.',
    'declined_if' => 'Das Attribut :attribute muss abgelehnt werden, wenn :other :value ist.',
    'different' => 'Das Attribut :attribute und :other müssen unterschiedlich sein.',
    'digits' => 'Das Attribut :attribute muss sein :digits digits.',
    'digits_between' => 'Das Attribut :attribute muss zwischen :min- und :max-Ziffern liegen.',
    'dimensions' => 'Das Attribut :attribute hat ungültige Bildabmessungen.',
    'distinct' => 'Das Feld :attribute hat einen doppelten Wert.',
    'email' => 'Das Attribut :attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das Attribut :attribute muss mit einem der folgenden: :values enden.',
    'enum' => 'Das selected :attribute ist ungültig.',
    'exists' => 'Das selected :attribute ist ungültig.',
    'file' => 'Das Attribut :attribute muss eine Datei sein.',
    'filled' => 'Das Feld :attribute muss einen Wert haben.',
    'gt' => [
        'numeric' => 'Das Attribut :attribute muss größer als :value sein.',
        'file' => 'Das Attribut :attribute muss größer sein als :Wert Kilobyte.',
        'string' => 'Das Attribut :attribute muss größer als :value Zeichen sein.',
        'array' => 'Das Attribut :attribute muss mehr als :value Elemente enthalten.',
    ],
    'gte' => [
        'numeric' => 'Das Attribut :attribute muss größer oder gleich :value sein.',
        'file' => 'Das Attribut :attribute muss größer oder gleich dem Wert Kilobyte sein.',
        'string' => 'Das Attribut :attribute muss größer oder gleich :value Zeichen sein.',
        'array' => 'Das Attribut :attribute muss :value-Elemente oder mehr enthalten.',
    ],
    'image' => 'Das Attribut :attribute muss ein Bild sein.',
    'in' => 'Das selected :attribute ist ungültig.',
    'in_array' => 'Das Feld :attribute existiert nicht in :other.',
    'integer' => 'Das Attribut :attribute muss eine Ganzzahl sein.',
    'ip' => 'Das Attribut :attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Das Attribut :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das Attribut :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das Attribut :attribute muss ein gültiger JSON-String sein.',
    'es' => [
        'numeric' => 'Das Attribut :attribute muss kleiner als :value sein.',
        'file' => 'Das Attribut :attribute muss kleiner sein als :Wert Kilobyte.',
        'string' => 'Das Attribut :attribute muss kleiner als :value Zeichen sein.',
        'array' => 'Das Attribut :attribute muss Elemente mit weniger als :Werten enthalten.',
    ],
    'lte' => [
        'numeric' => 'Das Attribut :attribute muss kleiner oder gleich :value sein.',
        'file' => 'Das Attribut :attribute muss kleiner oder gleich dem Wert Kilobyte sein.',
        'string' => 'Das Attribut :attribute muss kleiner oder gleich :value Zeichen sein.',
        'array' => 'Das Attribut :attribute darf nicht mehr als :value Elemente enthalten.',
    ],
    'mac_address' => 'Das Attribut :attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'numeric' => 'Das Attribut :attribute darf nicht größer sein als :max.',
        'file' => 'Das Attribut :attribute darf nicht größer sein als :max Kilobyte.',
        'string' => 'Das Attribut :attribute darf nicht größer als :max Zeichen sein.',
        'array' => 'Das Attribut :attribute darf nicht mehr als :max Elemente enthalten.',
    ],
    'mimes' => 'Das Attribut :attribute muss eine Datei vom Typ: :values sein.',
    'mimetypes' => 'Das Attribut :attribute muss eine Datei vom Typ: :values sein.',
    'min' => [
        'numeric' => 'Das Attribut :attribute muss mindestens :min.',
        'file' => 'Das Attribut :attribute muss mindestens :min Kilobyte groß sein.',
        'string' => 'Das Attribut :attribute muss mindestens :min Zeichen lang sein.',
        'array' => 'Das Attribut :attribute muss mindestens :min Elemente enthalten.',
    ],
    'multiple_of' => 'Das Attribut :attribute muss ein Vielfaches von :value sein.',
    'not_in' => 'Das selected :attribute ist ungültig.',
    'not_regex' => 'Das Format des Attributs :attribute ist ungültig.',
    'numeric' => 'Das Attribut :attribute muss eine Zahl sein.',
    'password' => 'Das Passwort ist falsch.',
    'present' => 'Das Feld :attribute muss vorhanden sein.',
    'prohibited' => 'Das Feld :attribute ist verboten.',
    'prohibited_if' => 'Das Feld :attribute ist verboten, wenn :other :value ist.',
    'prohibited_unless' => 'Das Feld :attribute ist verboten, es sei denn, :other ist in :values .',
    'prohibits' => 'Das Feld :attribute verbietet :other, anwesend zu sein.',
    'regex' => 'Das :attribute format ist ungültig.',
    'required' => 'Das Feld :attribute ist erforderlich.',
    'required_array_keys' => 'Das Feld :attribute muss Einträge für: :values enthalten.',
    'required_if' => 'Das Feld :attribute wird benötigt, wenn :other :value ist.',
    'required_unless' => 'Das Feld :attribute ist erforderlich, es sei denn, :other ist in :values enthalten.',
    'required_with' => 'Das Feld :attribute wird benötigt, wenn :values vorhanden ist.',
    'required_with_all' => 'Das Feld :attribute wird benötigt, wenn :values vorhanden sind.',
    'required_without' => 'Das Feld :attribute wird benötigt, wenn :values nicht vorhanden ist.',
    'required_without_all' => 'Das Feld :attribute ist erforderlich, wenn keiner von :values vorhanden ist.',
    'same' => 'Das :attribute und :other müssen übereinstimmen.',
    'size' => [
        'numeric' => 'Das Attribut :attribute muss :size sein.',
        'file' => 'Das Attribut :attribute muss sein :size kilobyte.',
        'string' => 'Das :attribute muss :size Zeichen sein.',
        'array' => 'Das :attribute muss :size Elemente enthalten.',
    ],
    'starts_with' => 'Das Attribut :attribute muss mit einem der folgenden: :values beginnen.',
    'string' => 'Das Attribut :attribute muss ein String sein.',
    'timezone' => 'Das Attribut :attribute muss eine gültige Zeitzone sein.',
    'unique' => 'Das Attribut :attribute wurde bereits verwendet.',
    'uploaded' => 'Das Attribut :attribute konnte nicht hochgeladen werden.',
    'url' => 'Das Attribut :attribute muss eine gültige URL sein.',
    'uuid' => 'Das Attribut :attribute muss eine gültige UUID sein.',

    /*
    |--------------------------------------------------------------------------
    / Benutzerdefinierte Validierungssprachenzeilen
    |--------------------------------------------------------------------------
    |
    / Hier können Sie benutzerdefinierte Validierungsmeldungen für Attribute angeben, indem Sie die
    / Konvention "-Attribut.regel", um die Zeilen zu benennen. Dies macht es schnell zu
    / geben Sie eine bestimmte benutzerdefinierte Sprachzeile für eine bestimmte Attributregel an.
    |
    */

    'benutzerdefiniert' => [
        'attributname' => [
            'rule-name' => 'benutzerdefinierte Nachricht',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    / Benutzerdefinierte Validierungsattribute
    |--------------------------------------------------------------------------
    |
    | Die folgenden Sprachzeilen werden verwendet, um unseren Attributplatzhalter zu tauschen
    / mit etwas Leserfreundlicherem wie "E-Mail-Adresse" stattdessen
    / von "E-Mail". Dies hilft uns einfach, unsere Botschaft ausdrucksvoller zu gestalten.
    |
    */

    'attribute' => [],

];
