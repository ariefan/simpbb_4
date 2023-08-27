<?php

namespace app\controllers;

use app\models\DatJpb2;
use app\models\DatJpb3;
use app\models\DatJpb4;
use app\models\DatJpb5;
use app\models\DatJpb6;
use app\models\DatJpb7;
use app\models\DatJpb8;
use app\models\DatJpb9;
use app\models\DatJpb12;
use app\models\DatJpb13;
use app\models\DatJpb14;
use app\models\DatJpb15;
use app\models\DatJpb16;
use app\models\DatOpBangunan;
use app\models\DatOpBangunanSearch;
use app\models\DatFasilitasBangunan;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DatOpBangunanController implements the CRUD actions for DatOpBangunan model.
 */
class DatOpBangunanController extends Controller
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
     * Lists all DatOpBangunan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatOpBangunanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DatOpBangunan model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param integer $NO_BNG
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        return $this->render('view', [
            'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG),
        ]);
    }

    /**
     * Creates a new DatOpBangunan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { 
        $model = new DatOpBangunan();
        $model_jpb2 = new DatJpb2();
        $model_jpb3 = new DatJpb3();
        $model_jpb4 = new DatJpb4();
        $model_jpb5 = new DatJpb5();
        $model_jpb6 = new DatJpb6();
        $model_jpb7 = new DatJpb7();
        $model_jpb8 = new DatJpb8();
        $model_jpb9 = new DatJpb9();
        $model_jpb12 = new DatJpb12();
        $model_jpb13 = new DatJpb13();
        $model_jpb14 = new DatJpb14();
        $model_jpb15 = new DatJpb15();
        $model_jpb16 = new DatJpb16();
        $model_fasilitas = new DatFasilitasBangunan();

        $model->KD_PROPINSI = '51';
        $model->KD_DATI2 = '71';
        $model->KD_JNS_OP = '0';
        $model->NO_BNG = '1';
        $model->LUAS_BNG = 0;
        $model->JML_LANTAI_BNG = 1;
        $model->TGL_PENDATAAN_BNG = date('Y-m-d');
        $model->TGL_PEMERIKSAAN_BNG = date('Y-m-d');
        $model->TGL_PEREKAMAN_BNG = date('Y-m-d');
        $model->NIP_PENDATA_BNG = Yii::$app->user->identity->nip;
        $model->NIP_PEMERIKSA_BNG = Yii::$app->user->identity->nip;
        $model->NIP_PEREKAM_BNG = Yii::$app->user->identity->nip;
        $model->NILAI_SISTEM_BNG = 0;
        $model->NILAI_INDIVIDU = 0;
        $model->AKTIF = 1;
        
        $fasilitas;
        for ($i=1; $i <= 45; $i++) { 
            $fasilitas[str_pad($i, 2, "0", STR_PAD_LEFT)] = 0;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_jpb2 = new DatJpb2();
            $model_jpb3 = new DatJpb3();
            $model_jpb4 = new DatJpb4();
            $model_jpb5 = new DatJpb5();
            $model_jpb6 = new DatJpb6();
            $model_jpb7 = new DatJpb7();
            $model_jpb8 = new DatJpb8();
            $model_jpb9 = new DatJpb9();
            $model_jpb12 = new DatJpb12();
            $model_jpb13 = new DatJpb13();
            $model_jpb14 = new DatJpb14();
            $model_jpb15 = new DatJpb15();
            $model_jpb16 = new DatJpb16();

            $model_jpb2->load(Yii::$app->request->post());
            $model_jpb3->load(Yii::$app->request->post());
            $model_jpb4->load(Yii::$app->request->post());
            $model_jpb5->load(Yii::$app->request->post());
            $model_jpb6->load(Yii::$app->request->post());
            $model_jpb7->load(Yii::$app->request->post());
            $model_jpb8->load(Yii::$app->request->post());
            $model_jpb9->load(Yii::$app->request->post());
            $model_jpb12->load(Yii::$app->request->post());
            $model_jpb13->load(Yii::$app->request->post());
            $model_jpb14->load(Yii::$app->request->post());
            $model_jpb15->load(Yii::$app->request->post());
            $model_jpb16->load(Yii::$app->request->post());
            
            switch ($model->KD_JPB) {
                case '02':
                    if(!is_null($model_jpb2)) $model_jpb2->save();
                    break;
                case '03':
                    if(!is_null($model_jpb3)) $model_jpb3->save();
                    break;
                case '04':
                    if(!is_null($model_jpb4)) $model_jpb4->save();
                    break;
                case '05':
                    if(!is_null($model_jpb5)) $model_jpb5->save();
                    break;
                case '06':
                    if(!is_null($model_jpb6)) $model_jpb6->save();
                    break;
                case '07':
                    if(!is_null($model_jpb7)) $model_jpb7->save();
                    break;
                case '08':
                    if(!is_null($model_jpb8)) $model_jpb8->save();
                    break;
                case '09':
                    if(!is_null($model_jpb9)) $model_jpb9->save();
                    break;
                case '12':
                    if(!is_null($model_jpb12)) $model_jpb12->save();
                    break;
                case '13':
                    if(!is_null($model_jpb13)) $model_jpb13->save();
                    break;
                case '14':
                    if(!is_null($model_jpb14)) $model_jpb14->save();
                    break;
                case '15':
                    if(!is_null($model_jpb15)) $model_jpb15->save();
                    break;
                case '16':
                    if(!is_null($model_jpb16)) $model_jpb16->save();
                    break;
            }
            
            $model_fasilitas = DatFasilitasBangunan::findOne(['KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NO_BNG' => $model->NO_BNG]);
            if(!is_null($model_fasilitas)) $model_fasilitas->delete();
            foreach (Yii::$app->request->post()['fasilitas'] as $key => $value) {
                if($value > 0){
                    $model_fasilitas = new DatFasilitasBangunan();
                    $model_fasilitas->KD_PROPINSI = $model->KD_PROPINSI;
                    $model_fasilitas->KD_DATI2 = $model->KD_DATI2;
                    $model_fasilitas->KD_KECAMATAN = $model->KD_KECAMATAN;
                    $model_fasilitas->KD_KELURAHAN = $model->KD_KELURAHAN;
                    $model_fasilitas->KD_BLOK = $model->KD_BLOK;
                    $model_fasilitas->NO_URUT = $model->NO_URUT;
                    $model_fasilitas->KD_JNS_OP = $model->KD_JNS_OP;
                    $model_fasilitas->NO_BNG = $model->NO_BNG;
                    $model_fasilitas->KD_FASILITAS = (string)$key;
                    $model_fasilitas->JML_SATUAN = (int)$value;
                    $model_fasilitas->save();
                }
            }
            $nilai_sistem = Yii::$app->db->createCommand("SELECT `HITUNG_BNG`(
                '".$model->KD_PROPINSI."', 
                '".$model->KD_DATI2."', 
                '".$model->KD_KECAMATAN."', 
                '".$model->KD_KELURAHAN."', 
                '".$model->KD_BLOK."', 
                '".$model->NO_URUT."', 
                '".$model->KD_JNS_OP."', 
                '".$model->NO_BNG."', 
                '".$model->KD_JPB."', 
                '".$model->LUAS_BNG."', 
                '".$model->JML_LANTAI_BNG."', YEAR(NOW())) AS NILAI_SISTEM;")->queryAll()[0]['NILAI_SISTEM'];
            $model->NILAI_SISTEM_BNG = $nilai_sistem;
            $model->save();
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NO_BNG' => $model->NO_BNG]);
        }
        $kelas['KELAS_BANGUNAN'] = "-";
        $kelas['NJOP_BANGUNAN'] = 0;
        return $this->render('create', [
            'model' => $model,
            'model_jpb2' => $model_jpb2,
            'model_jpb3' => $model_jpb3,
            'model_jpb4' => $model_jpb4,
            'model_jpb5' => $model_jpb5,
            'model_jpb6' => $model_jpb6,
            'model_jpb7' => $model_jpb7,
            'model_jpb8' => $model_jpb8,
            'model_jpb9' => $model_jpb9,
            'model_jpb12' => $model_jpb12,
            'model_jpb13' => $model_jpb13,
            'model_jpb14' => $model_jpb14,
            'model_jpb15' => $model_jpb15,
            'model_jpb16' => $model_jpb16,
            'fasilitas' => $fasilitas,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Updates an existing DatOpBangunan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param integer $NO_BNG
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $this->layout = 'main_nobox';

        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb2 = $this->findModelJpb2($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb3 = $this->findModelJpb3($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb4 = $this->findModelJpb4($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb5 = $this->findModelJpb5($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb6 = $this->findModelJpb6($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb7 = $this->findModelJpb7($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb8 = $this->findModelJpb8($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb9 = $this->findModelJpb9($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb12 = $this->findModelJpb12($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb13 = $this->findModelJpb13($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb14 = $this->findModelJpb14($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb15 = $this->findModelJpb15($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_jpb16 = $this->findModelJpb16($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);
        $model_fasilitas = $this->findFasilitas($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG);

        $fasilitas;
        for ($i=1; $i <= 45; $i++) { 
            $fasilitas[str_pad($i, 2, "0", STR_PAD_LEFT)] = 0;
        }
        foreach ($model_fasilitas as $value) {
            $fasilitas[$value->KD_FASILITAS] = $value->JML_SATUAN;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(!is_null($model_jpb2)) $this->findModelJpb2($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb3)) $this->findModelJpb3($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb4)) $this->findModelJpb4($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb5)) $this->findModelJpb5($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb6)) $this->findModelJpb6($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb7)) $this->findModelJpb7($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb8)) $this->findModelJpb8($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb9)) $this->findModelJpb9($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb12)) $this->findModelJpb12($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb13)) $this->findModelJpb13($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb14)) $this->findModelJpb14($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb15)) $this->findModelJpb15($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            if(!is_null($model_jpb16)) $this->findModelJpb16($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();
            
            $model_jpb2 = is_null($model_jpb2) ? new DatJpb2() : $model_jpb2;
            $model_jpb3 = is_null($model_jpb3) ? new DatJpb3() : $model_jpb3;
            $model_jpb4 = is_null($model_jpb4) ? new DatJpb4() : $model_jpb4;
            $model_jpb5 = is_null($model_jpb5) ? new DatJpb5() : $model_jpb5;
            $model_jpb6 = is_null($model_jpb6) ? new DatJpb6() : $model_jpb6;
            $model_jpb7 = is_null($model_jpb7) ? new DatJpb7() : $model_jpb7;
            $model_jpb8 = is_null($model_jpb8) ? new DatJpb8() : $model_jpb8;
            $model_jpb9 = is_null($model_jpb9) ? new DatJpb9() : $model_jpb9;
            $model_jpb12 = is_null($model_jpb12) ? new DatJpb12() : $model_jpb12;
            $model_jpb13 = is_null($model_jpb13) ? new DatJpb13() : $model_jpb13;
            $model_jpb14 = is_null($model_jpb14) ? new DatJpb14() : $model_jpb14;
            $model_jpb15 = is_null($model_jpb15) ? new DatJpb15() : $model_jpb15;
            $model_jpb16 = is_null($model_jpb16) ? new DatJpb16() : $model_jpb16;

            if(!is_null($model_jpb2)) $model_jpb2->load(Yii::$app->request->post());
            if(!is_null($model_jpb3)) $model_jpb3->load(Yii::$app->request->post());
            if(!is_null($model_jpb4)) $model_jpb4->load(Yii::$app->request->post());
            if(!is_null($model_jpb5)) $model_jpb5->load(Yii::$app->request->post());
            if(!is_null($model_jpb6)) $model_jpb6->load(Yii::$app->request->post());
            if(!is_null($model_jpb7)) $model_jpb7->load(Yii::$app->request->post());
            if(!is_null($model_jpb8)) $model_jpb8->load(Yii::$app->request->post());
            if(!is_null($model_jpb9)) $model_jpb9->load(Yii::$app->request->post());
            if(!is_null($model_jpb12)) $model_jpb12->load(Yii::$app->request->post());
            if(!is_null($model_jpb13)) $model_jpb13->load(Yii::$app->request->post());
            if(!is_null($model_jpb14)) $model_jpb14->load(Yii::$app->request->post());
            if(!is_null($model_jpb15)) $model_jpb15->load(Yii::$app->request->post());
            if(!is_null($model_jpb16)) $model_jpb16->load(Yii::$app->request->post());
            
            $model_fasilitas = DatFasilitasBangunan::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
            if(!is_null($model_fasilitas)) $model_fasilitas->delete();
            foreach (Yii::$app->request->post()['fasilitas'] as $key => $value) {
                if($value > 0){
                    $model_fasilitas = new DatFasilitasBangunan();
                    $model_fasilitas->KD_PROPINSI = $model->KD_PROPINSI;
                    $model_fasilitas->KD_DATI2 = $model->KD_DATI2;
                    $model_fasilitas->KD_KECAMATAN = $model->KD_KECAMATAN;
                    $model_fasilitas->KD_KELURAHAN = $model->KD_KELURAHAN;
                    $model_fasilitas->KD_BLOK = $model->KD_BLOK;
                    $model_fasilitas->NO_URUT = $model->NO_URUT;
                    $model_fasilitas->KD_JNS_OP = $model->KD_JNS_OP;
                    $model_fasilitas->NO_BNG = $model->NO_BNG;
                    $model_fasilitas->KD_FASILITAS = (string)$key;
                    $model_fasilitas->JML_SATUAN = (int)$value;
                    $model_fasilitas->save();
                }
            }
            // Yii::$app->function->dd(Yii::$app->request->post()['fasilitas']);

            switch ($model->KD_JPB) {
                case '02':
                    if(!is_null($model_jpb2)) $model_jpb2->save();
                    break;
                case '03':
                    if(!is_null($model_jpb3)) $model_jpb3->save();
                    break;
                case '04':
                    if(!is_null($model_jpb4)) $model_jpb4->save();
                    break;
                case '05':
                    if(!is_null($model_jpb5)) $model_jpb5->save();
                    break;
                case '06':
                    if(!is_null($model_jpb6)) $model_jpb6->save();
                    break;
                case '07':
                    if(!is_null($model_jpb7)) $model_jpb7->save();
                    break;
                case '08':
                    if(!is_null($model_jpb8)) $model_jpb8->save();
                    break;
                case '09':
                    if(!is_null($model_jpb9)) $model_jpb9->save();
                    break;
                case '12':
                    if(!is_null($model_jpb12)) $model_jpb12->save();
                    break;
                case '13':
                    if(!is_null($model_jpb13)) $model_jpb13->save();
                    break;
                case '14':
                    if(!is_null($model_jpb14)) $model_jpb14->save();
                    break;
                case '15':
                    if(!is_null($model_jpb15)) $model_jpb15->save();
                    break;
                case '16':
                    if(!is_null($model_jpb16)) $model_jpb16->save();
                    break;
            }
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NO_BNG' => $model->NO_BNG]);
        }
            
        $model_jpb2 = is_null($model_jpb2) ? new DatJpb2() : $model_jpb2;
        $model_jpb3 = is_null($model_jpb3) ? new DatJpb3() : $model_jpb3;
        $model_jpb4 = is_null($model_jpb4) ? new DatJpb4() : $model_jpb4;
        $model_jpb5 = is_null($model_jpb5) ? new DatJpb5() : $model_jpb5;
        $model_jpb6 = is_null($model_jpb6) ? new DatJpb6() : $model_jpb6;
        $model_jpb7 = is_null($model_jpb7) ? new DatJpb7() : $model_jpb7;
        $model_jpb8 = is_null($model_jpb8) ? new DatJpb8() : $model_jpb8;
        $model_jpb9 = is_null($model_jpb9) ? new DatJpb9() : $model_jpb9;
        $model_jpb12 = is_null($model_jpb12) ? new DatJpb12() : $model_jpb12;
        $model_jpb13 = is_null($model_jpb13) ? new DatJpb13() : $model_jpb13;
        $model_jpb14 = is_null($model_jpb14) ? new DatJpb14() : $model_jpb14;
        $model_jpb15 = is_null($model_jpb15) ? new DatJpb15() : $model_jpb15;
        $model_jpb16 = is_null($model_jpb16) ? new DatJpb16() : $model_jpb16;

        $model->TGL_PEREKAMAN_BNG = date('Y-m-d');
        $model->NIP_PEREKAM_BNG = Yii::$app->user->identity->nip;
        
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
            SELECT KELAS_BANGUNAN, NJOP_BANGUNAN FROM kelas_bangunan WHERE :nilai_sistem / :luas BETWEEN NILAI_MINIMUM+0.01 AND NILAI_MAKSIMUM", 
            [':nilai_sistem' => $model->NILAI_SISTEM_BNG, ':luas' => $model->LUAS_BNG]);        
        $kelas = $command->queryAll()[0];
        
        return $this->render('update', [
            'model' => $model,
            'model_jpb2' => $model_jpb2,
            'model_jpb3' => $model_jpb3,
            'model_jpb4' => $model_jpb4,
            'model_jpb5' => $model_jpb5,
            'model_jpb6' => $model_jpb6,
            'model_jpb7' => $model_jpb7,
            'model_jpb8' => $model_jpb8,
            'model_jpb9' => $model_jpb9,
            'model_jpb12' => $model_jpb12,
            'model_jpb13' => $model_jpb13,
            'model_jpb14' => $model_jpb14,
            'model_jpb15' => $model_jpb15,
            'model_jpb16' => $model_jpb16,
            'fasilitas' => $fasilitas,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Deletes an existing DatOpBangunan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param integer $NO_BNG
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionKelas($NJOP)
    {
        return 0;
    }

    /**
     * Finds the DatOpBangunan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param integer $NO_BNG
     * @return DatOpBangunan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        if (($model = DatOpBangunan::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelJpb2($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb2::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb3($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb3::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb4($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb4::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb5($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb5::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb6($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb6::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb7($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb7::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb8($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb8::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb9($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb9::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb12($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb12::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb13($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb13::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb14($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb14::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb15($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb15::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findModelJpb16($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatJpb16::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG]);
        return $model;
    }

    protected function findFasilitas($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $NO_BNG)
    {
        $model = DatFasilitasBangunan::find()->where(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'NO_BNG' => $NO_BNG])->all();
        return $model;
    }
}
