<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' =>[ 
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                     'class' => 'Swift_SmtpTransport',
                     'host' => env('EMAIL_SMTP_HOST'),  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                     'username' => env('EMAIL_ADDR'),
                     'password' => env('EMAIL_PASS'),
                     'port' => env('EMAIL_PORT'), // Port 25 is a very common port too
                     'encryption' => env('EMAIL_ENC'), // It is often used, check your provider or mail server specs
                     ],
            'useFileTransport' => false,
        ],
    ],
];
