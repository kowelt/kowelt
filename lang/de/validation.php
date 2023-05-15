<?php

return [

    /*
    |NB : ne pas traduire ce qui se trouve a gauche des fleches (=>) ne traduisez que ce qui se trouve a droite.
    | Et ne pas traduire aussi (:attribute)
    */

    'accepted' => ':attribute muss akzeptiert werden.',
    'accepted_if' => ':attribute muss akzeptiert werden, wenn :other gleich :value ist.',
    'active_url' => ':attribute ist keine gültige URL.',
    'after' => ':attribute muss ein Datum nach :date sein.',
    'after_or_equal' => ' :attribute muss ein Datum nach oder gleich dem :date sein.',
    'alpha' => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => ' :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => ':attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => ':attribute muss ein Array sein.',
    'before' => ':attribute muss ein Datum vor :date sein.',
    'before_or_equal' => ':attribute muss ein Datum vor oder gleich :date sein.',
    'between' => [
        'array' => ':attribute muss zwischen :min und :max Elemente enthalten.',
        'file' => ':attribute muss zwischen :min und :max Kilobytes liegen.',
        'numeric' => ':attribute muss zwischen :min und :max liegen.',
        'string' => ':attribute muss zwischen den Zeichen :min und :max liegen.',
    ],
    'boolean' => ':attribute muss entweder Richtig oder Falsch sein.',
    'confirmed' => ':attribute Die Bestätigung stimmt nicht überein.',
    'current_password' => 'Das Passwort ist falsch.',
    'date' => ':attributeist kein gültiges Datum.',
    'date_equals' => ':attribute muss ein Datum sein, das :date entspricht.',
    'date_format' => ':attribute stimmt nicht mit dem Format :format überein.',
    'declined' => ':attribute muss abgelehnt werden.',
    'declined_if' => ':attribute muss abgelehnt werden, wenn :other gleich :value ist.',
    'different' => ':attribute und :other müssen unterschiedlich sein.',
    'digits' => ':attribute muss :digits Ziffern sein.',
    'digits_between' => ':attribute muss zwischen den Ziffern :min und :max liegen.',
    'dimensions' => ':attribute hat ungültige Bildabmessungen.',
    'distinct' => ':attribute Feld hat einen doppelten Wert.',
    'doesnt_end_with' => ':attribute darf nicht mit einer der folgenden Angaben enden: :values.',
    'doesnt_start_with' => ':attribute darf nicht mit einer der folgenden Angaben beginnen: :values.',
    'email' => ':attribute muss eine gültige E-Mail Adresse sein.',
    'ends_with' => ':attribute muss mit einer der folgenden Angaben enden: :values.',
    'enum' => 'selected :attribute ist ungültig.',
    'exists' => 'Das ausgewählte :attribute ist ungültig.',
    'file' => ':attribute muss eine Datei sein.',
    'filled' => ':attribute Feld muss einen Wert haben.',
    'gt' => [
        'array' => ':attribute muss mehr als :value haben.',
        'file' => ':attribute muss größer sein als :value kilobytes.',
        'numeric' => ':attribute muss größer sein als :value.',
        'string' => ':attribute muss größer sein als :value Zeichen.',
    ],
    'gte' => [
        'array' => ':attribute muss :value Elemente oder mehr haben.',
        'file' => ':attribute muss größer oder gleich :value kilobytes sein.',
        'numeric' => ':attribute muss größer als oder gleich :value sein.',
        'string' => ':attribute muss größer oder gleich den Zeichen :value sein.',
    ],
    'image' => ':attribute muss ein Bild sein.',
    'in' => ':attribute ist ungültig.',
    'in_array' => ':attribute Feld ist in :other nicht vorhanden.',
    'integer' =>  ':attribute muss eine ganze Zahl sein.',
    'ip' => ':attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => ':attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => ':attribute muss eine gültige IPv6-Adresse sein.',
    'json' => ':attribute muss eine gültige JSON-Zeichenkette sein.',
    'lt' => [
        'array' => ':attribute muss weniger als :value Elemente haben.',
        'file' => ':attribute muss kleiner sein als :value kilobytes.',
        'numeric' => ':attribute muss kleiner sein als :value.',
        'string' => ':attribute muss kleiner sein als :value Zeichen.',
    ],
    'lte' => [
        'array' => ':attributedarf nicht mehr als :value Elemente haben.',
        'file' => ':attribute muss kleiner oder gleich :value kilobytes sein.',
        'numeric' => ':attribute muss kleiner als oder gleich :value sein.',
        'string' => ':attribute muss kleiner oder gleich den Zeichen :value sein.',
    ],
    'mac_address' => ':attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'array' => ' :attribute darf nicht mehr als :max Elemente haben.',
        'file' => ' :attribute darf nicht größer sein als :max kilobytes.',
        'numeric' => ':attribute darf nicht größer sein als :max.',
        'string' => ' :attribute darf nicht größer sein als :max Zeichen.',
    ],
    'max_digits' => ':attribute darf nicht mehr als :max Ziffern haben.',
    'mimes' => ' :attribute muss eine Datei vom type: :values sein.',
    'mimetypes' => ':attribute muss eine Datei vom type: :values sein.',
    'min' => [
        'array' => ' :attribute muss mindestens :min Elemente haben.',
        'file' => ' :attribute muss mindestens :min kilobytes betragen.',
        'numeric' => ' :attribute muss mindestens :min sein.',
        'string' => ' :attribute muss mindestens :min Zeichen sein.',
    ],
    'min_digits' => ' :attribute muss mindestens :min Ziffern haben.',
    'multiple_of' => ' :attribute muss ein Vielfaches von :value sein.',
    'not_in' => ' :attribute ist ungültig.',
    'not_regex' => ' :attribute Format ist ungültig.',
    'numeric' => ':attribute muss eine Zahl sein.',
    'password' => [
        'letters' => ':attribute muss mindestens einen Buchstaben enthalten.',
        'mixed' => ' :attribute muss mindestens einen Großbuchstaben und einen Kleinbuchstaben enthalten.',
        'numbers' => ' :attribute muss mindestens eine Zahl enthalten.',
        'symbols' => ' :attribute muss mindestens ein Symbol enthalten.',
        'uncompromised' => 'Das angegebene :attribute ist in einem Datenleck aufgetaucht. Bitte wählen Sie ein anderes :attribute.',
    ],
    'present' => ' :attribute Feld muss vorhanden sein.',
    'prohibited' => ' :attribute Feld ist verboten.',
    'prohibited_if' => ' :attribute Feld ist verboten, wenn :other gleich :value ist.',
    'prohibited_unless' => ' :attribute Feld ist verboten, es sei denn, :other ist in :values enthalten.',
    'prohibits' => ':attribute Feld verbietet die Anwesenheit von :other.',
    'regex' => ' :attribute Format ist ungültig.',
    'required' => ' :attribute ist ein Pflichtfeld.',
    'required_array_keys' => ' :attribute  Feld muss Einträge für for: :values enthalten.',
    'required_if' => ' :attribute Feld ist erforderlich, wenn :other gleich :value ist.',
    'required_if_accepted' => ' :attribute Feld ist erforderlich, wenn :other akzeptiert wird.',
    'required_unless' => ' :attribute Das Feld ist erforderlich, es sei denn, :other steht in :values.',
    'required_with' => ' :attribute ist erforderlich, wenn das Feld :values vorhanden ist.',
    'required_with_all' => ' :attribute Feld ist erforderlich, wenn :values vorhanden sind.',
    'required_without' => ':attribute Feld ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => ' :attributeist erforderlich, wenn keiner der :values vorhanden sind.',
    'same' => ' :attribute und :other müssen übereinstimmen.',
    'size' => [
        'array' => ':attribute muss :size Elemente enthalten.',
        'file' => ' :attribute muss :size kilobytes sein.',
        'numeric' => ' :attribute muss :size sein.',
        'string' => ':attribute müssen :size Zeichen sein.',
    ],
    'starts_with' => ' :attribute muss mit einer der folgenden Angaben beginnen: :values.',
    'string' => ' :attribute muss ein String sein.',
    'timezone' => ' :attribute muss eine gültige Zeitzone sein.',
    'unique' => ' :attribute ist bereits vergeben.',
    'uploaded' => ' :attribute konnte nicht hochgeladen werden.',
    'url' => ' :attribute muss eine gültige URL sein.',
    'uuid' => ' :attribute muss eine gültige UUID sein.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        "firstname" => "Vorname",
        "lastname" => "Nachname",
        "gender" => "Geschlecht",
        "date_of_birth" => "geburtsdatum",
        "email" => "Email",
        "password" => "Passwort",
        "old_password" => "altes Passwort",
        "name" => "Name",
        "subject" => "Thema",
        "message" => "Nachricht",
        "tel" => "tel",
        "company_name" => "Firmenname",
        "interested_in" => "interessiert an",
        "professional_field" => "Berufsfeld",
        "professional_experience" => "Berufserfahrung",
        "need_assistance" => "Unterstützung benötigen",
        "employees_number" => "Mitarbeiterzahl",
        "confirm_correctness" => "Korrektheit bestätigen",
        "street_and_number" => "Straße und Hausnummer",
        "postal_code" => "Postleitzahl",
        "city" => "Stadt",
        "country" => "Land",
        "place_of_birth" => "Geburtsort",
        "nationality" => "Staatsangehörigkeit",
        "martial_status" => "Familienstand",
        "driving_licence" => "Führerschein",
        "driving_licence_category" => "Führerscheinklasse",
        "linkedin" => "linkedin",
        "education_items_ids" => "Bildungseinrichtungen",
        "work_items_ids" => "Arbeitselemente",
        "skill_items_ids" => "Fertigkeitsposten",
        "language_items_ids" => "Sprachelemente",
        "hobby_items_ids" => "Hobbyartikel",
        "other_description" => "sonstige Beschreibung",
        "document_name" => "Dokumentname",
        "files" => "Dateien",
        "recaptcha_token" => "recaptcha token",
        "session" => "Sitzung",
        "ugg_city" => "KODREAMS Stadt",
        "exam_language" => "Prüfungssprache",
        "identity_number" => "Identifikationsnummer",
        "leaving_city" => "Wohnort",
        "last_degree" => "letzter Abschluss",
        "last_degree_other" => "letzter Abschluss sonstiges",
        "last_degree_school" => "letzter Abschluss Bildungseinrichtung",
        "last_degree_serie" => "letzter Abschluss Fachrichtung",
        "last_degree_study" => "letzter Abschluss Studium",
        "last_degree_study_other" => "letzter Abschluss Studium sonstiges",
        "currently_student" => "derzeit Student",
        "student_school" => "Student Bildungseinrichtung",
        "student_cycle" => "Student Zyklus",
        "student_cycle_other" => "Student Zyklus sonstiges",
        "student_field" => "Student Fachgebiet",
        "student_field_other" => "Student Fachgebiet sonstiges",
        "currently_apprentice" => "derzeit Auszubildende",
        "apprentice_field" => "Ausbildungsbereich",
        "other_education" => "sonstige Bildung",
        "job_seeker" => "Arbeitssuchende",
        "job_seeker_field" => "Arbeitssuchende Bereich",
        "other_experience" => "sonstige Erfahrungen",
        "avatar" => "Bild",
        "cv_documents" => "Lebenslauf",
        "motivation_letter_documents" => "Motivationsschreiben",
        "diploms_documents" => "Zeugnisse",
        "other_documents" => "sonstige Dokumente",
        "confirm_correctness_2" => "Allgemeinen Geschäftsbedingungen",
        "confirm_correctness_3" => "Datenschutzerklärung",
    ],

];
