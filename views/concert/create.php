<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Concert */

$this->title = 'Create Concert';
$this->params['breadcrumbs'][] = ['label' => 'Concerts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
