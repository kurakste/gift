<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Deliverys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deliverys-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
