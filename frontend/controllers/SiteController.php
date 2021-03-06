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
use \YandexMoney\API;
use \YandexMoney\ExternalPayment;

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

        if ($cookies->has('city')) {
            $cityid = $cookies->getValue('city');
            $city = \common\models\Citys::find()->where(['id' => $cityid])->one();
            if ($city == null) {
                throw new \yii\web\HttpException(404, 'Can\'t find city like that:'.$cityid);
            }
            \Yii::$app->view->params['city'] = $city;
            \Yii::$app->view->params['citycpu']=$city->cpu;
        } else {
            // Let it be as default value
            \Yii::$app->view->params['citycpu']="naberegnye_chelny";
            $city = \common\models\Citys::find()->where(['id' => 3])->one();
            \Yii::$app->view->params['city'] = $city;
        
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
        \Yii::$app->view->params['page'] = 'main';
        $this->view->title = "Магазин подарков.";
        return $this->render('index', 
            [
            ]
        );
    }

    public function actionIndexCity()
    {
        $request = Yii::$app->request;
        $citycpu = (string)$request->get('city');

        $city = \common\models\Citys::find()->where(['cpu' => $citycpu])->one();

        \Yii::$app->view->params['citycpu']=$city->cpu; 
        \Yii::$app->view->params['city'] = $city;
        \Yii::$app->view->params['page'] = 'maincity';
        $this->view->title = "Подарки | г. " . $city->name;


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

        return $this->render('indexcity', 
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
        $citycpu = (string)$request->get('city');  
        $fcatscpu = (string)$request->get('fcats'); 
        $city = \common\models\Citys::find()->where(['cpu' => $citycpu])->one();


        \Yii::$app->view->params['citycpu']=$city->cpu; 
        \Yii::$app->view->params['city'] = $city;
        \Yii::$app->view->params['page'] = 'cat';
        $this->view->title = "Выбор подарков в г. " . $city->name;

            
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
        
        \Yii::$app->view->params['fcid'] = $fcid; // Send fcid to template.
        
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
        $citys = \common\models\Citys::find()->all();

        $cities = \yii\helpers\ArrayHelper::map($citys, 'id', 'name');

        return $this->render('category', 
            [
                'fcats' => $fcats,
                'scats' => $scats,
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
        
        $this->view->title = "Подарок | Сертификат |" .$product->name ;
        return $this->render('product', ['product' =>$product]);
    }

        /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        
        \Yii::$app->view->params['page'] = 'about';

        $this->view->title = "Подарки | о нас";
        return $this->render('about');
    }
    
    public function actionHowDoesItWork()
    {
        
        \Yii::$app->view->params['page'] = 'how';
        $this->view->title = "Подарки | как это работает";
        return $this->render('howdoesitwork');
    }
    
    public function actionCertificate()
    {
        $this->view->title = "Подарки | подарочный сертификат";
        
        \Yii::$app->view->params['page'] = 'cert';
        return $this->render('certificate');
    }


    public function actionFeedback() 
    {
        $this->view->title = "Подарки | обратная связь";
        \Yii::$app->view->params['page'] = 'feedback';


        $request = Yii::$app->request;
        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            \Yii::$app->mailer->compose()
                ->setFrom(['yoursiteaudit@yandex.ru' => 'py-pozdravim.ru'])
                ->setTo(['kurakste@gmail.com'=>'admin'])
                ->setSubject('Обратная связь.')
                ->setTextBody('Имя: '
                    .$data['first_name']
                    .'<br>Телефон: '
                    .$data['phone']
                    .'<br>Сообщение: '
                    .$data['message']
                )
                ->send();
        return $this->render('feedbackthanks');
        }
        return $this->render('feedback');
    }

    public function actionAjaxGetProducts() 
    {
        $request = Yii::$app->request;

        $fcid = $request->get('fcid');
        $scid = $request->get('scid');
        $cityid = $request->get('cityid');

        $fcid = ($fcid == -99) ? null : (int)$fcid;
        $scid = ($scid == -99) ? null : (int)$scid;


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

        $cityid= (int)$request->post('cityid') ?? null;


        if (($cityid!==null)) {
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city',
                'value' => $cityid,
            ]));
            return  $cityid;
        }
        return false;
    }

    public function actionAjaxAddItemToFav()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $request = Yii::$app->request;
        $iid = $request->post('iid'); 

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
            return true;

        }

        return true;
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

        return $this->render('test', [
        ]); 
    }

    public function actionTest2()
    {
        
        die;
    }    
    
}
