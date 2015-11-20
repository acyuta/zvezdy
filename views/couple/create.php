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


$this->title = 'Create Couple';
$this->params['breadcrumbs'][] = ['label' => 'Couples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="couple-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'bnames' => $bnames,
        'bsurnames' => $bsurnames,
        'gnames' => $gnames,
        'gsurnames' => $gsurnames,
        'years' => $years,
        'clubs' => $clubs,
    ]) ?>

</div>
