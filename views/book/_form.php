<?php

/**
 * @var $this  yii\web\View
 * @var $model app\models\Book
 * @var $form  yii\widgets\ActiveForm
 */

use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="book-form">
    <?= Html::errorSummary($model); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>

    <?php
    echo $form->field($model, 'author_id')->widget(Select2::classname(), [
            'pluginOptions' => [
                'ajax' => ['url' => Url::to(['/author/index'])],
            ],
            'initValueText' => $model->author,
        ]
    );
    ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
            'type'          => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
            ],
        ]
    ); ?>

    <?= $form->field($model, 'image')->fileInput(); ?>

    <?php if ($model->preview): ?>
        <div class="form-group">
            <?= Html::img(Yii::$app->preview->getUrl($model->preview)); ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->getIsNewRecord() ? 'Добавить' : 'Сохранить', ['class' => $model->getIsNewRecord() ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
