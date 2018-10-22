<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Deliverys */

$this->title = 'Update Deliverys: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Deliverys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deliverys-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
