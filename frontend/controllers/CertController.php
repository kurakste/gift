<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Certificates;
/**
 * Site controller
 */
class CertController extends Controller
{
    public $layout = 'listashop';

    public function beforeAction($action)
    {
        //$this->enableCsrfValidation = false;
        
        $cities = \common\models\Citys::find()->all();
        \Yii::$app->view->params['cities'] = $cities;

        $cookies = Yii::$app->request->cookies;

        if ($cookies->has('city')) {
            $cityid = $cookies->getValue('city');
            $city = \common\models\Citys::find()->where(['id' => $cityid])->one();
            if ($city == null) {
                throw new \yii\web\HttpException(404, 'Can\'t find city like that.');
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
    
    public function actionIndex()
    {
        echo Certificates::getNewCertID();
        die;
    }

    public function actionNew()
    {
        $request = Yii::$app->request;

        $get = $request->get();
        $iid = $get['iid'];
        $item = \common\models\Items::findOne($iid);

        $cert = new Certificates;

        $cert->attributes = $get;
        $cert->certid = Certificates::getNewCertID();
        $cert->purchase_price = $item->getActualPurchasePrice();
        $cert->sale_price = $item->getActualPrice();
        $cert->status = Certificates::NEWITEM;
        $cert->created_at = date('Y-m-d H:i:s');
        $cert->save();

        $cert->generateCert();

    }

    public function actionGetById()
    {
        $request = Yii::$app->request;
        $get = $request->get();
        $certid = $get['certid']; 

        $cert = \common\models\Certificates::find()
            ->where(['certid' => $certid])
            ->one();
        if (!$cert) {
            throw new \yii\web\HttpException(404, 'Can\'t find certificate like that.');
        }

        $cert->generateCert();
    }

    public function actionAjaxCheck()
    {
        $request = Yii::$app->request;
        $get = $request->get();
        $certid = $get['certid'] ?? null; 
        
        $cert = \common\models\Certificates::find()
            ->where(['certid' => $certid])
            ->one();

        $out = ($cert) ? true : false;
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $out;
    }

    public function actionDescription()
    {
        \Yii::$app->view->params['page'] = 'cert-detail';
        $request = Yii::$app->request;
        $get = $request->get();
        $certid = $get['certid'] ?? null; 
        
        $cert = \common\models\Certificates::find()
            ->where(['certid' => $certid])
            ->one();
        
        if (!$cert) {
            throw new \yii\web\HttpException(404, 'Can\'t find certificate like that.');
        }

        $product = $cert->item;


        return $this->render('detail', ['product' => $product]);
    }

    public function actionAjaxActivate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $certid = $request->post('certid');
//        vd($request->post());
        $cert = \common\models\Certificates::find()
            ->where(['certid' => $certid])
            ->one();
        
        if (!$cert) return false;
        
        if ($cert) {
            if ($cert->status === \common\models\Certificates::ACTIVETED) {
                //Crtificate alredy cativated. We need just fier event. That is it.
                $cert->onActivate();
                return true;
            }
            $cert->status = \common\models\Certificates::ACTIVETED;
            $cert->activated_at = date('Y-m-d');
            if ($cert->save()) {
                $cert->onActivate();
                return true;
            } else {
                return false;
            }
        }
    return false;    
    }

    


}

