<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fcid') ?>

    <?= $form->field($model, 'scid') ?>

    <?= $form->field($model, 'vid') ?>

    <?= $form->field($model, 'exid') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'cpu') ?>

    <?php // echo $form->field($model, 'short_description') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'lifetime') ?>

    <?php // echo $form->field($model, 'rank') ?>

    <?php // echo $form->field($model, 'phisical') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
