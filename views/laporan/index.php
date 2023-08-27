<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = "Laporan";
?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Realisasi Kelurahan</div>
            <?= Html::a('Lihat', Url::to(['/laporan/realisasi-kelurahan']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Pelayanan</div>
            <?= Html::a('Lihat', Url::to(['/laporan/laporan-pelayanan']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">SK NJOP</div>
            <?= Html::a('Lihat', Url::to(['/laporan/sk-njop']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Informasi PBB</div>
            <?= Html::a('Lihat', Url::to(['/laporan/info-pbb']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Neraca KPP</div>
            <?= Html::a('Lihat', Url::to(['/laporan/neraca-kpp']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Neraca KPP (SUM)</div>
            <?= Html::a('Lihat', Url::to(['/laporan/neraca-kpp-summary']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Neraca BPK</div>
            <?= Html::a('Lihat', Url::to(['/laporan/neraca-bpk']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Neraca BPK (SUM)</div>
            <?= Html::a('Lihat', Url::to(['/laporan/neraca-bpk-summary']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
        
    </div>  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Penetapan</div>
            <?= Html::a('Lihat', Url::to(['/laporan/laporan-penetapan']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>

    </div>  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Validasi</div>
            <?= Html::a('Lihat', Url::to(['/validasi/index']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
        
    </div>  
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-body">
          <div class="card-title">Informasi Hasil Input Pelayanan</div>
            <?= Html::a('Lihat', Url::to(['/laporan/hasil-input']) , ['class' => 'btn btn-success']) ?>
          </div>
        </div>
    </div>  
</div>
