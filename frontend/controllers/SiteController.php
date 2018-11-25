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

        $cookies = Yii::$app->request->cookies;

        if ($cookies->has('city')) {
            $cityid = $cookies->getValue('city');
            $city = \common\models\Citys::find()->where(['id' => $cityid])->one();
            if ($city == null) {
                throw new \yii\web\HttpException(404, 'Can\'t find city like that.');
            }
            \Yii::$app->view->params['city'] = $city;
            \Yii::$app->view->params['citycpu']=$city->cpu;
        }
        
        if (!$cookies->has('favid')) {
            $favid = uniqid();
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'favid',
                'value' => $favid,
            ]));
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
                    'del-all-fav' => ['POST'],
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

    public function actionIndexCity()
    {
        $request = Yii::$app->request;
        $citycpu = (string)$request->get('city');

        $city = \common\models\Citys::find()->where(['cpu' => $citycpu])->one();
        \Yii::$app->view->params['citycpu']=$city->cpu; 
        \Yii::$app->view->params['city'] = $city;
        \Yii::$app->view->params['page'] = 'main';


        $cookies = Yii::$app->request->cookies;

        if ($cookies->has('city')) {
            $cookies = Yii::$app->response->cookies;
            $cookies->remove('city');
        }


        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'city',
            'value' => $city->id,
        ]));
        

        $fcats = \common\models\Fcategorys::find()->all();
        $scats = \common\models\Scategorys::find()->all();
        $cities = \common\models\Citys::find()->all();

        $items =Items::find()->all();

        return $this->render('index', 
            [
                'fcats' => $fcats,
                'scats' => $scats,
                'items' => $items,
            ]);
    }

    public function actionCategory()
    {

        $request = Yii::$app->request;

        //We get the name city 
        $citycpu = (string)$request->get('city'); // !!!we don't use city here. 
        // It's ony for CEO optimisation. We get it from cookie, end set it 
        // throught ajax.
        $fcatscpu = (string)$request->get('fcats'); 

        if ($fcatscpu == '_') {
            $fcid = -99; // show all items with out filter;
        } else {
            $fcat = \common\models\Fcategorys::find()->where(['cpu' => $fcatscpu])->one();
            if (!$fcat) {
                $fcid = -99;
            } else {
                $fcid = $fcat->id; // We will filter items using this fcid.
            };
        }
        
        \Yii::$app->view->params['fcid'] = $fcid; // Send fcid to template if it comes from get.

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

    public function actionAjaxAddItemToFav()
    {
        $request = Yii::$app->request;
        $iid = $request->get('iid'); 


        $fcid = $request->get('fcid');

        $cookies = Yii::$app->request->cookies;
        $favid = $cookies->getValue('favid');

        $favsearch = \common\models\Favorites::find()
            ->where(['iid' => $iid, 'favid' => $favid])
            ->all();
        
        if (count($favsearch) == 0) {
            $fav = new \common\models\Favorites;
            $fav->favid = $favid;
            $fav->iid = $iid;
            $fav->save();
    //        vd($fav);
        }
    }


    public function actionFavorite()
    {
        $cookies = Yii::$app->request->cookies;
        $favid = $cookies->getValue('favid');

        $favorites =\common\models\Favorites::find()
            ->joinWith('items')
            ->andFilterWhere(['favid' => $favid])
            ->all();

        \Yii::$app->view->params['page'] = 'favorite';
        return $this->render('favorite', ['favs' => $favorites]);
    }
    
    public function actionDelOneFav()
    {
        $cookies = Yii::$app->request->cookies;
        $favid = $cookies->getValue('favid');
        
        $request = Yii::$app->request;
        $iid = (int)$request->post('iid') ?? 0; 

        $favorite =\common\models\Favorites::find()
            ->where(['favid' => $favid, 'iid' => $iid])
            ->one();
        
        if ($favorite !== null) {
            $favorite->delete();
        }

        return $this->redirect(['site/favorite']);
    }


    
    public function actionDelAllFav()
    {
        $cookies = Yii::$app->request->cookies;
        $favid = $cookies->getValue('favid');

        $favorites =\common\models\Favorites::deleteAll(['=', 'favid', $favid]);

        return $this->redirect(['site/favorite']);
    }

    public function actionSessionTest()
    {
    
    }

    public function actionTest()
    {
        \Yii::$app->view->params['page'] = 'test';
        return $this->render('cert');
    }
    
}
