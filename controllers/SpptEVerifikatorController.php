<?php

namespace app\controllers;

use Yii;
use app\models\SpptEVerifikator;
use app\models\SpptEVerifikatorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpptEVerifikatorController implements the CRUD actions for SpptEVerifikator model.
 */
class SpptEVerifikatorController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'save-as-new'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all SpptEVerifikator models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpptEVerifikatorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SpptEVerifikator model.
     * @param integer $verifikator_1
     * @param integer $verifikator_2
     * @param integer $verifikator_3
     * @return mixed
     */
    public function actionView($verifikator_1, $verifikator_2, $verifikator_3)
    {
        $model = $this->findModel($verifikator_1, $verifikator_2, $verifikator_3);
        return $this->render('view', [
            'model' => $this->findModel($verifikator_1, $verifikator_2, $verifikator_3),
        ]);
    }

    /**
     * Creates a new SpptEVerifikator model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SpptEVerifikator();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SpptEVerifikator model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $verifikator_1
     * @param integer $verifikator_2
     * @param integer $verifikator_3
     * @return mixed
     */
    public function actionUpdate($verifikator_1, $verifikator_2, $verifikator_3)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new SpptEVerifikator();
        }else{
            $model = $this->findModel($verifikator_1, $verifikator_2, $verifikator_3);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SpptEVerifikator model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $verifikator_1
     * @param integer $verifikator_2
     * @param integer $verifikator_3
     * @return mixed
     */
    public function actionDelete($verifikator_1, $verifikator_2, $verifikator_3)
    {
        $this->findModel($verifikator_1, $verifikator_2, $verifikator_3)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export SpptEVerifikator information into PDF format.
     * @param integer $verifikator_1
     * @param integer $verifikator_2
     * @param integer $verifikator_3
     * @return mixed
     */
    public function actionPdf($verifikator_1, $verifikator_2, $verifikator_3) {
        $model = $this->findModel($verifikator_1, $verifikator_2, $verifikator_3);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
    * Creates a new SpptEVerifikator model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($verifikator_1, $verifikator_2, $verifikator_3) {
        $model = new SpptEVerifikator();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($verifikator_1, $verifikator_2, $verifikator_3);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the SpptEVerifikator model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $verifikator_1
     * @param integer $verifikator_2
     * @param integer $verifikator_3
     * @return SpptEVerifikator the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($verifikator_1, $verifikator_2, $verifikator_3)
    {
        if (($model = SpptEVerifikator::findOne(['verifikator_1' => $verifikator_1, 'verifikator_2' => $verifikator_2, 'verifikator_3' => $verifikator_3])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
