<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Carusel */

$this->title = 'Create Carusel';
$this->params['breadcrumbs'][] = ['label' => 'Carusels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carusel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
