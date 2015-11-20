<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */
/* @var $form yii\widgets\ActiveForm */
/* @var $concerts \app\models\Concert[] */
?>

<div class="tour-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'age_group')->textInput() ?>

    <?= $form->field($model, 'concert_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($concerts,'id', 'name', 'city')
    ) ?>

    <?= $form->field($model, 'dances')->textInput() ?>

    <?= $form->field($model, 'is_solo')->radioList([0=>'Нет', 1 => 'Да']) ?>

    <?= $form->field($model, 'program_position')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'from_year')->textInput() ?>

    <?= $form->field($model, 'to_year')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
