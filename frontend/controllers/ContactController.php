<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


class ContactController extends Controller 
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        
        return parent::beforeAction($action);
    }


    public function actionAjaxSendCallbackRequest()
    {
        $request = Yii::$app->request;
        $phone = (string)$request->post('phone');
        \Yii::$app->mailer->compose()
            ->setFrom(['yoursiteaudit@yandex.ru' => 'py-pozdravim.ru'])
            ->setTo(['kurakste@gmail.com'=>'admin'])
            ->setSubject('CallbackRequest')
            ->setTextBody('Please call to: '. $phone)
            ->send();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return true;
    }
}
