<?php

return \yii\helpers\ArrayHelper::merge(
    [
        'basePath'   => dirname(__DIR__),
        'bootstrap'  => ['log'],
        'language'   => 'ru',
        'components' => [
            'cache'   => [
                'class' => 'yii\caching\DummyCache',
            ],
            'log'     => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets'    => [
                    [
                        'class'  => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'db'      => require(__DIR__ . '/db.php'),
            'preview' => 'app\components\PreviewService',
        ],
    ],
    require(__DIR__ . '/main-local.php')
);
