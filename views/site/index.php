<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Регистрация на Восходящие звезды';
?>
<div class="site-index">

    <h1>Доступные концерты</h1>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'emptyText' => 'Увы, регистрации больше нет',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [   'attribute' => 'date',
                'format' => ['date', 'php:d.m.Y'],
            ],
            'name',
            'organizer',
            [
                'format' => 'html',
                'label' => '',
                'value' => function ($model) {
                    return Html::a("Перейти к регистрации", ['/registration/index', 'id' => $model->id]);
                }
            ]
        ],
    ]) ?>
</div>
