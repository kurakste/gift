<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Citys */

$this->title = 'Create Citys';
$this->params['breadcrumbs'][] = ['label' => 'Citys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="citys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
