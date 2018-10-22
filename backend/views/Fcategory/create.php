<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fcategorys */

$this->title = 'Create Fcategorys';
$this->params['breadcrumbs'][] = ['label' => 'Fcategorys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fcategorys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
