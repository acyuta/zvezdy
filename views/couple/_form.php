<?php

use app\models\Tour;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Couple */
/* @var $form yii\widgets\ActiveForm */
/* @var $bnames array */
/* @var $gsurnames array */
/* @var $gnames array */
/* @var $bsurnames array */
/* @var $years array */
/* @var $tour Tour */
/* @var $tours \app\models\Tour[] */
/* @var $clubs \app\models\Club[] */
$tours = isset($tours) ? $tours : [];
?>

<div class="couple-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?= $form->field($model, 'club_id')->dropDownList($clubs) ?>

    <?php if (isset($tour)) {
        echo Html::tag('h2', $tour->name);
        echo $form->field($model, 'tour_id')->hiddenInput(['value' => $tour->id]);
    } else echo $form->field($model, 'tour_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($tours, 'id', function ($model) {
            /* @var $model Tour */
            return $model->program_position . '. ' .$model->name .  ' (' . $model->dances . ')' . ($model->is_solo == 1 ? ' соло' : '');
        }, function ($model) {
            /* @var $model Tour */
            return $model->concert->name;
        })
    ) ?>
    <div class="col-sm-12 row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Партнер</div>
                <div class="panel-body form-inline">
                    <div class="col-sm-1" style="padding: 10px">
                        <?= FA::icon('male')->size(FA::SIZE_3X) ?>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                        <?= $form->field($model, 'bsurname')->widget(\yii\jui\AutoComplete::className(), [
                            'clientOptions' => [
                                'source' => $bsurnames,
                            ],
                            'options' => [
                                'class' => 'form-control',
                                'placeholder' => 'Фамилия'
                            ],
                        ])->label(false) ?>

                        <?= $form->field($model, 'bname')->widget(\yii\jui\AutoComplete::className(), [
                            'clientOptions' => [
                                'source' => $bnames,
                            ],
                            'options' => [
                                'class' => 'form-control',
                                'placeholder' => 'Имя'
                            ],
                        ])->label(false) ?>

                        <?= $form->field($model, 'byear')->dropDownList($years)->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Партнерша</div>
                <div class="panel-body form-inline">
                    <div class="col-sm-1" style="padding: 10px">
                        <?= FA::icon('female')->size(FA::SIZE_3X) ?>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                        <?= $form->field($model, 'gsurname')->widget(\yii\jui\AutoComplete::className(), ['clientOptions' => ['source' => $bsurnames,],
                            'options' => [
                                'class' => 'form-control',
                                'placeholder' => 'Фамилия'
                            ],])->label(false) ?>

                        <?= $form->field($model, 'gname')->widget(\yii\jui\AutoComplete::className(), ['clientOptions' => ['source' => $gnames,],
                            'options' => [
                                'class' => 'form-control',
                                'placeholder' => 'Имя'],
                        ])->label(false) ?>

                        <?= $form->field($model, 'gyear')->dropDownList($years)->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Зарегистрировать' : 'Обновить', ['style' => 'width: 100%', 'class' => 'btn-lg' . $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-large', 'style' => 'width:100%; margin-top: 30px']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
