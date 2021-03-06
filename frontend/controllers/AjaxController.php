<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use \common\models\Items;


class AjaxController extends Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

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
    
    public function actionGetProducts() 
    {
        $request = Yii::$app->request;
        $cityid = (int)$request->get('cityid');

        $items =Items::find()
            ->joinWith('venders')
            ->joinWith('fcats')
            ->joinWith('scats')
            ->andFilterWhere(['venders.cityid' => $cityid])
            ->all();

        $out = [];
        foreach ($items as $item) {
            $tmp = [];
            $tmp['id'] = $item->id;
            $tmp['fcid'] = ArrayHelper::getColumn($item->fcats, 'id');
            $tmp['scid'] = ArrayHelper::getColumn($item->scats, 'id');
            $tmp['name'] = $item->name;
            $tmp['description'] = $item->description;
            $tmp['image'] = $item->getMainImage();
            $tmp['price'] = (float)$item->getActualPrice();
            $tmp['cpu'] = $item->cpu;
            $out[] = $tmp;
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $out;
    }


}
