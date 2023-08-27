<?php

namespace app\controllers;

use Yii;
use app\models\Spop;
use app\models\SpopSearch;
use app\models\DatSubjekPajak;
use app\models\DatSubjekPajakSearch;
use app\models\RefPropinsi;
use app\models\RefDati2;
use app\models\RefKecamatan;
use app\models\RefKelurahan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SpopController implements the CRUD actions for Spop model.
 */
class SpopController extends Controller
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
     * Lists all Spop models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Spop model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        return $this->render('view', [
            'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP),
        ]);
    }

    public function actionDetail($NOP)
    {
        $KD_PROPINSI = substr($NOP, 0, 2);
        $KD_DATI2 = substr($NOP, 2, 2);
        $KD_KECAMATAN = substr($NOP, 4, 3);
        $KD_KELURAHAN = substr($NOP, 7, 3);
        $KD_BLOK = substr($NOP, 10, 3);
        $NO_URUT = substr($NOP, 13, 4);
        $KD_JNS_OP = substr($NOP, 17, 1);
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
            SELECT * FROM spop LEFT JOIN 
            dat_subjek_pajak USING(SUBJEK_PAJAK_ID) LEFT JOIN 
                (SELECT KD_PROPINSI, KD_DATI2, KD_KECAMATAN, KD_KELURAHAN, KD_BLOK, NO_URUT, KD_JNS_OP, SUM(LUAS_BNG) LUAS_BNG, COUNT(1) JML_BNG 
                FROM dat_op_bangunan 
                WHERE
                KD_PROPINSI = :KD_PROPINSI AND
                KD_DATI2 = :KD_DATI2 AND
                KD_KECAMATAN = :KD_KECAMATAN AND
                KD_KELURAHAN = :KD_KELURAHAN AND
                KD_BLOK = :KD_BLOK AND
                NO_URUT = :NO_URUT AND
                KD_JNS_OP = :KD_JNS_OP
                GROUP BY KD_PROPINSI, KD_DATI2, KD_KECAMATAN, KD_KELURAHAN, KD_BLOK, NO_URUT, KD_JNS_OP) dat_op_bangunan
            USING(KD_PROPINSI, KD_DATI2, KD_KECAMATAN, KD_KELURAHAN, KD_BLOK, NO_URUT, KD_JNS_OP)
            WHERE
            KD_PROPINSI = :KD_PROPINSI AND
            KD_DATI2 = :KD_DATI2 AND
            KD_KECAMATAN = :KD_KECAMATAN AND
            KD_KELURAHAN = :KD_KELURAHAN AND
            KD_BLOK = :KD_BLOK AND
            NO_URUT = :NO_URUT AND
            KD_JNS_OP = :KD_JNS_OP
            GROUP BY KD_PROPINSI, KD_DATI2, KD_KECAMATAN, KD_KELURAHAN, KD_BLOK, NO_URUT, KD_JNS_OP", 
            [
                ':KD_PROPINSI' => substr($NOP, 0, 2),
                ':KD_DATI2' => substr($NOP, 2, 2),
                ':KD_KECAMATAN' => substr($NOP, 4, 3),
                ':KD_KELURAHAN' => substr($NOP, 7, 3),
                ':KD_BLOK' => substr($NOP, 10, 3),
                ':NO_URUT' => substr($NOP, 13, 4),
                ':KD_JNS_OP' => substr($NOP, 17, 1),
            ]);
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(count($command->queryAll()) == 0)
            $result = null;
        else
            $result = $command->queryAll()[0];
        return $result;
    }

    /**
     * Creates a new Spop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Spop();
        $model_wp = new DatSubjekPajak();

        $propinsis = ArrayHelper::map(RefPropinsi::find()->all(),'KD_PROPINSI', 'NM_PROPINSI');

        $model->KD_PROPINSI = '51';
        $model->KD_DATI2 = '71';
        $model->KD_KECAMATAN = '010';
        $model->KD_KELURAHAN = '001';
        $model->KD_BLOK = '001';
        $model->KD_JNS_OP = '0';
        $model->LUAS_BUMI = 0;
        $model->NILAI_SISTEM_BUMI = 0;
        $model->TGL_PENDATAAN_OP = date('Y-m-d');
        $model->TGL_PEMERIKSAAN_OP = date('Y-m-d');
        $model->NIP_PENDATA = Yii::$app->user->identity->nip;
        $model->NIP_PEMERIKSA_OP = Yii::$app->user->identity->nip;
        
        //Yii::$app->function->dd($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            $wp = $this->findModelWp($model->SUBJEK_PAJAK_ID);
            if(!is_null($wp)) $wp->delete();
            $model_wp->load(Yii::$app->request->post());
            $model_wp->SUBJEK_PAJAK_ID = $model->SUBJEK_PAJAK_ID;
            $model_wp->save();
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP]);
        }
        $kelas['KELAS_BUMI'] = "-";
        $kelas['NJOP_BUMI'] = 0;
        return $this->render('create', [
            'model' => $model,
            'model_wp' => $model_wp,
            'propinsis' => $propinsis,
            'action' => 'add',
            'kelas' => $kelas,
        ]);
    }

    /**
     * Updates an existing Spop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP);
        $model_wp = $this->findModelWp($model->SUBJEK_PAJAK_ID);
        
        $propinsis = ArrayHelper::map(RefPropinsi::find()->all(),'KD_PROPINSI', 'NM_PROPINSI');

        if ($model->load(Yii::$app->request->post()) && $model->save() && $model_wp->load(Yii::$app->request->post()) && $model_wp->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP]);
        }

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
            SELECT KELAS_BUMI, NJOP_BUMI FROM kelas_bumi WHERE :nilai_sistem / :luas BETWEEN NILAI_MINIMUM+0.01 AND NILAI_MAKSIMUM", 
            [':nilai_sistem' => $model->NILAI_SISTEM_BUMI, ':luas' => $model->LUAS_BUMI]);        
        $kelas = $command->queryAll()[0];
        
        return $this->render('update', [
            'model' => $model,
            'model_wp' => $model_wp,
            'propinsis' => $propinsis,
            'action' => 'edit',
            'kelas' => $kelas,
        ]);
    }

    /**
     * Deletes an existing Spop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Spop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return Spop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        if (($model = Spop::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelWp($SUBJEK_PAJAK_ID)
    {
        if (($model_wp = DatSubjekPajak::findOne(['SUBJEK_PAJAK_ID' => $SUBJEK_PAJAK_ID])) !== null) {
            return $model_wp;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
