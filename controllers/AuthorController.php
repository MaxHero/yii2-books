<?php

namespace app\controllers;

use app\models\Author;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use Yii;

class AuthorController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @param string $q
     * @return array
     */
    public function actionIndex($q = null)
    {
        Yii::$app->getResponse()->format = Response::FORMAT_JSON;

        $model = Author::find()->limit(10);
        if (!is_null($q)) {
            $model->where([
                    'or',
                    ['like', 'firstname', $q],
                    ['like', 'lastname', $q],
                ]
            );
        }

        return ['results' => $model->all()];
    }
}
