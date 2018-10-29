<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SizesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sizes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sizes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sizes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'description:ntext',
            'weigth',
            'width',
            'height',
            'length',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
