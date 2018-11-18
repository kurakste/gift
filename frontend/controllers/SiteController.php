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

    public function beforeAction($action)
    {
        $cities = \common\models\Citys::find()->all();
        \Yii::$app->view->params['cities'] = $cities;

        $cookies = Yii::$app->request->cookies;
        if (!$cookies->has('city')) {
            // Set sefault city if not set yet.
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city',
                'value' => '3',
            ]));
            \Yii::$app->view->params['city'] = 3;
        } else {
            \Yii::$app->view->params['city'] = $cookies->getValue('city');
        
        }

        return parent::beforeAction($action);
    }

    public function behaviors()
{
    return [
        'verbs' => [
            'class' => \yii\filters\VerbFilter::className(),
            'actions' => [
                'checkout' => ['POST','GET'],
            ],
        ],
    ];
}

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $fcats = \common\models\Fcategorys::find()->all();
        $scats = \common\models\Scategorys::find()->all();
        $cities = \common\models\Citys::find()->all();

        $items =Items::find()->all();

        // Отправил три массива с объектами fcategory, scategory, items

        \Yii::$app->view->params['page'] = 'main';
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
        $citys = \common\models\Citys::find()->all();

        $cities = \yii\helpers\ArrayHelper::map($citys, 'id', 'name');

        $items =Items::find()
            ->all();

       // vd($items);
       // vd($cities);
        \Yii::$app->view->params['page'] = 'cat';
        return $this->render('category', 
            [
                'fcats' => $fcats,
                'scats' => $scats,
                'items' => $items,
                'cities' => $cities,
            ]);
    }
    
    public function actionGetProduct()
    {
        \Yii::$app->view->params['page'] = 'product-detail';
        $request = Yii::$app->request;
        $product = $request->get('product');
        $product =\common\models\Items::find()
            ->where(['=', 'cpu', $product])
            ->with('images')
           ->one(); 
        if ($product === null) {
            throw new \yii\web\NotFoundHttpException("Product not found");
        }


        return $this->render('product', ['product' =>$product]);
    }

    public function actionCheckout()
    {
        \Yii::$app->view->params['page'] = 'product-detail';
        $request = Yii::$app->request;
        $product = $request->get('product');
        //vd($request->post());
        $product =\common\models\Items::find()
            ->where(['=', 'cpu', $product])
            ->with('images')
           ->one(); 
        if ($product === null) {
            throw new \yii\web\NotFoundHttpException("Product not found");
        }
    
        return $this->render('checkout', ['product' =>$product]);
    }
        /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        
        \Yii::$app->view->params['page'] = 'about';
        return $this->render('about');
    }
    
    public function actionHowDoesItWork()
    {
        
        \Yii::$app->view->params['page'] = 'how';
        return $this->render('howdoesitwork');
    }
    
    public function actionActivate()
    {
        
        \Yii::$app->view->params['page'] = 'act';
        return $this->render('activate');
    }


    public function actionAjaxGetProducts() 
    {
        $request = Yii::$app->request;

        $fcid = $request->get('fcid');
        $scid = $request->get('scid');
        $cityid = $request->get('cityid');

        $fcid = ($fcid == -99) ? null : $fcid;
        $scid = ($scid == -99) ? null : $scid;

//        vd($fcid);

        $items =Items::find()
            ->joinWith('venders')
            ->joinWith('fcats')
            ->joinWith('scats')
            ->andFilterWhere(['fcategorys.id' => $fcid])
            ->andFilterWhere(['scategorys.id' => $scid])
//            ->andFilterWhere(['fcid' => $fcid])
//            ->andFilterWhere(['scid' => $scid])
            ->andFilterWhere(['venders.cityid' => $cityid])
            ->all();

//        vd($items);

        $out = [];
        foreach ($items as $item) {
            $tmp = [];
            $tmp['id'] = $item->id;
            $tmp['name'] = $item->name;
            $tmp['description'] = $item->description;
            $tmp['image'] = $item->getMainImage();
            $tmp['price'] = $item->getActualPrice();
            $tmp['cpu'] = $item->cpu;
            $out[] = $tmp;
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $out;
    }
 
    public function actionAjaxGetCurrentClientSetting() 
    {
        $cookies = Yii::$app->request->cookies;
        $tmp['city'] = $cookies->getValue('city', '2');
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $tmp;
    }

    public function actionAjaxSetCurrentClientSetting() 
    {
        $request = Yii::$app->request;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $cityid= (int)$request->get('cityid') ?? null;


        if (($cityid!==null)) {
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city',
                'value' => $cityid,
            ]));
            return  $cityid;
        }
        return 'error';
    }

    public function actionSessionTest()
    {
        $session = Yii::$app->session;
        $cookies = Yii::$app->request->cookies;
        vd($cookies);
    
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
