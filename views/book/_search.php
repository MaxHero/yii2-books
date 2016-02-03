<?php

/**
 * @var $this  yii\web\View
 * @var $model app\models\forms\BookSearch
 * @var $form  yii\widgets\ActiveForm
 */

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="book-search">
    <?php
    $form = ActiveForm::begin([
            'action'      => ['index'],
            'method'      => 'get',
            'fieldConfig' => [
                'showLabels' => false,
            ],
        ]
    );
    ?>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'author_id')->widget(Select2::classname(), [
                    'options'       => ['placeholder' => $model->getAttributeLabel('author_id')],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'ajax'       => ['url' => Url::to(['/author/index'])],
                        'width'      => '100%',
                    ],
                    'initValueText' => $model->author,
                ]
            );
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'name', [
                    'autoPlaceholder' => false,
                    'inputOptions'    => ['placeholder' => 'Название книги'],
                ]
            );
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'from', ['showLabels' => true])->widget(DatePicker::classname(), [
                    'type'       => DatePicker::TYPE_RANGE,
                    'separator'  => ' до ',
                    'attribute2' => 'to',
                ]
            );
            ?>
        </div>

        <div class="col-md-offset-4 col-md-4">
            <div class=" form-group pull-right">
                <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']); ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
