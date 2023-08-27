<?php

namespace app\controllers;

use Yii;
use app\models\PencatatanEmail;
use app\models\PencatatanEmailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PencatatanEmailController implements the CRUD actions for PencatatanEmail model.
 */
class PencatatanEmailController extends Controller
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
     * Lists all PencatatanEmail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PencatatanEmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PencatatanEmail model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $NM_WP_SPPT
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT)
    {
        return $this->render('view', [
            'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT),
        ]);
    }

    /**
     * Creates a new PencatatanEmail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PencatatanEmail();
        if ($model->load(Yii::$app->request->post())) {
            $p = Yii::$app->request->post();
            $nop = explode('.', $p['nop']);
            
            $model->KD_PROPINSI = $nop[0];
            $model->KD_DATI2 = $nop[1];
            $model->KD_KECAMATAN = $nop[2];
            $model->KD_KELURAHAN = $nop[3];
            $model->KD_BLOK = $nop[4];
            $model->NO_URUT = $nop[5];
            $model->KD_JNS_OP = $nop[6];
            $model->PENDATA = Yii::$app->user->identity->id;
            $model->TOKEN = Yii::$app->security->generateRandomString(32);

            $model->save();
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NM_WP_SPPT' => $model->NM_WP_SPPT]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PencatatanEmail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $NM_WP_SPPT
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NM_WP_SPPT' => $model->NM_WP_SPPT]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionSend($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT);

        $message = Yii::$app->mailer->compose();
        
        $tautan = \yii\helpers\Url::toRoute(['v/validate','token'=>$model->TOKEN], true);

        $message->setFrom('pendapatan-noreply@denpasarkota.go.id')
                ->setTo($model->EMAIL)
                ->setSubject('Selamat Datang di i-PBB Kota Denpasar')
                ->setHtmlBody('<b>Selamat Datang di akun i-PBB Kota Denpasar, silahkan klik tautan berikut untuk melakuakan validasi Email Anda: </b> <a href="'.$tautan.'">Klik Disini</a>');

        $message->send();
        
        return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NM_WP_SPPT' => $model->NM_WP_SPPT]);
    }

    /**
     * Deletes an existing PencatatanEmail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $NM_WP_SPPT
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetNop()
    {
        $nop = $_GET['nop'];
        $model = new \app\models\Spop();
        $model_subjek = new \app\models\DatSubjekPajak();
        $spop = $model->getDataByNOP(explode('.', $nop));
        if(!empty($spop)){
            $s = $model_subjek->getDataBySubjekId($spop[0]['SUBJEK_PAJAK_ID']);

            if(!empty($s))
                return $s[0]['NM_WP'];
        }

        return '';
    }

    /**
     * Finds the PencatatanEmail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $NM_WP_SPPT
     * @return PencatatanEmail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NM_WP_SPPT)
    {
        if (($model = PencatatanEmail::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NM_WP_SPPT' => $NM_WP_SPPT])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
