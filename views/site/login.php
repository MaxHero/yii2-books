<?php
/**
 * @var $this  yii\web\View
 * @var $model app\models\forms\Login
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Вход';
?>
<div class="site-login">
    <?php
    /**
     * @var $form yii\bootstrap\ActiveForm
     */
    $form = ActiveForm::begin([
            'id'          => 'login-form',
            'options'     => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]
    );
    ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]); ?>
    <?= $form->field($model, 'password')->passwordInput(); ?>
    <?php
    echo $form->field($model, 'rememberMe')
              ->checkbox([
                      'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                  ]
              );
    ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        Для входа используйте <strong>admin/admin</strong> или <strong>demo/demo</strong> в качестве логина/пароля.
    </div>
</div>
