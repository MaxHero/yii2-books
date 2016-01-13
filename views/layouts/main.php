<?php
/**
 * @var $this    yii\web\View
 * @var $content string
 */

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<div class="wrap">
    <?php
    NavBar::begin(['options' => ['class' => 'navbar-inverse navbar-fixed-top']]);
    echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items'   => [
                [
                    'label'   => 'Книги',
                    'url'     => ['/book/index'],
                    'visible' => !Yii::$app->getUser()->getIsGuest(),
                ],
                Yii::$app->user->isGuest
                    ? (['label' => 'Вход', 'url' => ['/site/login']])
                    : ('<li>' . Html::beginForm(['/site/logout'], 'post')
                       . Html::submitButton('Выйти (' . Yii::$app->getUser()->getIdentity()->username . ')', ['class' => 'btn btn-link'])
                       . Html::endForm()
                       . '</li>')
            ],
        ]
    );
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]); ?>
        <?= $content; ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; MaxHero <?= date('Y'); ?></p>

        <p class="pull-right"><?= Yii::powered(); ?></p>
    </div>
</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
