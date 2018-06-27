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

    'accepted'             => 'Must be accepted',
    'active_url'           => 'Must be a valid URL',
    'after'                => 'Must be after :date',
    'after_or_equal'       => 'Must be after or equal to :date',
    'alpha'                => 'Must only contain letters',
    'alpha_dash'           => 'Must only contain letters, numbers, and dashes',
    'alpha_num'            => 'Must only contain letters and numbers',
    'array'                => 'Must be an array',
    'before'               => 'Must be before :date',
    'before_or_equal'      => 'Must be before or equal to :date',
    'between'              => [
        'numeric' => 'Must be between :min and :max',
        'file'    => 'Must be between :min and :max kB',
        'string'  => 'Must be between :min and :max characters',
        'array'   => 'Must have between :min and :max items',
    ],
    'boolean'              => 'Must be true or false',
    'confirmed'            => 'Confirmation doesn\'t match',
    'date'                 => 'Not a valid date',
    'date_format'          => 'Doesn\'t match the format :format',
    'different'            => ':Attribute and :other must be different',
    'digits'               => 'Must be :digits digits',
    'digits_between'       => 'Must be between :min and :max digits',
    'dimensions'           => 'Invalid image dimensions',
    'distinct'             => 'Duplicate value found',
    'email'                => 'Must be a valid email',
    'exists'               => 'Selected :attribute doesn\'t exist',
    'file'                 => 'Must be a file',
    'filled'               => 'Must have a value',
    'image'                => 'Must be an image',
    'in'                   => 'Selected :attribute is invalid',
    'in_array'             => ':Attribute does not exist in :other',
    'integer'              => 'Must be an integer',
    'ip'                   => 'Must be a valid IP address',
    'ipv4'                 => 'Must be a valid IPv4 address',
    'ipv6'                 => 'Must be a valid IPv6 address',
    'json'                 => 'Must be a valid JSON string',
    'max'                  => [
        'numeric' => 'Must not be greater than :max',
        'file'    => 'Must not be greater than :max kB',
        'string'  => 'Must not be greater than :max characters',
        'array'   => 'Must not have more than :max items',
    ],
    'mimes'                => 'Must be of type: :values',
    'mimetypes'            => 'Must be of type: :values',
    'min'                  => [
        'numeric' => 'Must be at least :min',
        'file'    => 'Must be at least :min kB',
        'string'  => 'Must be at least :min characters',
        'array'   => 'Must have at least :min items',
    ],
    'not_in'               => 'Selected :attribute is invalid',
    'not_regex'            => 'Format is invalid',
    'numeric'              => 'Must be a number',
    'present'              => 'Must be present',
    'regex'                => 'Format is invalid',
    'required'             => 'Required',
    'required_if'          => 'Required when :other is :value',
    'required_unless'      => 'Required unless :other is in :values',
    'required_with'        => 'Required when :values is present',
    'required_with_all'    => 'Required when :values is present',
    'required_without'     => 'Required when :values is not present',
    'required_without_all' => 'Required when none of :values are present',
    'same'                 => ':Attribute and :other must match',
    'size'                 => [
        'numeric' => 'Must be :size',
        'file'    => 'Must be :size kB',
        'string'  => 'Must be :size characters',
        'array'   => 'Must contain :size items',
    ],
    'string'               => 'Must be a string',
    'timezone'             => 'Must be a valid zone',
    'unique'               => 'Already taken',
    'uploaded'             => 'Failed to upload',
    'url'                  => 'Format is invalid',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
