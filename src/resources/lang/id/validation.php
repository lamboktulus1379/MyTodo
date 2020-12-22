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

    'accepted' => ':Attribute must be accepted.',
    'active_url' => ':Attribute is not a valid URL.',
    'after' => ':Attribute must be a date after :date.',
    'after_or_equal' => ':Attribute must be a date after or equal to :date.',
    'alpha' => ':Attribute may only contain letters.',
    'alpha_dash' => ':Attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => ':Attribute may only contain letters and numbers.',
    'array' => ':Attribute must be an array.',
    'before' => ':Attribute must be a date before :date.',
    'before_or_equal' => ':Attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':Attribute harus di antara :min dan :max.',
        'file' => ':Attribute harus di antara :min dan :max kilobytes.',
        'string' => ':Attribute harus di antara :min dan :max characters.',
        'array' => ':Attribute must have between :min dan :max items.',
    ],
    'boolean' => ':Attribute field must be true or false.',
    'confirmed' => ':Attribute confirmation does not match.',
    'date' => ':Attribute is not a valid date.',
    'date_equals' => ':Attribute must be a date equal to :date.',
    'date_format' => ':Attribute does not match the format :format.',
    'different' => ':Attribute and :other must be different.',
    'digits' => ':Attribute harus :digits angka.',
    'digits_between' => ':Attribute harus di antara :min dan :max angka.',
    'dimensions' => ':Attribute has invalid image dimensions.',
    'distinct' => ':Attribute field has a duplicate value.',
    'email' => ':Attribute must be a valid email address.',
    'ends_with' => ':Attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => ':Attribute must be a file.',
    'filled' => ':Attribute field must have a value.',
    'gt' => [
        'numeric' => ':Attribute must be greater than :value.',
        'file' => ':Attribute must be greater than :value kilobytes.',
        'string' => ':Attribute must be greater than :value characters.',
        'array' => ':Attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':Attribute must be greater than or equal :value.',
        'file' => ':Attribute must be greater than or equal :value kilobytes.',
        'string' => ':Attribute must be greater than or equal :value characters.',
        'array' => ':Attribute must have :value items or more.',
    ],
    'image' => ':Attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => ':Attribute field does not exist in :other.',
    'integer' => ':Attribute must be an integer.',
    'ip' => ':Attribute must be a valid IP address.',
    'ipv4' => ':Attribute must be a valid IPv4 address.',
    'ipv6' => ':Attribute must be a valid IPv6 address.',
    'json' => ':Attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => ':Attribute must be less than :value.',
        'file' => ':Attribute must be less than :value kilobytes.',
        'string' => ':Attribute must be less than :value characters.',
        'array' => ':Attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':Attribute must be less than or equal :value.',
        'file' => ':Attribute must be less than or equal :value kilobytes.',
        'string' => ':Attribute must be less than or equal :value characters.',
        'array' => ':Attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':Attribute may not be greater than :max.',
        'file' => ':Attribute may not be greater than :max kilobytes.',
        'string' => ':Attribute may not be greater than :max characters.',
        'array' => ':Attribute may not have more than :max items.',
    ],
    'mimes' => ':Attribute must be a file of type: :values.',
    'mimetypes' => ':Attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':Attribute minimal :min.',
        'file' => ':Attribute minimal :min kilobytes.',
        'string' => ':Attribute minimal :min karakter.',
        'array' => ':Attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'Format :attribute tidak benar.',
    'numeric' => ':Attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => ':Attribute field must be present.',
    'regex' => 'Format :attribute tidak benar.',
    'required' => ':Attribute harus diisi.',
    'required_if' => ':Attribute field is required when :other is :value.',
    'required_unless' => ':Attribute field is required unless :other is in :values.',
    'required_with' => ':Attribute field is required when :values is present.',
    'required_with_all' => ':Attribute field is required when :values are present.',
    'required_without' => ':Attribute field is required when :values is not present.',
    'required_without_all' => ':Attribute field is required when none of :values are present.',
    'same' => ':Attribute and :other must match.',
    'size' => [
        'numeric' => ':Attribute must be :size.',
        'file' => ':Attribute must be :size kilobytes.',
        'string' => ':Attribute must be :size characters.',
        'array' => ':Attribute must contain :size items.',
    ],
    'starts_with' => ':Attribute must start with one of the following: :values.',
    'string' => ':Attribute must be a string.',
    'timezone' => ':Attribute must be a valid zone.',
    'unique' => ':Attribute has already been taken.',
    'uploaded' => ':Attribute failed to upload.',
    'url' => 'Format :attribute tidak benar.',
    'uuid' => ':Attribute must be a valid UUID.',

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
        'name' => 'nama',
        'amount' => 'jumlah',
        'phone' => 'telepon',
    ],

];
