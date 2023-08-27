<?php

namespace app\controllers;

use Yii;
use app\models\RefKecamatan;
use app\models\RefKecamatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefKecamatanController implements the CRUD actions for RefKecamatan model.
 */
class RefKecamatanController extends Controller
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
     * Lists all RefKecamatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RefKecamatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RefKecamatan model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN)
    {
        return $this->render('view', [
            'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN),
        ]);
    }

    /**
     * Creates a new RefKecamatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefKecamatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RefKecamatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RefKecamatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RefKecamatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @return RefKecamatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN)
    {
        if (($model = RefKecamatan::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
