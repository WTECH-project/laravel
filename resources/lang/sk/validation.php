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

    'accepted' => ':attribute musí byť akceptovaný.',
    'accepted_if' => ':attribute musí byť akceptovaný, ak :other je :value.',
    'active_url' => ':attribute nie je validná URL.',
    'after' => ':attribute musí byť dátum po :date.',
    'after_or_equal' => ':attribute musí byť dátum po alebo vrátane :date.',
    'alpha' => ':attribute musí obsahovať iba písmená.',
    'alpha_dash' => ':attribute musí obsahovať iba písmená, čísla, pomlčky a podčiarkovníky.',
    'alpha_num' => ':attribute musí obsahovať iba písmená a čísla.',
    'array' => ':attribute musí byť zoznam.',
    'before' => ':attribute musí byť dátum pred :date.',
    'before_or_equal' => ':attribute musí byť dátum pred alebo vrátane :date.',
    'between' => [
        'numeric' => ':attribute musí byť v rozsahu :min až :max.',
        'file' => ':attribute musí byť v rozsahu :min až :max kilobajtov.',
        'string' => ':attribute musí byť v rozsahu :min až :max znakov.',
        'array' => ':attribute musí byť v rozsahu :min až :max prvkov.',
    ],
    'boolean' => ':attribute pole musí byť pravdivé alebo nepravdivé.',
    'confirmed' => ':attribute potvrdenie sa nezhoduje.',
    'current_password' => 'Heslo je nesprávne.',
    'date' => ':attribute nie je platný dátum.',
    'date_equals' => ':attribute musí byť dátum rovný dátumu :date.',
    'date_format' => ':attribute nezodpovedá formátu :format.',
    'different' => ':attribute a :other musia byť rozdielne.',
    'digits' => ':attribute musí mať :digits číslic.',
    'digits_between' => ':attribute musí mať :min až :max číslic.',
    'dimensions' => ':attribute má neplatné rozmery obrázka.',
    'distinct' => ':attribute pole má duplicitnú hodnotu.',
    'email' => ':attribute musí byť platná emailová adresa.',
    'ends_with' => ':attribute musí končiť jedným z nasledujúcich hodnôt: :values.',
    'exists' => 'Vybraný atribút :attribute je neplatný.',
    'file' => ':attribute musí byť súbor.',
    'filled' => ':attribute musí byť vyplnený.',
    'gt' => [
        'numeric' => ':attribute musí byť väčší ako :value.',
        'file' => ':attribute musí mať viac ako :value kilobajtov.',
        'string' => ':attribute musí obsahovať viac ako :value znakov.',
        'array' => ':attribute musí mať viac ako :value prvkov.',
    ],
    'gte' => [
        'numeric' => ':attribute musí byť väčší alebo rovný ako :value.',
        'file' => ':attribute musí byť väčší alebo rovný ako :value kilobajtov.',
        'string' => ':attribute musí byť dlhší alebo rovný ako :value znakov.',
        'array' => ':attribute musí obsahovať :value prvkov alebo viac.',
    ],
    'image' => ':attribute musí byť obrázok.',
    'in' => 'Vybraný atribút :attribute je neplatný.',
    'in_array' => ':attribute pole neexistuje v :other.',
    'integer' => ':attribute musí byť číslo.',
    'ip' => ':attribute musí byť platná IP adresa.',
    'ipv4' => ':attribute musí byť platná IPv4 adresa.',
    'ipv6' => ':attribute musí byť platná IPv6 adresa.',
    'json' => ':attribute musí byť platný JSON.',
    'lt' => [
        'numeric' => ':attribute musí byť menší ako :value.',
        'file' => ':attribute musí byť menší ako :value kilobajtov.',
        'string' => ':attribute musí obsahovať menej ako :value znakov.',
        'array' => ':attribute musí obsahovať menej ako :value prvkov.',
    ],
    'lte' => [
        'numeric' => ':attribute musí byť menší alebo rovný :value.',
        'file' => ':attribute musí byť menší alebo rovný ako :value kilobajtov.',
        'string' => ':attribute musí byť kratší alebo rovný ako :value znakov.',
        'array' => ':attribute nesmie mať viac ako :value prvkov.',
    ],
    'max' => [
        'numeric' => ':attribute nesmie byť väčši ako :max.',
        'file' => ':attribute nesmie mať viac ako :max kilobajtov.',
        'string' => ':attribute nesmie mať viac ako :max znakov.',
        'array' => ':attribute nesmie mať viac ako :max prvkov.',
    ],
    'mimes' => ':attribute musí byť súbor typu: :values.',
    'mimetypes' => ':attribute musí byť súbor typu: :values.',
    'min' => [
        'numeric' => ':attribute musí byť najmenej :min.',
        'file' => ':attribute musí mať najmenej :min kilobajtov.',
        'string' => ':attribute musí obsahovať najmenej :min znakov.',
        'array' => ':attribute musí obsahovať najmenej :min prvkov.',
    ],
    'multiple_of' => ':attribute musí byť násobkom čísla :value.',
    'not_in' => 'Vybraný atribút :attribute je neplatný.',
    'not_regex' => ':attribute formát je neplatný.',
    'numeric' => ':attribute musí byť číslo.',
    'password' => 'Heslo je nesprávne.',
    'present' => ':attribute pole musí byť prítomné.',
    'regex' => ':attribute formát je neplatný.',
    'required' => ':attribute je vyžadované.',
    'required_if' => ':attribute pole je vyžadované, ak :other je :value.',
    'required_unless' => ':attribute field is required unless :other is in :values.',
    'required_with' => ':attribute pole je vyžadované, ak :values sú prítomné.',
    'required_with_all' => ':attribute pole je vyžadované, ak :values sú prítomné.',
    'required_without' => ':attribute pole je vyžadované, ak :values nie sú prítomné.',
    'required_without_all' => ':attribute pole je vyžadované, ak žiadna z hodnôt :values nie je prítomná.',
    'prohibited' => ':attribute pole je zakázané.',
    'prohibited_if' => ':attribute je zakázané, ak :other je :value.',
    'prohibited_unless' => ':attribute pole je zakázané, pokiaľ :other je v :values.',
    'prohibits' => ':attribute pole zakazuje prítomnosť :other.',
    'same' => ':attribute a :other sa musia zhodovať.',
    'size' => [
        'numeric' => ':attribute musí mať veľkosť :size.',
        'file' => ':attribute musí mať veľkosť :size kilobajtov.',
        'string' => ':attribute musí mať veľkosť :size znakov.',
        'array' => ':attribute musí obsahovať :size prvkov.',
    ],
    'starts_with' => ':attribute musí začínať jednou z nasledujúcich hodnôt: :values.',
    'string' => ':attribute musí byť reťazec znakov.',
    'timezone' => ':attribute musí byť platná časová zóna.',
    'unique' => ':attribute už bol použitý.',
    'uploaded' => 'Zlyhalo nahranie :attribute.',
    'url' => ':attribute musí byť platná URL.',
    'uuid' => ':attribute musí byť platný UUID.',

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

    'attributes' => [],

];
