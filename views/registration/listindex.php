<?php

/* @var $this yii\web\View */
use app\models\Concert;
use yii\helpers\Html;

/* @var $models Concert[] */

$this->title = 'Списки регистраций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-list">

    <h1>Доступные концерты</h1>
    <?php
        foreach($models as $concert) {
            /* @var $concert Concert */
            ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $concert->name ?> (<?= $concert->countCouples()?> пар)</div>
                <ul class="list-group">
                <?php
                    foreach($concert->tours as $tour) {
                        echo Html::a($tour->getReadableName() .  (($tour->is_solo) ? 'соло' : ''),['registration/tour', 'id'=>$tour->id],['class' => 'list-group-item']);
                    }
                ?>
                </ul>
            </div>
            <?php
        }
    ?>
</div>
