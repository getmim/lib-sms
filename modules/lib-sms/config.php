<?php

return [
    '__name' => 'lib-sms',
    '__version' => '0.1.0',
    '__git' => 'git@github.com:getmim/lib-sms.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-sms' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [],
        'optional' => [
            [
                'lib-sms-zenziva' => NULL,
                'lib-sms-twilio' => NULL
            ]
        ]
    ],
    'autoload' => [
        'classes' => [
            'LibSms\\Iface' => [
                'type' => 'file',
                'base' => 'modules/lib-sms/interface'
            ],
            'LibSms\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-sms/library'
            ]
        ],
        'files' => []
    ],
    'libSms' => [
        'senders' => []
    ]
];
