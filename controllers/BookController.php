<?php

namespace app\controllers;

use app\models\forms\BookSearch;
use yii\filters\AccessControl;
use yii\web\Controller;

class BookController extends Controller
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

    public function actionIndex()
    {
        $model = new BookSearch();

        return $this->render('index', ['model' => $model]);
    }
}
