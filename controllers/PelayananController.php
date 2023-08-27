<?php

namespace app\controllers;

use Yii;
use app\models\Pelayanan;
use yii\helpers\ArrayHelper;
use app\models\StatusPelayanan;
use app\models\PelayananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * PelayananController implements the CRUD actions for Pelayanan model.
 */
class PelayananController extends Controller
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
        ];
    }

    /**
     * Lists all Pelayanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PelayananSearch();
        $status = ArrayHelper::map(StatusPelayanan::find()->orderBy('urutan')->asArray()->all(), 'id', 'nama');

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = $this->findModel($id);

            $pelayanan = ['Pelayanan' => current(Yii::$app->request->post('Pelayanan'))];
            if ($model->load($pelayanan)) {
                if ($model->STATUS_PELAYANAN == 2) {
                    $model->TGL_MASUK_PENILAI = date('Y-m-d H:i:s');
                    $model->NIP_MASUK_PENILAI = Yii::$app->user->identity->username;
                } elseif ($model->STATUS_PELAYANAN == 4) {
                    $model->TGL_SELESAI = date('Y-m-d H:i:s');
                    $model->NIP_SELESAI = Yii::$app->user->identity->username;
                } elseif ($model->STATUS_PELAYANAN == 5) {
                    $model->TGL_TERKONFIRMASI_WP = date('Y-m-d H:i:s');
                    $model->NIP_TERKONFIRMASI_WP = Yii::$app->user->identity->username;
                } elseif ($model->STATUS_PELAYANAN == 3) {
                    $model->TGL_PENETAPAN = date('Y-m-d H:i:s');
                    $model->NIP_PENETAPAN = Yii::$app->user->identity->username;
                } elseif ($model->STATUS_PELAYANAN == 6) {
                    $model->TGL_BERKAS_DITUNDA = date('Y-m-d H:i:s');
                    $model->NIP_BERKAS_DITUNDA = Yii::$app->user->identity->username;
                }

                $model->save();

                if (isset($pelayanan['Pelayanan']['STATUS_PELAYANAN'])) {
                    return Json::encode(['output' => $status[$model->STATUS_PELAYANAN], 'message' => '']);
                } else {
                    return Json::encode(['output' => $model->KETERANGAN_BERKAS, 'message' => '']);
                }
            }
            return Json::encode(['output' => '', 'message' => 'Gagal']);
        }
        return $this->render('index', compact('searchModel', 'dataProvider', 'status'));
    }

    /**
     * Displays a single Pelayanan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pelayanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pelayanan();
        $dok_pelayanan = \app\models\RefDokumenPelayanan::find()->asArray()->all();

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
            // echo($p['Pelayanan']['KECAMATAN']);exit;
            $m_kec = \app\models\RefKecamatan::find()->where(['KD_KECAMATAN' => $p['Pelayanan']['KECAMATAN']])->one();
            $m_kel = \app\models\RefKelurahan::find()->where(['KD_KECAMATAN' => $p['Pelayanan']['KECAMATAN'], 'KD_KELURAHAN' => $p['Pelayanan']['KELURAHAN']])->one();

            $model->KECAMATAN = $m_kec->NM_KECAMATAN;
            $model->KELURAHAN = $m_kel->NM_KELURAHAN;
            $model->save();
            foreach ($p['pelayanan_dokumen'] as $key => $value) {
                $m_dok = new \app\models\PelayananDokumen();
                $m_dok->pelayanan_id = $model->ID;
                $m_dok->dokumen_id = $key;
                $m_dok->save();
            }

            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            $model->TANGGAL_PELAYANAN = date('Y-m-d');
            $model->NO_PELAYANAN =  $model->getNoPelayanan();
            return $this->render('create', compact('model', 'dok_pelayanan'));
        }
    }

    /**
     * Updates an existing Pelayanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dok_pelayanan = \app\models\RefDokumenPelayanan::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'dok_pelayanan' => $dok_pelayanan
            ]);
        }
    }

    /**
     * Deletes an existing Pelayanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLaporan()
    {
        $model = new Pelayanan();

        if (!empty(Yii::$app->request->post())) {
            $p = Yii::$app->request->post();
            $data = $model->getLaporan($p);
            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [

                    'Pelayanan' => [   // Name of the excel sheet
                        'data' => $data,

                        // Set to `false` to suppress the title row
                        'titles' => [
                            'NO Pelayanan',
                            'Nama Pemohon',
                            'Tanggal Pelayanan',
                            'NOP',
                            'Jenis Pelayanan',
                            'Status Pelayanan',
                            'Keterangan',

                        ],

                        'formats' => [
                            // Either column name or 0-based column index can be used
                            //'C' => '#,##0.00',
                            //3 => 'dd/mm/yyyy hh:mm:ss',
                        ],

                        'formatters' => [
                            // Dates and datetimes must be converted to Excel format
                            // 3 => function ($value, $row, $data) {
                            //     return \PHPExcel_Shared_Date::PHPToExcel(strtotime($value));
                            // },
                        ],
                    ],

                ]
            ]);

            $file->send("Laporan Pelayanan.xlsx");
        } else {
            return $this->render('laporan', compact('model'));
        }
    }

    /**
     * Finds the Pelayanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pelayanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pelayanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
