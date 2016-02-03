<?php

$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    [
        'id'           => 'books',
        'defaultRoute' => 'book',
        'components'   => [
            'request'      => [
                // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                'cookieValidationKey' => '',
            ],
            'user'         => [
                'identityClass'   => 'app\models\User',
                'enableAutoLogin' => true,
            ],
            'errorHandler' => [
                'errorAction' => 'site/error',
            ],
            'urlManager'   => [
                'enablePrettyUrl'     => true,
                'enableStrictParsing' => true,
                'showScriptName'      => false,
                'rules'               => [
                    ''                                           => 'book/index',
                    '<action:(login|logout)>'                    => 'site/<action>',
                    '<controller:[\w\-]+>s'                      => '<controller>/index',
                    '<controller:[\w\-]+>s/create'               => '<controller>/create',
                    '<controller:[\w\-]+>/<id:\d+>'              => '<controller>/view',
                    '<controller:[\w\-]+>/<id:\d+>/<action:\w+>' => '<controller>/<action>',
                ],
            ],
        ],
    ]
);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return \yii\helpers\ArrayHelper::merge($config, require(__DIR__ . '/web-local.php'));
