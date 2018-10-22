<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fbacks */

$this->title = 'Create Fbacks';
$this->params['breadcrumbs'][] = ['label' => 'Fbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fbacks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
