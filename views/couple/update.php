<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Couple */
/* @var $bnames array*/
/* @var $gsurnames array*/
/* @var $gnames array*/
/* @var $bsurnames array*/
/* @var $years array */
/* @var $clubs \app\models\Club[] */
/* @var $tours \app\models\Tour[] */

$this->title = 'Update Couple: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Couples', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="couple-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'bnames' => $bnames,
        'bsurnames' => $bsurnames,
        'gnames' => $gnames,
        'gsurnames' => $gsurnames,
        'years' => $years,
        'clubs' => $clubs,
        'tours' => $tours,
    ]) ?>

</div>
