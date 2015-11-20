<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tours';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tour', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'age_group:ntext',
            'concert_id',
            'dances:ntext',
            // 'is_solo',
            // 'program_position',
            // 'time:ntext',
            // 'from_year',
            // 'to_year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
