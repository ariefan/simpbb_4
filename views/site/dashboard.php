

<div class="row">
<div class="col-md-12">
<?php
use miloschuman\highcharts\Highcharts;

if($target==0)
  $target = 1;

echo Highcharts::widget([
   'options' => [
      'chart' => ['type'=>'column'],
      'title' => ['text' => 'Pembayaran PBB'],
      'subtitle' => [
         'text' => 'Tahun '.$tahun
      ],
      'xAxis' => [
         'categories' => $kecamatan,
         'crosshair' => true
      ],
      'yAxis' => [
         'min' => 0,
         'title' => ['text' => 'Jumlah Bayar (Juta Rupiah)','align'=>'high'],
         'labels' => ['overflow'=>'justify']
      ],
      'legend'=> [
            'layout'=> 'vertical',
            'align'=> 'right',
            'verticalAlign'=> 'top',
            'x'=> -40,
            'y'=> 80,
            'floating'=> true,
            'borderWidth'=> 1,
            'shadow'=> true
        ],
        'tooltip' => [
            'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
            'pointFormat'=>'<tr><td style="color:{series.color};padding:0">{series.name}: </td><td style="padding:0"><b>{point.y} (Dalam Juta Rupiah)</b></td></tr>',
            'footerFormat'=> '</table>',
            'shared'=> true,
            'useHTML'=> true
        ],
        'plotOptions' => [
            'column' => [
                'pointPadding' => 0.2,
                'borderWidth' => 0
            ]
        ],
      'series' => [
         ['name' => 'Potensi', 'data' => $potensi],
         ['name' => 'Realisasi', 'data' => $realisasi],
      ]
   ],
   'htmlOptions'=>['id'=>'chart-pembayaran-rupiah']
]);
?>
</div>
</div>

<br/>
<div class="row">
   <div class="col-md-6">
      <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Potensi</span>
          <span class="info-box-number">Rp <?= number_format(array_sum($potensi)*1000000,0,'','.') ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
                Potensi Pajak Bumi dan Bangunan
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>

   </div>
   <div class="col-md-6">
      <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Target</span>
          <span class="info-box-number">Rp <?= number_format($target,0,'','.') ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
                Target Pajak Bumi dan Bangunan
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
   </div>


   <div class="col-md-4">
      <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Realisasi Murni</span>
          <span class="info-box-number">Rp <?= number_format(array_sum($realisasi)*1000000-$realisasi_tunggakan,0,'','.') ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= (array_sum($realisasi)*1000000 - $realisasi_tunggakan)/$target*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= (array_sum($realisasi)*1000000 - $realisasi_tunggakan)/$target*100 ?> % dari target
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
  </div>

  <div class="col-md-4">
      <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Realisasi Tunggakan</span>
          <span class="info-box-number">Rp <?= number_format($realisasi_tunggakan,0,'','.') ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
                Bagian dari Realisasi Total
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
  </div>
  <div class="col-md-4">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Realisasi Total</span>
          <span class="info-box-number">Rp <?= number_format(array_sum($realisasi)*1000000,0,'','.') ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= (array_sum($realisasi)*1000000)/$target*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= (array_sum($realisasi)*1000000)/$target*100 ?> % dari target
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>

  </div>

</div>

<div class="row">
  
</div>


<div class="row">
<div class="col-md-12">
<?php

echo Highcharts::widget([
   'options' => [
      'chart' => ['type'=>'column'],
      'title' => ['text' => 'Lembar SPPT'],
      'subtitle' => [
         'text' => 'Tahun '.$tahun
      ],
      'xAxis' => [
         'categories' => $kecamatan,
         'crosshair' => true
      ],
      'yAxis' => [
         'min' => 0,
         'title' => ['text' => 'Lembar SPPT','align'=>'high'],
         'labels' => ['overflow'=>'justify']
      ],
      'legend'=> [
            'layout'=> 'vertical',
            'align'=> 'right',
            'verticalAlign'=> 'top',
            'x'=> -40,
            'y'=> 80,
            'floating'=> true,
            'borderWidth'=> 1,
            'shadow'=> true
        ],
        'tooltip' => [
            'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
            'pointFormat'=>'<tr><td style="color:{series.color};padding:0">{series.name}: </td><td style="padding:0"><b>{point.y} (Ribu Lembar)</b></td></tr>',
            'footerFormat'=> '</table>',
            'shared'=> true,
            'useHTML'=> true
        ],
        'plotOptions' => [
            'column' => [
                'pointPadding' => 0.2,
                'borderWidth' => 0
            ]
        ],
      'series' => [
         ['name' => 'Lembar Total', 'data' => $lembar],
         ['name' => 'Lembar Lunas', 'data' => $lembar_lunas],
      ]
   ],
   'htmlOptions'=>['id'=>'chart-pembayaran-lembar']
]);
?>
</div>
</div>

<br/>
<div class="row">
  <div class="col-md-4">
      <div class="info-box bg-olive">
          <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total OP</span>
        <span class="info-box-number"><?= number_format(array_sum($lembar)*1000,0,'','.') ?></span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
            Jumlah SPPT
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>

  </div>

  <div class="col-md-4">
      <div class="info-box bg-olive">
          <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">OP Lunas</span>
        <span class="info-box-number"><?= number_format(array_sum($lembar_lunas)*1000,0,'','.') ?></span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
            Jumlah SPPT
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>

  </div>

  <div class="col-md-4">
      <div class="info-box bg-olive">
          <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">OP Belum Lunas</span>
        <span class="info-box-number"><?= number_format(array_sum($lembar)*1000-array_sum($lembar_lunas)*1000,0,'','.') ?></span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
            Jumlah SPPT
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>

  </div>


</div>