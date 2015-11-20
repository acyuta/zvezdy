<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\components\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Восходящие звезды',
        'brandUrl' => 'http://zvezdy.tomsk.ru',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $items = [
        ['label' => 'Конкурсы', 'url' => ['/site/index']],
        //['label' => 'Регистрация', 'url' => ['/registration/index']],
        ['label' => 'Списки', 'url' => ['/registration/list']],
    ];
    if (Yii::$app->user->isGuest) {
        array_push($items, ['label' => '<span class="glyphicon glyphicon-log-in"/>', 'url' => ['/site/login']]);
    } else {
        $items = array_merge($items, [
            [
                'label' => 'Управление', 'items' => [
                ['label' => 'Концерты', 'url' => ['/concert/index']],
                ['label' => 'Туры', 'url' => ['/tour/index']],
                ['label' => 'Пары', 'url' => ['/couple/index']],
                ['label' => 'Клубы', 'url' => ['/club/index']],

            ]
            ],
            [
                'label' => '<span class="glyphicon glyphicon-log-out"/>',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ]);
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-pills navbar-right'],
        'encodeLabels' => false,
        'items' => $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
