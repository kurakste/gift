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


}

