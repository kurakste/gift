<?php

namespace backend\controllers;

use Yii;
use common\models\Items;
use common\models\ItemsWithCats;
use common\models\ItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ItemController implements the CRUD actions for Items model.
 */
class ItemController extends Controller
{
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
                ],
            ],
        ];
    }

    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
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
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemsWithCats();
        $fcategorys = ArrayHelper::map(\common\models\Fcategorys::find()->all(), 'id', 'name');
        $scategorys = ArrayHelper::map(\common\models\Scategorys::find()->all(), 'id', 'name');
        $venders = ArrayHelper::map(\common\models\Venders::find()->all(), 'id', 'name');
        
//        vd($fcategorys);
//        $model->load(Yii::$app->request->post());
//        vd($model);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            $model->saveFcats();
 //           $model->saveScats();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'fcategorys' => $fcategorys,
            'scategorys' => $scategorys,
            'scategorys' => $scategorys,
            'venders' => $venders,
        ]);
    }

    /**
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fcategorys = ArrayHelper::map(\common\models\Fcategorys::find()->all(), 'id', 'name');
        $scategorys = ArrayHelper::map(\common\models\Scategorys::find()->all(), 'id', 'name');
        $venders = ArrayHelper::map(\common\models\Venders::find()->all(), 'id', 'name');

        if (Yii::$app->request->post()) {
         //   vd(Yii::$app->request->post());
            $model->load(Yii::$app->request->post());
            $model->fcats_ids =Yii::$app->request->post()['ItemsWithCats']['fcats_ids'];
            $model->scats_ids =Yii::$app->request->post()['ItemsWithCats']['scats_ids'];
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->saveFcats();
            $model->saveScats();
//           vd($model); 
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'fcategorys' => $fcategorys,
            'scategorys' => $scategorys,
            'scategorys' => $scategorys,
            'venders' => $venders,
        ]);
    }

    /**
     * Deletes an existing Items model.
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

    /**
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemsWithCats::findOne($id)) !== null) {
            $model->loadFcats();
            $model->loadScats();
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
