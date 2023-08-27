<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Dbkb;
use app\models\Pelayanan;
use app\models\SpptKhusus;
use app\models\PembayaranSppt;
use app\models\Validasi;
use app\models\Sppt;
use app\models\TempNeracaBpk;
use app\models\TempLaporanPelayanan;
use app\models\TempLaporanPelayananSearch;

class LaporanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDbkb()
    {
        if(!empty(Yii::$app->request->post())){
            $this->layout = 'report';
            $post_data = Yii::$app->request->post();
            $model = new Dbkb();
            $data_std['1.1'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.1');
            $data_std['1.2'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.2');
            $data_std['1.3'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.3');
            $data_std['1.4'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.4');
            $data_std['1.5'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.5');

            $data_jpb['1.6'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.6'));
            $data_jpb['1.7'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.7'));
            $data_jpb['1.8'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.8'));
            $data_jpb['1.9'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.9'));
            $data_jpb['1.10'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.10'));
            $data_jpb['1.11'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.11'));
            $data_jpb['1.12'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.12'));
            $data_jpb['1.13'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.13'));
            $data_jpb['1.14'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'1.14'));
            $data_jpb['1.15'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.15');
            
            $data_jpb2['1.17'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.17');
            $data_jpb2['1.18'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.18');
            $data_jpb2['1.19'] = $model->getQueryLaporanDbkb($post_data['tahun'],'1.19');

            $data_jpb3['2.1'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'2.1'));
            $data_jpb3['2.2'] = $model->shapeArray($model->getQueryLaporanDbkb($post_data['tahun'],'2.2'));

            $data_jpb4['2.3'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.3');
            $data_jpb4['2.4'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.4');
            $data_jpb4['2.5'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.5');
            $data_jpb4['2.6'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.6');
            $data_jpb4['2.7'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.7');
            $data_jpb4['2.8'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.8');
            $data_jpb4['2.9'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.9');
            $data_jpb4['2.10'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.10');
            $data_jpb4['2.11'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.11');
            $data_jpb4['2.12'] = $model->getQueryLaporanDbkb($post_data['tahun'],'2.12');

            $data_jpb5['3.1'] = $model->getQueryLaporanDbkb($post_data['tahun'],'3.1');
            $data_jpb5['3.2'] = $model->getQueryLaporanDbkb($post_data['tahun'],'3.2');
            $data_jpb5['3.3'] = $model->getQueryLaporanDbkb($post_data['tahun'],'3.3');
            $data_jpb5['3.4'] = $model->getQueryLaporanDbkb($post_data['tahun'],'3.4');

            if(empty($data_std['1.1'])){
                return $this->render('dbkb');
            }

            //$this->layout = 'report';
            return $this->render('cetak_dbkb',[
                'data_std'=>$data_std,
                'data_jpb'=>$data_jpb,
                'data_jpb2'=>$data_jpb2,
                'data_jpb3'=>$data_jpb3,
                'data_jpb4'=>$data_jpb4,
                'data_jpb5'=>$data_jpb5,
                'tahun'=>$post_data['tahun']    
            ]);
        }
        return $this->render('dbkb');
    }

    public function actionKeberatan()
    {
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Pelayanan();
            $data = $model->laporanKeberatan('','','2015-01-01','2015-12-31');
            $this->layout = 'report';
            return $this->render('report_keberatan',[
                'data' => $data
            ]);
        }
        return $this->render('keberatan');
    }

    public function actionPelayananGrid()
    {
        $searchModel = new TempLaporanPelayananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pelayanan_grid', compact('searchModel','dataProvider'));
    }

    public function actionLaporanPelayanan()
    {
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $data = $model->laporanPelayanan($post_data['tahun_awal'],$post_data['jns_pelayanan'],$post_data['start_date'],$post_data['end_date']);
            return $this->redirect(['/laporan/pelayanan-grid']);
        }
        return $this->render('laporan_pelayanan');
    }

    public function actionSkNjop(){
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data = $model->getSkNjop($nop,$post_data['tahun']);
            $pelayanan = Pelayanan::find()->where(['no_pelayanan'=>$post_data['no_pelayanan']])->one();
            if(empty($pelayanan) or empty($data)){
                Yii::$app->getSession()->setFlash('error', 'Tidak Ada Data');
                return $this->redirect(['sk-njop']);
            }
            //print_r($post_data);exit;
            $report_file = 'cetak_sknjop';
            if(isset($post_data['baru'])){
                $report_file = 'cetak_sknjop_baru';
            }
            //echo '<pre>';print_r($data);exit;
            $this->layout = 'report';
            return $this->render($report_file,[
                'data' => $data,
                'no_surat' => $post_data['no_surat'],
                'ttd' => isset($post_data['ttd']) ? true : false,
                'no_pelayanan' => $post_data['no_pelayanan'],
                'tanggal_pelayanan' => $pelayanan['TANGGAL_PELAYANAN'],
                'tahun' => $post_data['tahun']
            ]);
        }
        return $this->render('sknjop');
    }

    public function actionInfoPbb(){
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data = $model->getSkNjop($nop,$post_data['tahun']);
            $pelayanan = Pelayanan::find()->where(['no_pelayanan'=>$post_data['no_pelayanan']])->one();
            if(empty($pelayanan) or empty($data)){
                Yii::$app->getSession()->setFlash('error', 'Tidak Ada Data');
                return $this->redirect(['info-pbb']);
            }
            //print_r($post_data);exit;
            $report_file = 'cetak_info_pbb';
            //echo '<pre>';print_r($data);exit;
            $this->layout = 'report';
            return $this->render($report_file,[
                'data' => $data,
                'no_pelayanan' => $post_data['no_pelayanan'],
                'tanggal_pelayanan' => $pelayanan['TANGGAL_PELAYANAN'],
                'tahun' => $post_data['tahun']
            ]);
        }
        return $this->render('info_pbb');
    }

    public function actionNeracaBpk()
    {
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $model->neracaBpk($post_data['tahun_awal'],$post_data['tahun_akhir'],$post_data['per_tanggal']);
            return $this->redirect(['/site/neraca']);
        }
        
        return $this->render('neraca_bpk');
    }

    public function actionNeracaKpp()
    {
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $model->neracaKpp($post_data['tahun_awal'],$post_data['tahun_akhir'],$post_data['per_tanggal']);
            return $this->redirect(['/site/neraca-kpp']);
        }
        
        return $this->render('neraca_kpp');
    }

    public function actionNeracaKppSummary()
    {
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $data = $model->neracaKppSummary($post_data['tahun_awal'],$post_data['tahun_akhir'],$post_data['per_tanggal'],$post_data['tahun_neraca']);
            return $this->render('cetak_neraca_kpp_summary',compact('data','post_data'));
        }
        
        return $this->render('neraca_kpp_summary');
    }

    public function actionNeracaBpkSummary()
    {
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $data = $model->neracaBpkSummary($post_data['tahun_awal'],$post_data['tahun_akhir'],$post_data['per_tanggal']);
            return $this->render('cetak_neraca_bpk_summary',compact('data','post_data'));
        }
        
        return $this->render('neraca_bpk_summary');
    }

    public function actionNeracaBpkXls()
    {
        set_time_limit(0);
        $max_row = TempNeracaBpk::find()->count();
        $sheet = 0;
       
        $r = TempNeracaBpk::find()->limit(1000)->asArray()->all();
        $kolom = array_keys($r[0]);
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->setTitle('Neraca BPK');

        foreach($kolom as $key=>$val){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($key,1,$val); 
        }
                
        foreach ($r as $k=>$v) {
            foreach($kolom as $k_c=>$v_c){
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($k_c,$k+2,$v[$v_c]);
            }
        }              
        
        header('Content-Type: application/vnd.ms-excel');
        $filename = "Neraca BPK ".date("d-m-Y-His").".xls";
        header('Content-Disposition: attachment;filename='.$filename .' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    public function actionNeracaBpkCsv()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');

        $output = fopen('php://output', 'w');
        $r = TempNeracaBpk::find()->limit(30000)->asArray()->all();
        $kolom = array_keys($r[0]);
        fputcsv($output, $kolom);
        foreach ($r as $key => $value) {
            fputcsv($output, $value);
        }
    }

    public function actionSpptkhusus($KD_PROPINSI=null,$KD_DATI2=null,$KD_KECAMATAN=null,$KD_KELURAHAN=null,$KD_BLOK=null,$NO_URUT=null,$KD_JNS_OP=null){

        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $mv = SpptKhusus::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP]);
            
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data1 = $model->getNopNow($nop);
            $data2 = $model->getValidasi($nop,$post_data['tahun_awal'],$post_data['tahun_akhir'],$post_data['cut_tanggal']);
            //print_r($post_data);exit;
            $report_file = 'cetak_spptkhusus';
            //echo '<pre>';print_r($data);exit;
            $this->layout = 'report';
            return $this->render($report_file,[
                'data1' => $data1,
                'data2' => $data2,
                'tahun_awal' => $post_data['tahun_awal'],
                'tahun_akhir' => $post_data['tahun_akhir']
            ]);
        }
        $nop = $KD_PROPINSI.$KD_DATI2.$KD_KECAMATAN.$KD_KELURAHAN.$KD_BLOK.$NO_URUT.$KD_JNS_OP;
        return $this->render('spptkhusus',compact('nop'));
    }

    public function actionValidasi($KD_PROPINSI=null,$KD_DATI2=null,$KD_KECAMATAN=null,$KD_KELURAHAN=null,$KD_BLOK=null,$NO_URUT=null,$KD_JNS_OP=null){

        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $mv = Validasi::findOne(['KD_PROPINSI' => $KD_PROPINSI, 'KD_DATI2' => $KD_DATI2, 'KD_KECAMATAN' => $KD_KECAMATAN, 'KD_KELURAHAN' => $KD_KELURAHAN, 'KD_BLOK' => $KD_BLOK, 'NO_URUT' => $NO_URUT, 'KD_JNS_OP' => $KD_JNS_OP]);
            
            if($mv !== null){
                $mv->IS_CETAK = 1;
                $a = $mv->save();
            }
            
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data1 = $model->getNopNow($nop);
            $data2 = $model->getValidasi($nop,$post_data['tahun_awal'],$post_data['tahun_akhir'],$post_data['cut_tanggal']);
            //print_r($post_data);exit;
            $report_file = 'cetak_validasi';
            //echo '<pre>';print_r($data);exit;
            $this->layout = 'report';
            return $this->render($report_file,[
                'data1' => $data1,
                'data2' => $data2,
                'tahun_awal' => $post_data['tahun_awal'],
                'tahun_akhir' => $post_data['tahun_akhir']
            ]);
        }
        $nop = $KD_PROPINSI.$KD_DATI2.$KD_KECAMATAN.$KD_KELURAHAN.$KD_BLOK.$NO_URUT.$KD_JNS_OP;
        return $this->render('validasi',compact('nop'));
    }
    
    public function actionHasilInput(){
        $post_data = Yii::$app->request->post();
        if(!empty($post_data)){
            $model = new Sppt();
            $nop = str_replace('.', '', $post_data['nop']);
            $data = $model->getSkNjop($nop,$post_data['tahun']);
            $pelayanan = Pelayanan::find()->where(['no_pelayanan'=>$post_data['no_pelayanan']])->one();
            if(empty($pelayanan) or empty($data)){
                Yii::$app->getSession()->setFlash('error', 'Tidak Ada Data');
                return $this->redirect(['hasil-input']);
            }
            //print_r($post_data);exit;
            $report_file = 'cetak_hasil_input';
            if(isset($post_data['baru'])){
                $report_file = 'cetak_hasil_input_baru';
            }
            //echo '<pre>';print_r($data);exit;
            $this->layout = 'report';
            return $this->render($report_file,[
                'data' => $data,
                'no_pelayanan' => $post_data['no_pelayanan'],
                'tanggal_pelayanan' => $pelayanan['TANGGAL_PELAYANAN'],
                'tahun' => $post_data['tahun']
            ]);
        }
        return $this->render('hasil_input');
    }   

    public function actionRealisasiKelurahan(){
        $model = new PembayaranSppt();
        $post_data = Yii::$app->request->post();
        $data = [];
        if(!empty($post_data)){
            $data = $model->realisasiPerKelurahan($post_data['tahun'],$post_data['pbb_min'],$post_data['pbb_max'],$post_data['tanggal_realisasi']);
            if($post_data['tombol']=='Cetak')
                return $this->render('realisasi_kelurahan_print',compact('data','post_data'));

        } 
        return $this->render('realisasi_kelurahan',compact('data'));
    }

    public function actionRealisasi(){
        $model = new PembayaranSppt();
        $post_data = Yii::$app->request->post();
        $data = [];
        if(!empty($post_data)){
            $data = $model->realisasiPerKelurahan($tgl_awal,$tgl_akhir,$tahun_awal,$tahun_akhir,$kd_kec,$kd_kel,$sektor);
            if($post_data['tombol']=='Cetak')
                return $this->render('realisasi_print',compact('data','post_data'));

        } 
        return $this->render('realisasi',compact('data','model'));
    }



}
