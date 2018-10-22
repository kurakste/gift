<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Baseprices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baseprices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iid')->dropDownList($items) ?>

    <?= $form->field($model, 'purchase_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_pice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active_from')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',]) ?>

    <?= $form->field($model, 'active_till')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
