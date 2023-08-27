<?php

namespace app\controllers;

use Yii;
use app\models\RefDati2;
use app\models\RefDati2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * RefDati2Controller implements the CRUD actions for RefDati2 model.
 */
class RefDati2Controller extends Controller
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
     * Lists all RefDati2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RefDati2Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RefDati2 model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($KD_PROPINSI, $KD_DATI2)
    {
        return $this->render('view', [
            'model' => $this->findModel($KD_PROPINSI, $KD_DATI2),
        ]);
    }

    /**
     * Creates a new RefDati2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefDati2();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RefDati2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RefDati2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RefDati2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @return RefDati2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2)
    {
        if (($model = RefDati2::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDati2()
    {
        $KD_PROPINSI = Yii::$app->request->post()['depdrop_parents'][0];
        $out = RefDati2::find()->select("KD_DATI2 AS id, NM_DATI2 AS name")->where(['KD_PROPINSI'=>$KD_PROPINSI])->asArray()->all();
        echo Json::encode(['output'=>$out, 'selected'=>'']);
        return;
    }
}
