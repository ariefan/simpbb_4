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



class TunggakanController extends Controller
{
	public function actionIndex()
	{
		if(!empty(Yii::$app->request->post())){
			$post_data = Yii::$app->request->post();
			$model_sppt = new Sppt();
			$model_pembayaran = new PembayaranSppt();
			if(isset($post_data['simpbb'])){
				$view = 'cetak_tunggakan_simpbb';
				$model_objek = new Spop();
			} else {
				$view = 'cetak_tunggakan';
				$model_objek = new DatObjekPajak();
			}
			
			$model_subjek = new DatSubjekPajak();
			$model_kelurahan = new RefKelurahan();

			$data_sppt = $model_sppt->getDataByNOPTahun(
				explode('.', $post_data['nop']),
				$post_data['tahun_awal'],
				$post_data['tahun_akhir']
			);

			if(empty($data_sppt)){
				return $this->render('index');
			}
			
			$data_pembayaran = $model_pembayaran->getDataByNOPTahun(
				explode('.', $post_data['nop']),
				$post_data['tahun_awal'],
				$post_data['tahun_akhir']
			);

			$data_pembayaran = $model_pembayaran->formatKeyTahun($data_pembayaran);

			$data_objek = $model_objek->getDataByNOP(
				explode('.', $post_data['nop'])
			);

			$data_subjek = $model_subjek->getDataBySubjekId(
				$data_objek[0]['SUBJEK_PAJAK_ID']
			);

			$kelurahan = $model_kelurahan->getKelurahanGroup();

			$show_all = true;
			if(isset($post_data['only_tunggakan'])){
				$show_all = false;
			}
			$this->layout = 'report';
			return $this->render($view,[
				'data_sppt'=>$data_sppt,
				'data_pembayaran'=>$data_pembayaran,
				'data_objek'=>$data_objek[0],
				'data_subjek'=>$data_subjek[0],
				'show_all'=>$show_all,
				'kelurahan'=>$kelurahan,
				'post_data'=>$post_data
			]);
		}
		return $this->render('index');
	}

}


?>