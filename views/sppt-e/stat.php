<div class="row">
	<div class="col-md-3">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total SPPT</span>
          <span class="info-box-number"><?= number_format($total,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
              Total SPPT 
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Terbuat e-SPPT</span>
          <span class="info-box-number"><?= number_format($terbuat,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= $total == 0 ? 0 : $terbuat/$total*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= $total == 0 ? 0 : number_format($terbuat/$total*100,2,',','.') ?>% Terbuat e-SPPT
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ter Verifikasi 1</span>
          <span class="info-box-number"><?= number_format($terverifikasi_1,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= $total == 0 ? 0 : $terverifikasi_1/$total*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= $total == 0 ? 0 : number_format($terverifikasi_1/$total*100,2,',','.') ?>% Verifikasi 1
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ter Verifikasi 2</span>
          <span class="info-box-number"><?= $total == 0 ? 0 : number_format($terverifikasi_2,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= $total == 0 ? 0 : $terverifikasi_2/$total*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= $total == 0 ? 0 : number_format($terverifikasi_2/$total*100,2,',','.') ?>% Verifikasi 2
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ter Verifikasi 3</span>
          <span class="info-box-number"><?= number_format($terverifikasi_3,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= $total == 0 ? 0 : $terverifikasi_3/$total*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= $total == 0 ? 0 : number_format($terverifikasi_3/$total*100,2,',','.') ?>% Verifikasi 3
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box bg-maroon">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ter Verifikasi</span>
          <span class="info-box-number"><?= number_format($terverifikasi,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= $total == 0 ? 0 : $terverifikasi/$total*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= $total == 0 ? 0 : number_format($terverifikasi/$total*100,2,',','.') ?>% Verifikasi Penuh
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box bg-purple">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ter TTD</span>
          <span class="info-box-number"><?= number_format($ter_ttd,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= $total == 0 ? 0 : $ter_ttd/$total*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= $total == 0 ? 0 : number_format($ter_ttd/$total*100,2,',','.') ?>% Ditandatangani
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box bg-teal">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ter Email</span>
          <span class="info-box-number"><?= number_format($ter_email,0,'','.') ?> Lembar</span>

          <div class="progress">
            <div class="progress-bar" style="width: <?= $total == 0 ? 0 : $ter_email/$total*100 ?>%"></div>
          </div>
          <span class="progress-description">
              <?= $total == 0 ? 0 : number_format($ter_email/$total*100,2,',','.') ?>% Email Dikirim
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
</div>

<h1></h1>