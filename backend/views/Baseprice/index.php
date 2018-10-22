<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BasepricesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Baseprices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baseprices-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Baseprices', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'iid',
            'purchase_price',
            'base_pice',
            'active_from',
            //'active_till',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
