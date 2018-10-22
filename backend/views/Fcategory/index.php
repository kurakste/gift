<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fcategorys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fcategorys-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fcategorys', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'cpu',
            'description:ntext',
            'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
