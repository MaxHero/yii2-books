<?php

/**
 * @var $this  yii\web\View
 * @var $model app\models\Book
 */

$this->title = 'Новая книга';
?>
<div class="book-create">
    <?= $this->render('_form', ['model' => $model]); ?>
</div>
