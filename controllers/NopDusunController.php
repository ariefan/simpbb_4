<?php

namespace app\controllers;

use Yii;
use app\models\NopDusun;
use app\models\NopDusunSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\RefKelurahan;
use app\models\RefDusun;
use app\models\RefDati2;
use app\models\Spop;
use app\models\Sppt;
use yii\helpers\Json;

/**
 * NopDusunController implements the CRUD actions for NopDusun model.
 */
class NopDusunController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all NopDusun models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NopDusunSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NopDusun model.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     */
    public function actionView($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        return $this->render('view', [
            'model' => $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP),
        ]);
    }

    /**
     * Creates a new NopDusun model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionAssign()
    {

        if (!empty(Yii::$app->request->post())) {
            $p = Yii::$app->request->post();

            foreach ($p['nop'] as $key => $value) {
                $model = NopDusun::findOne(['KD_PROPINSI'=>substr($value,0,2),'KD_DATI2'=>substr($value,2,2),'KD_KECAMATAN'=>substr($value,4,3),'KD_KELURAHAN'=>substr($value,7,3),'KD_BLOK'=>substr($value,10,3),'NO_URUT'=>substr($value,13,4),'KD_JNS_OP'=>substr($value,17,1),'THN_PAJAK_SPPT'=>$p['NopDusun']['THN_PAJAK_SPPT']]);
                
                $model->KD_PROPINSI = substr($value,0,2);
                $model->KD_DATI2 = substr($value,2,2);
                $model->KD_KECAMATAN = substr($value,4,3);
                $model->KD_KELURAHAN = substr($value,7,3);
                $model->KD_BLOK = substr($value,10,3);
                $model->NO_URUT = substr($value,13,4);
                $model->KD_JNS_OP = substr($value,17,1);
                $model->THN_PAJAK_SPPT = $p['NopDusun']['THN_PAJAK_SPPT'];
                $model->STATUS = $p['NopDusun']['STATUS'];
                $model->USER_INPUT = Yii::$app->user->identity->username;
                $model->save();
            }
            return $this->redirect(['nop-dusun/index']);
        } else {
            $model = new NopDusun();
            $model->THN_PAJAK_SPPT = date('Y');
            return $this->render('assign', [
                'model' => $model,
            ]);
        }
    }


    public function actionCreate()
    {

        if (!empty(Yii::$app->request->post())) {
            $p = Yii::$app->request->post();

            foreach ($p['nop'] as $key => $value) {
                $model = NopDusun::findOne(['KD_PROPINSI'=>substr($value,0,2),'KD_DATI2'=>substr($value,2,2),'KD_KECAMATAN'=>substr($value,4,3),'KD_KELURAHAN'=>substr($value,7,3),'KD_BLOK'=>substr($value,10,3),'NO_URUT'=>substr($value,13,4),'KD_JNS_OP'=>substr($value,17,1),'THN_PAJAK_SPPT'=>$p['NopDusun']['THN_PAJAK_SPPT']]);
                if($model===null){
                    $model = new NopDusun();
                }
                $model->KD_PROPINSI = substr($value,0,2);
                $model->KD_DATI2 = substr($value,2,2);
                $model->KD_KECAMATAN = substr($value,4,3);
                $model->KD_KELURAHAN = substr($value,7,3);
                $model->KD_BLOK = substr($value,10,3);
                $model->NO_URUT = substr($value,13,4);
                $model->KD_JNS_OP = substr($value,17,1);
                $model->THN_PAJAK_SPPT = $p['NopDusun']['THN_PAJAK_SPPT'];
                if(!empty($p['NopDusun']['KD_DUSUN']))
                  $model->KD_DUSUN = $p['NopDusun']['KD_DUSUN'];
                $model->STATUS = $p['NopDusun']['STATUS'];
                $model->USER_INPUT = Yii::$app->user->identity->username;
                $model->save();
            }
            return $this->redirect(['nop-dusun/index']);
        } else {
            $model = new NopDusun();
            $model->THN_PAJAK_SPPT = date('Y');
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionImport(){
        if (!empty(Yii::$app->request->post())) {
            $p = Yii::$app->request->post();
            $t_ref = $p['tahun_ref'];
            $t_imp = $p['tahun_import'];
            $connection = Yii::$app->db;
            $q = "INSERT IGNORE INTO `nop_dusun`
                  SELECT `KD_PROPINSI`,
                         `KD_DATI2`,
                         `KD_KECAMATAN`,
                         `KD_KELURAHAN`,
                         `KD_BLOK`,
                         `NO_URUT`,
                         `KD_JNS_OP`,
                         $t_imp,
                         `KD_DUSUN`,
						 sppt.NM_WP_SPPT,sppt.PBB_YG_HARUS_DIBAYAR_SPPT,
                         'Belum Tersampaikan',
                         '',
                         ''
                  FROM nop_dusun JOIN sppt 
					USING (`KD_PROPINSI`,
                         `KD_DATI2`,
                         `KD_KECAMATAN`,
                         `KD_KELURAHAN`,
                         `KD_BLOK`,
                         `NO_URUT`,
                         `KD_JNS_OP`,THN_PAJAK_SPPT)
                  WHERE THN_PAJAK_SPPT = $t_ref
            ";
            $command = $connection->createCommand($q);
            $r = $command->execute();
            return $this->redirect(['index']);

        } else {
            return $this->render('import');
        }


    }

    /**
     * Updates an existing NopDusun model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     */
    public function actionUpdate($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        $model = $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NopDusun model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return mixed
     */
    public function actionDelete($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        $this->findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)->delete();

        return $this->redirect(['index']);
    }

    public function actionKelurahan()
    {
        $KD_KECAMATAN = Yii::$app->request->post()['depdrop_parents'][0];
        $out = RefKelurahan::find()->select("KD_KELURAHAN AS id,NM_KELURAHAN AS name")->where(['KD_KECAMATAN'=>$KD_KECAMATAN])->asArray()->all();

        echo Json::encode(['output'=>$out, 'selected'=>'']);
        return;
    }

    public function actionDusun()
    {
        if(!empty(Yii::$app->request->post()['depdrop_parents'][0])){
            $KD_KECAMATAN = Yii::$app->request->post()['depdrop_parents'][0];
            $KD_KELURAHAN = Yii::$app->request->post()['depdrop_parents'][1];

            $out = RefDusun::find()->select("KD_DUSUN AS id,NM_DUSUN AS name")->where(['KD_KECAMATAN'=>$KD_KECAMATAN,'KD_KELURAHAN'=>$KD_KELURAHAN])->asArray()->all();

            echo Json::encode(['output'=>$out, 'selected'=>'']);
        } else {
            echo Json::encode(['output'=>'', 'selected'=>'']);
        }
        return;
    }

    public function actionBlok()
    {
        if(!empty(Yii::$app->request->post()['depdrop_parents'][0])){
            $dati2 = RefDati2::find()->asArray()->all();
            $KD_KECAMATAN = Yii::$app->request->post()['depdrop_parents'][0];
            $KD_KELURAHAN = Yii::$app->request->post()['depdrop_parents'][1];

            $out = Spop::find()->select("KD_BLOK AS id,KD_BLOK AS name")->where(['KD_PROPINSI'=>$dati2[0]['KD_PROPINSI'],'KD_DATI2'=>$dati2[0]['KD_DATI2'],'KD_KECAMATAN'=>$KD_KECAMATAN,'KD_KELURAHAN'=>$KD_KELURAHAN])->distinct()->asArray()->all();

            echo Json::encode(['output'=>$out, 'selected'=>'']);
        } else {
            echo Json::encode(['output'=>'', 'selected'=>'']);
        }
        
        return;
    }

    public function actionNop(){
        $thn = date('Y');
        $g = Yii::$app->request->get();
        if(empty($g['KD_KECAMATAN']) || empty($g['KD_KELURAHAN'])) return "KECAMATAN DAN KELURAHAN HARUS ADA";
        $dati2 = RefDati2::find()->asArray()->all();

        $q = Sppt::find()->where(['KD_PROPINSI'=>$dati2[0]['KD_PROPINSI'],'KD_DATI2'=>$dati2[0]['KD_DATI2'],'KD_KECAMATAN'=>$g['KD_KECAMATAN'],'KD_KELURAHAN'=>$g['KD_KELURAHAN']]);

        if(!empty($g['KD_BLOK'])) $q->andWhere(['KD_BLOK'=>$g['KD_BLOK']]);
        $q->andWhere(['THN_PAJAK_SPPT'=>$thn]);
        $q->andWhere('PBB_YG_HARUS_DIBAYAR_SPPT BETWEEN '.$g['PBB_MIN'].' AND '.$g['PBB_MAX']);
        $data = $q->asArray()->all();

        return $this->renderAjax('daf_nop',compact('data'));
    }

    public function actionNopDusun(){
        $thn = date('Y');
        $g = Yii::$app->request->get();
        if(empty($g['KD_KECAMATAN']) || empty($g['KD_KELURAHAN']) || empty($g['KD_DUSUN'])) return "KECAMATAN, KELURAHAN, DAN DUSUN HARUS ADA";
        $dati2 = RefDati2::find()->asArray()->all();

        $q = NopDusun::find()->where(['KD_PROPINSI'=>$dati2[0]['KD_PROPINSI'],'KD_DATI2'=>$dati2[0]['KD_DATI2'],'KD_KECAMATAN'=>$g['KD_KECAMATAN'],'KD_KELURAHAN'=>$g['KD_KELURAHAN'],'KD_DUSUN'=>$g['KD_DUSUN']]);

        if(!empty($g['KD_BLOK'])) $q->andWhere(['KD_BLOK'=>$g['KD_BLOK']]);
        $q->andWhere(['THN_PAJAK_SPPT'=>$thn]);
        $q->andWhere('PBB_YG_HARUS_DIBAYAR_SPPT BETWEEN '.$g['PBB_MIN'].' AND '.$g['PBB_MAX']);
        $data = $q->asArray()->all();

        return $this->renderAjax('daf_nop',compact('data'));
    }

    public function actionExport()
    {
        if(!empty(Yii::$app->request->post())){
            set_time_limit(0);
            $post_data = Yii::$app->request->post();
            $dati2 = RefDati2::find()->asArray()->one();
            $KD_PROPINSI = $dati2['KD_PROPINSI']; 
            $KD_DATI2 = $dati2['KD_DATI2']; 
            $KD_KECAMATAN = $post_data['NopDusun']['KD_KECAMATAN'];
            $KD_KELURAHAN = $post_data['NopDusun']['KD_KELURAHAN'];
            $STATUS = $post_data['NopDusun']['STATUS'];
            $KD_DUSUN = $post_data['NopDusun']['KD_DUSUN'];
            $WHERE_STATUS = empty($STATUS) ? "" : " AND STATUS='$STATUS' ";
            $WHERE_DUSUN = empty($KD_DUSUN) ? "" : " AND KD_DUSUN='$KD_DUSUN' ";
            $TAHUN = $post_data['NopDusun']['THN_PAJAK_SPPT'];
            $PBB_MIN = $post_data['PBB_MIN'];
            $PBB_MAX = $post_data['PBB_MAX'];
            $connection = Yii::$app->db;
            $q = "SELECT 
                  CONCAT(
                    `KD_PROPINSI`,
                    '.',
                    `KD_DATI2`,
                    '.',
                    `KD_KECAMATAN`,
                    '.',
                    `KD_KELURAHAN`,
                    '.',
                    `KD_BLOK`,
                    '.',
                    `NO_URUT`,
                    '.',
                    `KD_JNS_OP`
                  ) AS NOP,
                  sppt.NM_WP_SPPT AS NAMA,
                  CONCAT(
                    IFNULL(JALAN_OP, ''),
                    ' ',
                    IFNULL(`BLOK_KAV_NO_OP`, ''),
                    ' ',
                    IFNULL(`KELURAHAN_OP`, '')
                  ) AS `ALAMAT OBJEK PAJAK`,
                  NM_DUSUN AS LINGKUNGAN,
                  LUAS_BUMI_SPPT AS `LUAS BUMI`,
                  LUAS_BNG_SPPT AS `LUAS BANGUNAN`,
                  sppt.PBB_YG_HARUS_DIBAYAR_SPPT AS PBB,
                  `STATUS` AS KETERANGAN
                FROM
                  nop_dusun 
                  JOIN sppt USING (
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`,
                      `THN_PAJAK_SPPT`
                    ) 
                  JOIN spop USING (
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`
                    ) 
                  JOIN ref_dusun USING (
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_DUSUN`
                    ) 
                WHERE KD_PROPINSI=$KD_PROPINSI AND KD_DATI2=$KD_DATI2 AND
                KD_KECAMATAN=$KD_KECAMATAN AND KD_KELURAHAN=$KD_KELURAHAN 
                $WHERE_STATUS $WHERE_DUSUN AND 
                sppt.PBB_YG_HARUS_DIBAYAR_SPPT BETWEEN '$PBB_MIN' AND '$PBB_MAX'
                AND THN_PAJAK_SPPT = $TAHUN";
            $command = $connection->createCommand($q);
            $r = $command->queryAll();

            $max_row = count($r);
            $sheet = 0;
           
            $kolom = ['NOP','NAMA','ALAMAT OBJEK PAJAK','LINGKUNGAN','LUAS BUMI','LUAS BANGUNAN','PBB','KETERANGAN'];
            $objPHPExcel = new \PHPExcel();
            $objPHPExcel->setActiveSheetIndex($sheet);
            $objPHPExcel->getActiveSheet()->setTitle('TAHUN '.$TAHUN);

            foreach($kolom as $key=>$val){
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($key,1,$val); 
            }
                    
            foreach ($r as $k=>$v) {
                foreach($kolom as $k_c=>$v_c){
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($k_c,$k+2,$v[$v_c]);
                }
            }              
            
            header('Content-Type: application/vnd.ms-excel');
            $filename = 'LAPORAN PENYAMPAIAN SPPT TAHUN '.$TAHUN.'.xls';
            header('Content-Disposition: attachment;filename='.$filename .' ');
            header('Cache-Control: max-age=0');
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }
        $model = new NopDusun();
        return $this->render('export',compact('model'));
    }

    

    /**
     * Finds the NopDusun model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $KD_PROPINSI
     * @param string $KD_DATI2
     * @param string $KD_KECAMATAN
     * @param string $KD_KELURAHAN
     * @param string $KD_BLOK
     * @param string $NO_URUT
     * @param string $KD_JNS_OP
     * @return NopDusun the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($KD_PROPINSI, $KD_DATI2, $KD_KECAMATAN, $KD_KELURAHAN, $KD_BLOK, $NO_URUT, $KD_JNS_OP)
    {
        if (($model = NopDusun::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
