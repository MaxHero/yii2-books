<?php

return \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    [
        'id'                  => 'books-console',
        'controllerNamespace' => 'app\commands',
    ],
    require(__DIR__ . '/console-local.php')
);
