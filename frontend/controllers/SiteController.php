<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Items;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'listashop';

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $fcats = \common\models\Fcategorys::find()->all();
        $scats = \common\models\Scategorys::find()->all();

        $items =Items::find()->all();

        //        vd($items[0]->images[0]->path);
        /* foreach ($items as $item) { */
        /*     echo $item->name."<br>"; */

        /* } */
        /* die; */

        // Отправил три массива с объектами fcategory, scategory, items
        return $this->render('index', 

            [
                'fcats' => $fcats,
                'scats' => $scats,
                'items' => $items,
            ]);
    }

    public function actionCategory()
    {
        $fcats = \common\models\Fcategorys::find()->all();
        $scats = \common\models\Scategorys::find()->all();

        $items =Items::find()->all();

        return $this->render('category', 
            [
                'fcats' => $fcats,
                'scats' => $scats,
                'items' => $items,
            ]);
    }
    
    public function actionManWomen()
    {
        $fcats = \common\models\Fcategorys::find()->all();
        $items =Items::find()->all();

        return $this->render('gift_MW', 
            [
                'fcats' => $fcats,
            ]);
    }

        /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        
        return $this->render('about');
    }
    
    public function actionHowIsItWork()
    {
        
        return $this->render('about');
    }


    public function actionAjaxGetProducts() 
    {
        $request = Yii::$app->request;

        $fcid = $request->get('fcid');
        $scid = $request->get('scid');

        $fcid = ($fcid == -99) ? null : $fcid;
        $scid = ($scid == -99) ? null : $scid;

//        vd($fcid);

        $items =Items::find()
            ->andFilterWhere(['fcid' => $fcid])
            ->andFilterWhere(['scid' => $scid])
            ->all();

        $out = [];
        foreach ($items as $item) {
            $tmp = [];
            $tmp['name'] = $item->name;
            $tmp['description'] = $item->description;
            $tmp['image'] = $item->getMainImage();
            $tmp['price'] = $item->getActualPrice();
            $out[] = $tmp;
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $out;
    
    }

    public function actionTest()
    {
        $out = [ 
            [
                'name' => 'Helen',
                'price' => 2000,
                'image' => '/img/product/most-product/m-product-1.jpg'
            ],
            [
                'name' => 'Helen1',
                'price' => 3000,
                'image' => '/img/product/most-product/m-product-2.jpg'
            ],
            [
                'name' => 'Helen2',
                'price' => 4000,
                'image' => '/img/product/most-product/m-product-3.jpg'
            ],
        ];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $out;
    }
    
}
