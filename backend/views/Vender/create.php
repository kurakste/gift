<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Venders */

$this->title = 'Create Venders';
$this->params['breadcrumbs'][] = ['label' => 'Venders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
