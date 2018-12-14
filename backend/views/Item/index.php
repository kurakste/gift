<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'vid',
            'exid',
            'name',
            //'cpu',
            //'short_description',
            //'description:ntext',
            //'lifetime:datetime',
            //'rank',
            //'phisical',
            'sizes.Width',

            ['class' => 'yii\grid\ActionColumn'],
            [                                                                                                                       
                'format' => 'html',                                             
                'value' => function($model) {                                   
                    return Html::a(                                         
                        '<span class="glyphicon glyphicon-paperclip">',          
                        Url::to(['size/for-items', 'iid' => $model->id])
                    );                                                      
                }                                                               
            ]                      
        ],
    ]); ?>
</div>
