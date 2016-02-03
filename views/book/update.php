<?php

/**
 * @var $this  yii\web\View
 * @var $model app\models\Book
 */

$this->title = 'Редактрование книги';
?>
<div class="book-update">
    <?= $this->render('_form', ['model' => $model]); ?>
</div>
