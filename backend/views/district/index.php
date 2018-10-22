<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DistrictsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Districts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="districts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Districts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cid',
            'name',
            'notes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
