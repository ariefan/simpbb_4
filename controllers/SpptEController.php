<?php

namespace app\controllers;

use Yii;
use app\models\SpptE;
use app\models\SpptESearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
/**
 * SpptEController implements the CRUD actions for SpptE model.
 */
class SpptEController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $enableCsrfValidation = false;

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
                        'actions' => ['index', 'view', 'create','delete', 'update', 'proses', 'stat', 'send','verifikasi','verifikasi-semua','unduh-verifikasi','sync-email','sync-tgl-bayar','verifikasi-form'],
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
     * Lists all SpptE models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpptESearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel','dataProvider'));
    }

    public function actionProses()
    {
        $model = new \app\models\Spop();
        $model->KD_PROPINSI = '51';
        $model->KD_DATI2 = '71';

        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $p = $post_data;

            // if(isset($post_data['unduh']))
            // {
            //     # coba gabungkan
            //     $pdf = new Pdf(); // or new Pdf();
            //     $mpdf = $pdf->api; // fetches mpdf api
            //     $mpdf->enableImports = true;
            //     $data = \app\models\SpptE::getSpptEMaxCetak($p['Spop']['KD_PROPINSI'],$p['Spop']['KD_DATI2'],$p['Spop']['KD_KECAMATAN'],$p['Spop']['KD_KELURAHAN'],$p['tahun'],$p['pbb_start'],$p['pbb_end']);

            //     // echo '<pre>';
            //     // print_r($data);exit;
                
            //     foreach ($data as $key => $value) {
            //         $filepath = Yii::getAlias('@webroot/esppt/'.$value['FILE_SPPT']);
            //         if(file_exists($filepath)){
            //             $pagecount = $mpdf->setSourceFile($filepath);
            //             for ($i = 1; $i <= $pagecount; $i++) {
            //                  $mpdf->AddPage();
            //                  $tplId = $mpdf->ImportPage($i);
            //                  $mpdf->UseTemplate($tplId);
            //             }
            //         }
            //     }
            //     $f = $p['Spop']['KD_PROPINSI'].$p['Spop']['KD_DATI2'].$p['Spop']['KD_KECAMATAN'].$p['Spop']['KD_KELURAHAN'].$p['tahun'].$p['pbb_start'].$p['pbb_end'];
            //     echo $mpdf->Output($f.'.pdf', 'D'); // call the mpdf api output as needed
            // } 
            // elseif(isset($post_data['kalibrasi']))
            // {
                // print_r($p);exit;
                $KD_KELURAHAN = '';
                if(isset($p['Spop']['KD_KELURAHAN'])){
                    $KD_KELURAHAN = $p['Spop']['KD_KELURAHAN'];
                }

                $total = SpptE::getTotalSpptE($p['Spop']['KD_KECAMATAN'],$KD_KELURAHAN,$p['tahun'],$p['pbb_start'],$p['pbb_end']);

                if($total==0)
                    return "No";

                $this->generateMassal($p['Spop']['KD_PROPINSI'],$p['Spop']['KD_DATI2'],$p['Spop']['KD_KECAMATAN'],$KD_KELURAHAN,$p['tahun'],$p['pbb_start'],$p['pbb_end'],$p['reload_per']);

                
                $terbuat = SpptE::getDibuatSpptE($p['Spop']['KD_KECAMATAN'],$KD_KELURAHAN,$p['tahun'],$p['pbb_start'],$p['pbb_end']);

                if($total==0){
                    echo "0|0";
                } else {
                    echo "$terbuat|$total";
                }

                exit;
                
                // \Yii::$app->getSession()->setFlash('success', 'Berhasil Membuat SPPT Elektronik');


                
            // }
            
        }
        
        
        return $this->render('proses',compact('model'));
    }

    
    public function actionStat()
    {
        $g = Yii::$app->request->get();

        # FILTER
        $KD_KECAMATAN = $g['KD_KECAMATAN'];
        $KD_KELURAHAN = $g['KD_KELURAHAN'];
        $THN_PAJAK_SPPT = $g['tahun'];
        $PBB_START = $g['pbb_start'];
        $PBB_END = $g['pbb_end'];

        $total = SpptE::getTotalSpptE($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);
        $terbuat = SpptE::getDibuatSpptE($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);
        $terverifikasi_1 = SpptE::getTerverifikasi1($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);
        $terverifikasi_2 = SpptE::getTerverifikasi2($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);
        $terverifikasi_3 = SpptE::getTerverifikasi3($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);
        $terverifikasi = SpptE::getTerverifikasi($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);
        $ter_ttd = SpptE::getTerTerimaTtd($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);
        $ter_email = SpptE::getTerEmail($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END);

        return $this->renderPartial('stat',compact('total','terbuat','terverifikasi_1','terverifikasi_2','terverifikasi_3','terverifikasi','ter_ttd','ter_email'));
    }

    

    /**
     * Displays a single SpptE model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $THN_PAJAK_SPPT
     * @param string $EMAIL
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE)
    {
        
        $download = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE); 
        $path = Yii::getAlias('@webroot').'/esppt/'.$download->FILE_SPPT;

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, 'SPPT.pdf');
        } else {
            echo $path;
            exit;
        }
    }

    /**
     * Creates a new SpptE model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SpptE();

        if ($model->load(Yii::$app->request->post())) {
            $post_data = Yii::$app->request->post();

            $NOP = explode('.', $post_data['nop']);
            
            $model->KD_PROPINSI = $NOP[0];
            $model->KD_DATI2 = $NOP[1];
            $model->KD_KECAMATAN = $NOP[2];
            $model->KD_KELURAHAN = $NOP[3];
            $model->KD_BLOK = $NOP[4];
            $model->NO_URUT = $NOP[5];
            $model->KD_JNS_OP = $NOP[6];
            $model->EMAIL = Yii::$app->user->identity->email;
            $model->TGL_RECORD = date('Y-m-d H:i:s');

            $model->save();
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'THN_PAJAK_SPPT' => $model->THN_PAJAK_SPPT, 'EMAIL' => $model->EMAIL]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionGenerate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $EMAIL)
    {
        if(Yii::$app->user->identity->email==$EMAIL){
            $model_sppt = new \app\models\Sppt();
            // $model_objek = new DatObjekPajak();
            $model_objek = new \app\models\Spop();
            $model_kelurahan = new \app\models\RefKelurahan();
            $model_kecamatan = new \app\models\RefKecamatan();

            $data_sppt = $model_sppt->getDataByNOPTahun(
                [$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP],
                $THN_PAJAK_SPPT,
                $THN_PAJAK_SPPT
            );

            $data_objek = $model_objek->getDataByNOP(
                [$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP]
            );

            $kelurahan = $model_kelurahan->getKelurahanGroup();
            $kecamatan = $model_kecamatan->getKecamatanGroup();

            $content = $this->renderPartial('e_sppt',[
                'data_sppt'=>$data_sppt[0],
                'data_objek'=>$data_objek[0],
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'tahun'=>$THN_PAJAK_SPPT,
            ]);

            $filename = Yii::$app->security->generateRandomString(32).'.pdf';
            // $filename = 'SPPT.pdf';

            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'destination' => Pdf::DEST_FILE, 
                'filename' => Yii::getAlias('@webroot/esppt/'.$filename),
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '
                    .gvbr {page-break-after: always;}
                    h2,h3{text-align:center;font-weight: bold;}
                    .headlogo{text-align:center}
                    h2{font-size:17px}
                    h3{font-size:16px;margin-top:2px}
                    identitas{font-size:11px}
                    .nilai th{font-size:11px;}
                    .nilai td{font-size:10px;}
                    ', 
                 // set mPDF properties on the fly
                'options' => ['title' => 'e-SPPT'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>[''], 
                    'SetFooter'=>[''],
                ]
            ]);

            $pdf->render();

            $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT);

            $model->TGL_DIBUAT = date('Y-m-d H:i:s');
            $model->FILE_SPPT = $filename;
            $model->save();

            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'THN_PAJAK_SPPT' => $model->THN_PAJAK_SPPT, 'EMAIL' => $model->EMAIL]);
        } else {
            echo "Tidak Diizinkan";
            exit;
        }
    }



    public function generateMassal($f_prop,$f_dati2,$f_kec,$f_kel,$f_tahun,$f_pbb_start,$f_pbb_end,$limit)
    {
        $model_sppt = new \app\models\Sppt();
        // $model_objek = new DatObjekPajak();
        $model_objek = new \app\models\Spop();
        $model_kelurahan = new \app\models\RefKelurahan();
        $model_kecamatan = new \app\models\RefKecamatan();

        $kelurahan = $model_kelurahan->getKelurahanGroup();
        $kecamatan = $model_kecamatan->getKecamatanGroup();

        $sppt_e = SpptE::getSpptEMax($f_prop,$f_dati2,$f_kec,$f_kel,$f_tahun,$f_pbb_start,$f_pbb_end,$limit);

        $folder = Yii::$app->security->generateRandomString(10);
        $filepath = Yii::getAlias('@webroot/esppt/'.$folder);

        mkdir($filepath);

        foreach ($sppt_e as $key => $value) {
            $KD_PROPINSI = $value['KD_PROPINSI']; 
            $KD_DATI2 = $value['KD_DATI2'];
            $KD_KECAMATAN = $value['KD_KECAMATAN']; 
            $KD_KELURAHAN = $value['KD_KELURAHAN']; 
            $KD_BLOK = $value['KD_BLOK'];
            $NO_URUT = $value['NO_URUT'];
            $KD_JNS_OP = $value['KD_JNS_OP'];
            $THN_PAJAK_SPPT = $value['THN_PAJAK_SPPT'];
            $CETAK_KE = $value['CETAK_KE'];
            
            $data_sppt = $model_sppt->getDataByNOPTahun(
                [$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP],
                $THN_PAJAK_SPPT,
                $THN_PAJAK_SPPT
            );

            $data_objek = $model_objek->getDataByNOP(
                [$KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP]
            );


            $content = $this->renderPartial('e_sppt',[
                'data_sppt'=>$data_sppt[0],
                'data_objek'=>$data_objek[0],
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'tahun'=>$THN_PAJAK_SPPT,
            ]);

            $str = Yii::$app->security->generateRandomString(32);
            $save_file = $filepath.'/'.$str.'.pdf';
            // $filename = 'SPPT.pdf';

            $filename = $folder.'/'.$str.'.pdf';

            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'destination' => Pdf::DEST_FILE, 
                'filename' => $save_file,
                // your html content input
                'content' => $content,  
                'marginTop' => 10,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '
                    .gvbr {page-break-after: always;}
                    h2,h3{text-align:center;font-weight: bold;}
                    .headlogo{text-align:center}
                    h2{font-size:17px}
                    h3{font-size:16px;margin-top:2px}
                    identitas{font-size:11px}
                    .nilai th{font-size:11px;}
                    .nilai td{font-size:10px;}
                    ', 
                 // set mPDF properties on the fly
                'options' => ['title' => 'e-SPPT'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>[''], 
                    'SetFooter'=>[''],
                ]
            ]);

            $pdf->render();

            $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT,$CETAK_KE);

            $model->TGL_DIBUAT = date('Y-m-d H:i:s');
            $model->FILE_SPPT = $filename;
            $model->save();

        }
    }

    public function actionSend()
    {
        // if(Yii::$app->user->identity->email!=$EMAIL){
        //     echo "Tidak Diizinkan";
        //     exit;
        // }

        // $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $EMAIL);

        // $model->TGL_EMAIL = date('Y-m-d H:i:s');
        // $model->save();

        $message = Yii::$app->mailer->compose();
        $message->setFrom('pendapatan-noreply@denpasarkota.go.id')
                ->setTo('gunturbudiherwanto@gmail.com')
                ->setSubject('SPPT Elektronik')
                ->setTextBody('Terlampir adalah SPPT Elektronik')
                ->setHtmlBody('<b>Terlampir adalah SPPT Elektronik</b>');
        $message->attach(\yii\helpers\Url::to(Yii::getAlias('@web/esppt/ZPLSovsenn/MAyy-UV2gNE0W3af4OTmmDhr80Qf76bv.pdf'),true));
        $message->send();
        exit;
        return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'THN_PAJAK_SPPT' => $model->THN_PAJAK_SPPT, 'EMAIL' => $model->EMAIL]);
    }

    public function actionVerifikasi()
    {
        $id = Yii::$app->user->identity->id;
        $v = \app\models\SpptEVerifikator::find()->orWhere(['verifikator_1'=>$id])->orWhere(['verifikator_2'=>$id])->orWhere(['verifikator_3'=>$id])->asArray()->one();

        if(empty($v)){
            return 'Anda Tidak Berhak Verifikasi';
            exit;
        }

        $verifikator = intval(explode('_',array_keys($v,$id)[0])[1]);
        $searchModel = new SpptESearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $verifikator);

        return $this->render('verifikasi', compact('searchModel','dataProvider','verifikator'));
    }

    /**
     * Updates an existing SpptE model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $THN_PAJAK_SPPT
     * @param string $EMAIL
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE)->delete();

        \Yii::$app->getSession()->setFlash('success', 'SPPT Elektronik Berhasil Dihapus');

        return $this->redirect(['verifikasi']);
    }

    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'THN_PAJAK_SPPT' => $model->THN_PAJAK_SPPT, 'EMAIL' => $model->EMAIL]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SpptE model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $THN_PAJAK_SPPT
     * @param string $EMAIL
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionVerifikasiSemua($verifikator)
    {
        $nip = Yii::$app->user->identity->nip;

        SpptE::verifikasiLimit(500,$verifikator,$nip);

        \Yii::$app->getSession()->setFlash('success', 'Berhasil Melakukan Verifikasi');

        return $this->redirect(['verifikasi']);
    }

    public function actionUnduhVerifikasi($verifikator)
    {
        # coba gabungkan
        $pdf = new Pdf(); // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        $mpdf->enableImports = true;
        $data = SpptE::find()->andWhere(['not', ['TGL_DIBUAT' => null]])->andWhere(['TGL_VERIFIKASI_'.$verifikator => null])->andWhere(['not', ['FILE_SPPT' => null]])->limit(500)->asArray()->all();

        // echo '<pre>';
        // print_r($data);exit;
        $i = 0;
        foreach ($data as $key => $value) {
            $i++;
            $filepath = Yii::getAlias('@webroot/esppt/'.$value['FILE_SPPT']);
            if(file_exists($filepath)){
                $pagecount = $mpdf->setSourceFile($filepath);
                for ($i = 1; $i <= $pagecount; $i++) {
                     $mpdf->AddPage();
                     $tplId = $mpdf->ImportPage($i);
                     $mpdf->UseTemplate($tplId);
                }
            }
           
        }
        $f = 'SPPT_Verifikasi';
        echo $mpdf->Output($f.'.pdf', 'D');
         // call the mpdf api output as needed
        
    }

    public function actionSyncEmail()
    {
        SpptE::syncEmail();
        \Yii::$app->getSession()->setFlash('success', 'Sinkronisasi Email Berhasil');
        return $this->redirect(['index']);
    }

    public function actionSyncTglBayar()
    {
        SpptE::syncPembayaranTerakhir();
        \Yii::$app->getSession()->setFlash('success', 'Sinkronisasi Tanggal Pembayaran Terakhir Berhasil Dilakukan');
        return $this->redirect(['index']);
    }

    /**
     * Finds the SpptE model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @param string $THN_PAJAK_SPPT
     * @param string $EMAIL
     * @return SpptE the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP, $THN_PAJAK_SPPT, $CETAK_KE)
    {
        if (($model = SpptE::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP, 'THN_PAJAK_SPPT' => $THN_PAJAK_SPPT, 'CETAK_KE' => $CETAK_KE])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
