<?php

namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Items;
use common\models\Certificates;
use \YandexMoney\API;
use \YandexMoney\ExternalPayment;



class CheckoutController extends Controller
{
    
    
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

    public function actionIndex()
    {
        \Yii::$app->view->params['page'] = 'product-detail';

        $request = Yii::$app->request;
        $product = $request->get('product');

        $product = Items::find()
            ->where(['=', 'cpu', $product])
            ->with('images')
           ->one(); 
        if ($product === null) {
            throw new \yii\web\NotFoundHttpException("Product not found");
        }
        $this->view->title = "Подарок | оформление | " .$product->name ;


        $cert = new Certificates;

        $cert->iid = $product->id;
        $cert->certid = Certificates::getNewCertID();
        $cert->purchase_price = $product->getActualPurchasePrice();
        $cert->sale_price = $product->getActualPrice();
        $cert->status = Certificates::NEWITEM;
        $cert->created_at = date('Y-m-d H:i:s');
        $cert->save();

        $certid = $cert->certid;

        
        $pparam = $this->getPaymetParameters(50, 'Оплата подарочного сертификата №'.$certid, $certid) ;
        $pparam['product'] = $product;

//        vd($pparam);

        return $this->render('checkout', [
            'pparam'  => $pparam, // Transit parametes for payment form
            'product' => $product,
            'certid'  => $certid,
        ]);
    }

    public function actionGetPaymentPage() 
    {
        $request = Yii::$app->request;
        $par = $request->post();

        $pcpu = $request->post('productcpu');
        $from = $request->post('from');
        $fphone = $request->post('fphone');
        $femail = $request->post('femail');
        $to = $request->post('to');
        $tophone = $request->post('tophone');

        $acs_uri= $request->post('acs_uri');
        $cps_context_id = $request->post('cps_context_id');
        $paymentType = $request->post('paymentType');

        $certid = $request->post('certid');

        $cert = Certificates::find()
            ->where(['=', 'certid', $certid])
            ->with('item')
            ->one(); 
        if ($cert === null) {
            throw new \yii\web\NotFoundHttpException("Certificate record not found");
        }
        
        $cert->status = Certificates::SENDFORPAYMENT;
        $cert->donor_name = $from;
        $cert->donor_phone = $fphone;
        $cert->donor_email = $femail;
        $cert->recipient_name = $to;
        $cert->recipient_phone = $tophone;
        $cert->save();
        
        \Yii::$app->view->params['page'] = 'finishcheckout';


        return $this->render('finishcheckout', [
            'cert' => $cert,
            'acs_uri' =>  $acs_uri, 
            'cps_context_id' => $cps_context_id,
            'paymentType' => $paymentType,
        ]);
    }

    public function actionSuccess(){
        $request = Yii::$app->request;
        $certid = (string)$request->get('certid');

        $cert = Certificates::find()
            ->where(['=', 'certid', $certid])
            ->with('item')
            ->one(); 
        if ($cert === null) {
            \Yii::$app->mailer->compose()
                ->setFrom(['yoursiteaudit@yandex.ru' => 'py-pozdravim.ru'])
                ->setTo(['kurakste@gmail.com'=>'admin'])
                ->setSubject('Произошел сбой при успешной оплате.:'.$certid)
                ->setTextBody('Произошел сбой при успешной оплате. Номер сертификата:'.$certid)
                ->send();
            throw new \yii\web\NotFoundHttpException("Certificate record not found");
            die;
        }

        $cert->status = Certificates::PAID;
        $cert->save();
        // Здесь нужен блок обработки ошибки!!!!!

        \Yii::$app->mailer->compose()
            ->setFrom(['yoursiteaudit@yandex.ru' => 'py-pozdravim.ru'])
            ->setTo(['kurakste@gmail.com'=>'admin'])
            ->setSubject('Оплачен сертификат:'.$certid)
            ->setTextBody('Оплачен сертификат:'.$certid)
            ->send();

        \Yii::$app->view->params['page'] = 'thanks';
        return $this->render('thanks', [
            'cert'  => $cert, 
        ]);
        
            
    }

    

    private function getPaymetParameters($sum, $comment, $certid) 
    {
        $response = ExternalPayment::getInstanceId('7A5C1C3227365BA3E00B75C1C4B2910D418114D060C631BCB43D35E2838557FE');
        if($response->status == "success") {
            $instance_id = $response->instance_id;
        }   
        else {
            // throw
        }
        
        $external_payment = new ExternalPayment($instance_id);

        $payment_options = [
            'pattern_id' => 'p2p',
            'instance_id' => env('YANDEX_IID'),
            'to' => env('YANDEX_TO'),
            'amount' => $sum,
            'message' => $comment,
            'test_payment' => 'true'
        ];

        $response = $external_payment->request($payment_options);

        if($response->status == "success") {
            $request_id = $response->request_id;
        } else {
            // throw exception with $response->message
        }
        //        vd($response);
        $process_options = [
            "request_id" => $request_id,
            "instance_id" =>env('YANDEX_IID'),
            'ext_auth_success_uri' => env('YANDEX_SURI').'?certid='.$certid,
            'ext_auth_fail_uri' => env('YANDEX_FURI'),
        ];
        $result = $external_payment->process($process_options);
        // process $result according to docs

        //      vd($result);

        $cps_context_id = $result->acs_params->cps_context_id; 
        $paymentType = $result->acs_params->paymentType;
        $acs_uri = $result->acs_uri;

        return [
            'acs_uri' => $acs_uri, 
            'cps_context_id' => $cps_context_id,
            'paymentType' => $paymentType,
        ]; 
    } 


}

