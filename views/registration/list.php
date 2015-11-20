<?php

/* @var $this yii\web\View */
use app\models\Concert;
use app\models\Couple;
use app\models\Tour;
use yii\helpers\Html;

/* @var $provider \yii\data\ActiveDataProvider */
/* @var $tour Tour */

$this->title = 'Списки регистраций на ' . $tour->getReadableName();
$this->params['breadcrumbs'][] = ['label' => 'Списки регистраций', 'url'=> ['/registration/list']];
$this->params['breadcrumbs'][] = $tour->getReadableName();

?>
<div class="registration-list">

    <h1>Зарегистрированные пары (<?= $tour->getReadableName() ?>)</h1>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Партнер',
                'value' => function ($model) {
                    return $model->bsurname . ' ' . $model->bname . '(' . $model->byear . ')';
                }
            ],
            [
                'label' => 'Партнерша',
                'value' => function ($model) {
                    return $model->gsurname . ' ' . $model->gname . '(' . $model->gyear . ')';
                }
            ]
        ]
    ]) ?>
</div>
