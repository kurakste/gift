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
        $items =Items::find()->with(['images'])->all();

        return $this->render('index', 
            [
                'fcats' => $fcats,
                'scats' => $scats,
                'items' => $items,
            ]);
        return $this->render('index');
    }

    public function actionCategory()
    {
        return $this->render('category');
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
    
}
