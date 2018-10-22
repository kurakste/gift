<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sizes */

$this->title = 'Create Sizes';
$this->params['breadcrumbs'][] = ['label' => 'Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sizes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
