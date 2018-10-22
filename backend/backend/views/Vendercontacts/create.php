<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vendercontacts */

$this->title = 'Create Vendercontacts';
$this->params['breadcrumbs'][] = ['label' => 'Vendercontacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendercontacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
