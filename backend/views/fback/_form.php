<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fbacks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fbacks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iid')->dropDownList($items) ?>

    <?= $form->field($model, 'oid')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',])  ?>

    <?= $form->field($model, 'fbacks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
