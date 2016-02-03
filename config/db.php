<?php

return \yii\helpers\ArrayHelper::merge(
    [
        'class'             => 'yii\db\Connection',
        'dsn'               => 'mysql:host=localhost;dbname=books',
        'username'          => '',
        'password'          => '',
        'charset'           => 'utf8',
        'enableSchemaCache' => true,
    ],
    require(__DIR__ . '/db-local.php')
);
