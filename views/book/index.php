<?php

/**
 * @var $this         yii\web\View
 * @var $searchModel  app\models\forms\BookSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

use app\models\Book;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Книги';
?>
<?php
$modal = Modal::begin([
        'header' => '123',
    ]
);
?>
<p>123</p>
<?php Modal::end(); ?>

<div class="book-index">
    <div class="row">
        <div class=".col-md-12">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Новая книга', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class=".col-md-12">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        'id',
                        'name',
                        [
                            'attribute' => 'preview',
                            'content'   => function (Book $model, $key, $index, $column){
                                return Html::img(Yii::$app->preview->getUrl($model->preview), ['width' => 100]);
                            },
                        ],
                        'author',
                        'date:date',
                        [
                            'attribute'      => 'date_create',
                            'format'         => 'relativeTime',
                            'contentOptions' => function (Book $model, $key, $index, $column){
                                return ['title' => Yii::$app->getFormatter()->asDatetime($model->date_create)];
                            },
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                        ],
                    ],
                ]
            );
            ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>


