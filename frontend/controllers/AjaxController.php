<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;


class AjaxController extends Controller
{

    public function actionGetCityList()
    {

        $cities = \common\models\Citys::find()->asArray()->all();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $cities;
    }    

    public function actionQuotes() 
    {
        $quotes = \common\models\Quotes::find()->asArray()->all();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $quotes;

    
    }


}
