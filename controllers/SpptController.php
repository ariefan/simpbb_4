<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Sppt;
use app\models\PembayaranSppt;
use app\models\DatObjekPajak;
use app\models\Spop;
use app\models\DatSubjekPajak;
use app\models\RefKelurahan;
use app\models\RefKecamatan;

class SpptController extends Controller
{
	public function actionIndex()
	{
		if(!empty(Yii::$app->request->post())){
			$post_data = Yii::$app->request->post();
			$model_sppt = new Sppt();
			// $model_objek = new DatObjekPajak();
			$model_objek = new Spop();
			$model_kelurahan = new RefKelurahan();
			$model_kecamatan = new RefKecamatan();

			$data_sppt = $model_sppt->getDataByNOPTahun(
				explode('.', $post_data['nop']),
				$post_data['tahun'],
				$post_data['tahun']
			);

			$data_objek = $model_objek->getDataByNOP(
				explode('.', $post_data['nop'])
			);

			$kelurahan = $model_kelurahan->getKelurahanGroup();
			$kecamatan = $model_kecamatan->getKecamatanGroup();
			if(empty($data_sppt)){
				return $this->render('cetak_salinan');
			}
			$this->layout = 'report';
			return $this->render('cetak_salinan_report',[
				'data_sppt'=>$data_sppt[0],
				'data_objek'=>$data_objek[0],
				'kecamatan' => $kecamatan,
				'kelurahan' => $kelurahan,
				'tahun'=>$post_data['tahun'],
				'no_ttd' => $post_data['ttd']	
			]);
		}
		return $this->render('cetak_salinan');
    }

    public function actionSend()
    {
    	Yii::$app->mailer->compose()
		    ->setFrom('gunturmail23@gmail.com')
		    ->setTo('gunturbudi@mail.ugm.ac.id')
		    ->setSubject('Message subject')
		    ->setTextBody('Plain text content')
		    ->setHtmlBody('<b>HTML content</b>')
		    ->send();
    }
    
	public function actionCetakmasal()
	{
		if(!empty(Yii::$app->request->post())){
			$post = Yii::$app->request->post();
			$model_sppt = new Sppt();
			$model_objek = new DatObjekPajak();
			$model_kelurahan = new RefKelurahan();
			$model_kecamatan = new RefKecamatan();

			$data_sppt = $model_sppt->getDataByNOPTahun(
				explode('.', $post_data['nop']),
				$post_data['tahun'],
				$post_data['tahun']
			);

			$data_objek = $model_objek->getDataByNOP(
				explode('.', $post_data['nop'])
			);

			$kelurahan = $model_kelurahan->getKelurahanGroup();
			$kecamatan = $model_kecamatan->getKecamatanGroup();
			if(empty($data_sppt)){
				return $this->render('cetak_salinan');
			}
			$this->layout = 'report';
			return $this->render('cetak_salinan_report',[
				'data_sppt'=>$data_sppt[0],
				'data_objek'=>$data_objek[0],
				'kecamatan' => $kecamatan,
				'kelurahan' => $kelurahan,
				'tahun'=>$post_data['tahun'],
				'no_ttd' => $post_data['ttd']	
			]);
		}
		return $this->render('cetak_salinan');
	}


}


?>