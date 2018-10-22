<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FbacksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fbacks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'iid') ?>

    <?= $form->field($model, 'oid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'fbacks') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
