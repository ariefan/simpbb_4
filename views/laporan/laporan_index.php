<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Realisasi Kelurahan</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/realisasi-kelurahan']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Pelayanan</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/laporan-pelayanan']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">SK NJOP</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/sk-njop']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Informasi PBB</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/info-pbb']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Neraca KPP</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/neraca-kpp']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Neraca KPP (SUM)</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/neraca-kpp-summary']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Neraca BPK</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/neraca-bpk']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Neraca BPK (SUM)</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/neraca-bpk-summary']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	    
	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Penetapan</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/laporan-penetapan']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>

	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Validasi</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/validasi/index']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	    
	</div>	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Informasi Hasil Input Pelayanan</div>
		  <div class="panel-body">
		    <?= Html::a('Lihat', Url::to(['/cetak/hasil-input']) , ['class' => 'btn btn-success']) ?>
		  </div>
		</div>
	</div>	
</div>
