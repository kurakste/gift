<?php

namespace backend\controllers;

use Yii;
use common\models\Deliverys;
use common\models\DeliverysSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DeliveryController implements the CRUD actions for Deliverys model.
 */
class DeliveryController extends Controller
{
    public function beforeAction($action)
    {
         $this->enableCsrfValidation = false;

         return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'ajax-add-city-to-delivery' => ['POST'],
                    'ajax-get-city-to-delivery-list' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Deliverys models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DeliverysSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Deliverys model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Deliverys model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Deliverys();
        $citys = ArrayHelper::map(\common\models\Citys::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'citys' => $citys,
        ]);
    }

    /**
     * Updates an existing Deliverys model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    { 
        $model = $this->findModel($id);
        $cities = ArrayHelper::map(\common\models\Citys::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'cities' => $cities,
        ]);
    }

    /**
     * Deletes an existing Deliverys model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAjaxAddCityToDelivery()
    {
        $did = (int)\Yii::$app->request->post('did'); // We get wich delivery we whant to add city;
        $cid = (int)\Yii::$app->request->post('cid'); // We get wich city we whant to add;
        $deliverytocitys = \common\models\Deliverytocitys::find()
            ->where(['did' => $did])
            ->andWhere(['cid' => $cid])
            ->all(); 

        if (!($deliverytocitys)) {
            $dtoc = new \common\models\Deliverytocitys;
            $dtoc->did = $did;
            $dtoc->cid = $cid;
            $dtoc->save();
            //vd($dtoc->errors);

            if (!$dtoc->hasErrors()) {
                return 'Ok';
            } else {
                return 'Error'; 
            }
            
        } else {
            return 'Error';
        }
 
    }
    
    public function actionAjaxRemoveCityToDelivery()
    {
        $did = (int)\Yii::$app->request->post('did'); // We get wich delivery we whant to add city;
        $cid = (int)\Yii::$app->request->post('cid'); // We get wich city we whant to add;
        
        $deliverytocitys = \common\models\Deliverytocitys::find()
            ->where(['did' => $did])
            ->andWhere(['cid' => $cid])
            ->one(); 
        
        if (($deliverytocitys)) {
            $deliverytocitys->delete();
            return 'Ok';
        }

        return 'Error';
    }
    
    public function actionAjaxGetCityToDeliveryList()
    {
        
        $did = (int)\Yii::$app->request->get('did'); // We get wich delivery we whant to add city;
        $deliverytocitys = \common\models\Deliverytocitys::find()
            ->where(['did' => $did])
            ->all(); 

        $out =[];
        foreach ($deliverytocitys as $city) {

            //vd($city->c);
            $out[] = ['cid' => $city->cid, 'name' => $city->c->name];
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        return $out; 
    }

    /**
     * Finds the Deliverys model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Deliverys the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Deliverys::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
