<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                '/main/<city>' => 'site/index-city',
                '/gifts/<city>/<fcats>' => 'site/category',
                'howto' => 'site/how-does-it-work',
                'activate' => 'site/activate',
                'contacts' => 'site/about',
                'checkout' => 'checkout',
            ],
        ],
        'telegram' => [
        'class' =>'SonkoDmitry\Yii\TelegramBot\Component', 'aki\telegram\Telegram',
        'apiToken' => '715590464:AAFQUnRjMY7aM-W0YNMcDDxQt_IrJ5zlmkI',
        ],

    ],
    'params' => $params,
];
