<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BasepricesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baseprices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'iid') ?>

    <?= $form->field($model, 'purchase_price') ?>

    <?= $form->field($model, 'base_pice') ?>

    <?= $form->field($model, 'active_from') ?>

    <?php // echo $form->field($model, 'active_till') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
