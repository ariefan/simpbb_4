<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RL MILIK RSUD WONOSARI
 */
class Rl extends Model
{
	public $jenis_laporan = [
		'laporan_pembayaran' => 'Laporan Pembayaran'
	];


	public function getHasilLaporan($report_name,$start_date,$end_date)
	{        
        if($report_name=="laporan_pembayaran"){
            $sql = $this->laporanPembayaran($start_date,$end_date);

        }

        $connection = Yii::$app->db;
        $command = $connection->createCommand($sql);     
        return $command->queryAll();

    }

    public function getLaporanPembayaran()
    {

    }



}