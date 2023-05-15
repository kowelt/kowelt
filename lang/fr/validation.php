<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute doit être acceptée',
    'accepted_if'=> ':attribute doit être accepté lorsque :other est :value',
    'active_url' => ":attribute n'est pas une URL valide",
    'after' => ':attribute doit être une date postérieure à :date',
    'after_or_equal' => ':attribute doit être une date postérieure ou égale à :date',
    'alpha' => ':attribute ne doit contenir que des lettres',
    'alpha_dash' => ':attribute ne doit contenir que des lettres, des chiffres, des tirets et des caractères de soulignement',
    'alpha_num' => ':attribute ne doit contenir que des lettres et des chiffres',
    'array' => ':attribute doit être un tableau',
    'before' => ':attribute doit être une date antérieure à :date',
    'before_or_equal' => ':attribute doit être une date antérieure ou égale à :date',
    'between' => [
        'array' => ':attribute doit avoir entre :min et :max éléments',
        'file' => ':attribute doit se situer entre :min et :max kilo-octets',
        'numeric' => ':attribute doit être comprise entre :min et :max',
        'string' => ':attribute doit être comprise entre les caractères :min et :max',
    ],
    'boolean' => ':attribute doit être vrai ou faux',
    'confirmed' => ':attribute de confirmation ne correspond pas',
    'current_password' => ':attribute le mot de passe est incorrect',
    'date' => ":attribute n'est pas une date valide",
    'date_equals' => ':attribute doit être une date égale à :date.',
    'date_format' => ':attribute  ne correspond pas au format :format.',
    'declined' => ':attribute doit être refusé.',
    'declined_if' => ':attribute doit être refusé lorsque :other est :value.',
    'different' => ':attribute et :other doivent être différent',
    'digits' => ':attribute doit être :digits digits',
    'digits_between' => ':attribute doit être compris entre :min et :max chiffres',
    'dimensions' => ":attribute a des dimensions d'image invalides",
    'distinct' => ':attribute a une valeur en double',
    'doesnt_end_with' => ":attribute ne doit pas se terminer par l'un des éléments suivants : :values",
    'doesnt_start_with' => ":attribute ne peut pas commencer par l'un des éléments suivants : :values",
    'email' => ':attribute doit être une adresse électronique valide',
    'ends_with' => ":attribute doit se terminer par l'un des éléments suivants : :values",
    'enum' => ":attribute n'est pas valide",
    'exists' => ":attribute n'est pas valide",
    'file' => ':attribute doit être un fichier',
    'filled' => ':attribute doit avoir une valeur',
    'gt' => [
        'array' => ':attribute doit avoir :value éléments ou plus.',
        'file' => ':attribute doit être supérieure à :value kilooctets',
        'numeric' => ':attribute doit être supérieure à :value',
        'string' => ':attribute doit être supérieure à :value characters',

    ],
    'gte' => [
        'array' => ':attribute doit avoir :value items ou plus.',
        'file' => ":attribute doit être supérieure ou égale à :value kilobytes.",
        'numeric' => ':attribute doit être supérieure ou égale à :value.',
        'string' => ':attribute doit être supérieure ou égale à:value characters.',
    ],
    'image' => ':attribute The doit être une image.',
    'in' => ":attribute n'est pas valide.",
    'in_array' => ":attribute le champ n'existe pas dans :other.",
    'integer' => ':attribute doit être un nombre entier.',
    'ip' => ':attribute être une adresse IP valide',
    'ipv4' => ':attribute doit être une adresse IPv4 valide.',
    'ipv6' => ':attribute doit être une adresse IPv6 valide',
    'json' => ':attribute doit être une chaîne JSON valide.',
    'lt' => [
        'array' => ':attribute doit avoir moins de :value articles',
        'file' => ':attribute doit être inférieure à :value kilooctets.',
        'numeric' => ':attribute doit être inférieure à :value',
        'string' => ':attribute doit être inférieur à :value caractères.',
    ],
    'lte' => [
        'array' => ':attribute ne doit pas comporter plus de :value caractères.',
        'file' => ':attribute doit être inférieure ou égale à :value kilooctets.',
        'numeric' => ':attribute doit être inférieur ou égal à :value.',
        'string' => ':attribute doit être inférieur ou égal à :value caractères.',
    ],
    'mac_address' => ':attribute doit être une adresse MAC valide',
    'max' => [
        'array' => ':attribute ne doit pas comporter plus de :max éléments.',
        'file' => ':attribute ne doit pas être supérieure à :max kilooctets.',
        'numeric' => ':attribute ne doit pas être supérieure à :max.',
        'string' => ':attribute ne doit pas être supérieur à :max caractères.',
    ],
    'max_digits' => ':attribute ne doit pas comporter plus de :max chiffres.',
    'mimes' => ':attribute doit être un fichier de type: :values.',
    'mimetypes' => ':attribute doit être un fichier de type: :values.',
    'min' => [
        'array' => ':attribute doit être un fichier de type :min éléments.',
        'file' => ":attribute doit être d'au moins  :min kilooctets.",
        'numeric' => ":attribute doit être d'au moins:min.",
        'string' => ':attribute doit comporter au moins :min characters.',
    ],
    'min_digits' => ':attribute doit avoir au moins :min digits.',
    'multiple_of' => ':attribute doit être un multiple de  :value.',
    'not_in' => "selected :attribute n'est pas valide.",
    'not_regex' => ":attribute le format n'est pas valide.",
    'numeric' => ':attribute doit être un nombre.',
    'password' => [
        'letters' => ':attribute doit contenir au moins une lettre.',
        'mixed' => ':attribute doit contenir au moins une lettre majuscule et une lettre minuscule.',
        'numbers' => ':attribute doit contenir au moins un chiffre.',
        'symbols' => ':attribute doit contenir au moins un symbole.',
        'uncompromised' => ':attribute donné est apparu dans une fuite de données. Veuillez choisir un autre :attribute.',
    ],
    'present' => ':attribute doit être présent.',
    'prohibited' => ':attribute est interdite.',
    'prohibited_if' => ':attribute est interdit lorsque :other est :value.',
    'prohibited_unless' => ':attribute champ est interdit sauf si :other est dans :values.',
    'prohibits' => ":attribute champ interdit à :other d'être présent.",
    'regex' => 'Le format de :attribute est invalide.',
    'required' => ':attribute est requis.',
    'required_array_keys' => ':attribute champs doit contenir des entrées pour: :values.',
    'required_if' => 'Le champ :attribute champ obligatoire lorsque :other est :value.',
    'required_if_accepted' => 'Le champ :attribute est requis lorsque :other est accepté.',
    'required_unless' => 'Le champ :attribute est obligatoire, sauf si :other est dans :values.',
    'required_with' => 'Le champ :attribute est obligatoire lorsque :values est present.',
    'required_with_all' => 'Le champ :attribute est obligatoire lorsque :values sont présentes.',
    'required_without' => ":attribute champ obligatoire lorsque :values n'est pas présent.",
    'required_without_all' => 'Le champ :attribute est obligatoire si aucune des valeurs :values sont présentes.',
    'same' => ':attribute and :other must match.',
    'size' => [
        'array' => ':attribute doit contenir :size éléments.',
        'file' => ':attribute doit être  :size kilooctets.',
        'numeric' => ':attribute doit être :size.',
        'string' => ':attribute doit comporter :size caractères.',
    ],
    'starts_with' => ":attribute doit commencer par l'un des éléments suivants: :values.",
    'string' => ':attribute doit être une chaîne de caractères.',
    'timezone' => ':attribute doit être un fuseau horaire valide.',
    'unique' => ':attribute a déjà été enregistré.',
    'uploaded' => ':attribute a échoué à télécharger.',
    'url' => ':attribute doit être une URL valide.',
    'uuid' => ':attribute doit être un UUID valide.',


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
        "firstname" => "Le prénom",
        "lastname" => "Le nom",
        "gender" => "le genre",
        "date_of_birth" => "La date de naissance",
        "email" => "email",
        "password" => "Le mot de passe",
        "old_password" => "L'ancien de mot passe",
        "name" => "Le nom",
        "subject" => "Le sujet",
        "message" => "Le message",
        "tel" => "Le téléphone",
        "company_name" => "Le nom de l'entreprise",
        "interested_in" => "intéressé par",
        "professional_field" => "Le domaine professionnel",
        "professional_experience" => "L'expérience professionnelle",
        "need_assistance" => "Le besoin d'assistance",
        "employees_number" => "Le nombre d'employés",
        "confirm_correctness" => "confirmer l'exactitude",
        "street_and_number" => "street and number",
        "postal_code" => "La rue et le numéro",
        "city" => "La ville",
        "country" => "Le pays",
        "place_of_birth" => "Le lieu de naissance",
        "nationality" => "La nationalité",
        "martial_status" => "Le statut matrimonial",
        "driving_licence" => "Le permis de conduire",
        "driving_licence_category" => "La catégorie de permis de conduire",
        "linkedin" => "linkedin",
        "education_items_ids" => "Les éléments d'éducation",
        "work_items_ids" => "Les éléments de travail",
        "skill_items_ids" => "Les éléments de compétence",
        "language_items_ids" => "Les éléments linguistiques",
        "hobby_items_ids" => "Les les éléments de loisirs",
        "other_description" => "autre description",
        "document_name" => "Le nom du document",
        "files" => "Les fichiers",
        "recaptcha_token" => "recaptcha token",
        "session" => "La session",
        "ugg_city" => "La ville choisie pour l'examen",
        "exam_language" => "La langue de l'examen",
        "identity_number" => "Le numéro d'identité",
        "leaving_city" => "La ville de résidence",
        "last_degree" => "Le dernier diplôme",
        "last_degree_other" => "Le dernier diplôme autre",
        "last_degree_school" => "L'école du dernier diplôme",
        "last_degree_serie" => "série du dernier diplôme",
        "last_degree_study" => "Les études du dernièr diplôme",
        "last_degree_study_other" => "Les études du dernièr diplôme",
        "currently_student" => "actuellement étudiant",
        "student_school" => "école-étudiant",
        "student_cycle" => "Le cycle de l'étudiant",
        "student_cycle_other" => "Le cycle de l'étudiant autre",
        "student_field" => "Le domaine d'études",
        "student_field_other" => "Le domaine d'études autre",
        "currently_apprentice" => "actuellement apprenti",
        "apprentice_field" => "Le domaine d'apprentissage",
        "other_education" => "autre éducation",
        "job_seeker" => "chercheur d'emploi",
        "job_seeker_field" => "champ de recherche d'emploi",
        "other_experience" => "autre expérience",
        "avatar" => "photo",
        "cv_documents" => "les documents du cv",
        "motivation_letter_documents" => "Les documents de lettre de motivation",
        "diploms_documents" => "Les documents du diplômes",
        "other_documents" => "autres documents",
        "confirm_correctness_2" => "conditions générales de vente",
        "confirm_correctness_3" => "déclaration de confidentialité",
    ],

];
