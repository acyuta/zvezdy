<?php
/* @var $this yii\web\View */
/* @var $model app\models\Couple */
/* @var $form yii\widgets\ActiveForm */
/* @var $bnames array */
/* @var $gsurnames array */
/* @var $gnames array */
/* @var $bsurnames array */
/* @var $years array */
/* @var $tours \app\models\Tour[] */
/* @var $concert \app\models\Concert */
/* @var $years array */
/* @var $clubs \app\models\Club[] */
?>

<div class="registration-couple">
    <h2>Регистрация на "<?= $concert->name ?>"</h2>
    <?= $this->render('/couple/_form', [
        'model' => $model,
        'bnames' => $bnames,
        'bsurnames' => $bsurnames,
        'gnames' => $gnames,
        'gsurnames' => $gsurnames,
        'years' => $years,
        'tours' => $tours,
        'clubs' => $clubs,
    ]); ?>
    <p class="hint-block">Если вашего клуба нет в списке, то напишите на почту <a
            href="mailto:<?= Yii::$app->params['adminEmail'] ?>">Администратору</a></p>
</div>