<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Baseprices */

$this->title = 'Create Baseprices';
$this->params['breadcrumbs'][] = ['label' => 'Baseprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baseprices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
