<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fcats_ids')->checkboxList($fcategorys, ['id'])->label("Категория \"Для кого\":") ?>

    <?= $form->field($model, 'scats_ids')->checkboxList($scategorys)->label("Категория \"Повод\":")  ?>

    <?= $form->field($model, 'vid')->dropDownList($venders)->label("Поставщик услуг:")  ?>

    <?= $form->field($model, 'exid')->textInput(['maxlength' => true])->label("Название в системах учета:") ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label("Название на витрине:") ?>

    <?= $form->field($model, 'cpu')->textInput(['maxlength' => true])->label("Название для формирования ссылки") ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true])->label("Краткое описание:") ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label("Полное оприсание продукта.") ?>

    <?= $form->field($model, 'lifetime')->textInput()->label("Сколько дней действителен сертификат (0 для физ. товаров):") ?>

    <?= $form->field($model, 'rank')->textInput(['value' =>'0'])->label("Рейтинг товара по продажам. 0 для нового") ?>

<?= $form->field($model, 'phisical')->dropDownList([
                                                        0 => 'сертификат',
                                                        1 => 'товар'
                                                    ])->label("Физический товар или сертификат:") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
