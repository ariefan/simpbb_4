<?php

namespace app\controllers;

use Yii;
use app\models\RefKelurahan;
use app\models\RefKelurahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefKelurahanController implements the CRUD actions for RefKelurahan model.
 */
class RefKelurahanController extends Controller
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
     * Lists all RefKelurahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RefKelurahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RefKelurahan model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN)
    {
        return $this->render('view', [
            'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN),
        ]);
    }

    /**
     * Creates a new RefKelurahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefKelurahan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RefKelurahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RefKelurahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RefKelurahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @return RefKelurahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN)
    {
        if (($model = RefKelurahan::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionChildAccount() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = \app\models\Account::find()->andWhere(['parent' => $id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id'], 'name' => $account['name']];
                    if ($i == 0) {
                        $selected = $account['id'];
                    }
                }
                // Shows how you can preselect a value
                return ['output' => $out, 'selected' => $selected];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionKelurahan()
    {
        $out = [];
        if (isset($_POST['depdrop_all_params'])) {
            $parent_id = $_POST['depdrop_all_params']['KD_KECAMATAN'];
            $selected_id = $_POST['depdrop_all_params']['KD_KELURAHAN_SELECTED']; 
            $out = RefKelurahan::find()->select(["KD_KELURAHAN AS id, CONCAT('[', KD_KELURAHAN, '] ', NM_KELURAHAN) AS name"])->where(['KD_KECAMATAN'=>$parent_id])->asArray()->all();
            return \yii\helpers\Json::encode(['output' => $out, 'selected' => $selected_id]);
        }
    
        return \yii\helpers\Json::encode(['output' => '', 'selected' => '']);        
    }    
    
    public function actionBlok()
    {
        if(isset($_POST['depdrop_all_params'])){
            $KD_KECAMATAN = $_POST['depdrop_all_params']['KD_KECAMATAN'];
            $KD_KELURAHAN = $_POST['depdrop_all_params']['KD_KELURAHAN'];
            $selected_id = $_POST['depdrop_all_params']['KD_BLOK_SELECTED']; 
            $out = \app\models\Spop::find()->select("KD_BLOK AS id, KD_BLOK AS name")->where(['KD_KECAMATAN'=>$KD_KECAMATAN,'KD_KELURAHAN'=>$KD_KELURAHAN])->distinct()->asArray()->all();
            return \yii\helpers\Json::encode(['output' => $out, 'selected' => $selected_id]);
        }
        return \yii\helpers\Json::encode(['output' => '', 'selected' => '']);
    }
    
    public function actionMaxurut($KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = \app\models\Spop::find()->select("KD_BLOK AS id, KD_BLOK AS name")->where(['KD_KECAMATAN'=>$KD_KECAMATAN,'KD_KELURAHAN'=>$KD_KELURAHAN,'KD_BLOK'=>$KD_BLOK])->max('NO_URUT') + 1;
        return $out;
    }
     
}
