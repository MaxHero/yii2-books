<?php

/**
 * @var $this  yii\web\View
 * @var $model app\models\Book
 */

use yii\widgets\DetailView;

$this->title = 'Книга "' . $model->name . '"';
?>
<div class="book-view">
    <?php
    echo DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'name',
                'author',
                'date',
                'date_create',
                'date_update',
                [
                    'attribute' => 'preview',
                    'format'    => 'image',
                    'value'     => Yii::$app->preview->getUrl($model->preview),
                ],
            ],
        ]
    );
    ?>
</div>
