<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Deliverys */

$this->title = 'Create Deliverys';
$this->params['breadcrumbs'][] = ['label' => 'Deliverys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliverys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'citys' => $citys
    ]) ?>

</div>
