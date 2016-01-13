<?php
/**
 * @var $this  yii\web\View
 * @var $model app\models\forms\BookSearch
 */
echo \yii\grid\GridView::widget([
        'dataProvider' => $model->search(),
        'columns'      => [
            'id',
            'name',
            'preview',
            'author_id',
            'date',
            'date_create',
            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]
);