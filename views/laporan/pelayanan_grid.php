<?php

use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\Pjax;

$this->title = 'Laporan Pelayanan';

$gridColumns = [
	 ['class' => 'kartik\grid\SerialColumn'],
	 'NO_PELAYANAN',
	 'KD',
	 'TGL',
	 'NAMA_SEBELUM',
	 'NOP_SEBELUM',
	 'LT_SEBELUM',
	 'LB_SEBELUM',
	 'KETETAPAN_LAMA',
	 'NAMA_BARU',
	 'NOP_BARU',
	 'LT_BARU',
	 'LB_BARU',
	 'KETETAPAN_BARU',
	 'SELISIH_KETETAPAN',
	 'KETERANGAN',
	 'CATATAN',
];

echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'filename' => $this->title." ".date('d-m-Y'),
    // 'pdfLibraryPath' => '@vendor/kartik-v/mpdf',
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'filterModel'=> $searchModel,
    'responsive'=>true,
    'hover'=>true,
    'pjax'=>true,
]);


?>