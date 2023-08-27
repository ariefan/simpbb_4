<?php
$this->title = "Catatan Pembayaran ".$data_objek['KD_PROPINSI'].$data_objek['KD_DATI2'].$data_objek['KD_KECAMATAN'].$data_objek['KD_KELURAHAN'].$data_objek['KD_BLOK'].$data_objek['NO_URUT'].$data_objek['KD_JNS_OP'];
use app\models\Sppt;
use yii\web\View;
use app\models\Konfigurasi;

$konfigurasi = new Konfigurasi();
?>

<div class="row">
	<div class="col-xs-12">
	  <div class="col-xs-2"><center><img src="image/logo.png" width="80px" style="padding: 2px;"/></center></div>
	  <div class="col-xs-10">
	  	<center><b>
		  PEMERINTAH <?= $konfigurasi->kabupaten_kop ?><br />
		  <?= $konfigurasi->instansi_kop ?></b>
		  <div style="font-size: 85%;"><?= $konfigurasi->alamat_kop ?></div>
		  <?= $konfigurasi->kabupaten_kop ?><br/>
		  website : <?= $konfigurasi->website_kop ?>
		</center>
	  </div>
	</div>
</div>
<div class="row">
  <div class="col-xs-12" style="font-size:12px"><br/>
	  <table class="table">
		<tr>
			<td style="min-width: 70px;">NOP</td>
			<td>:</td>
			<td><?php echo $data_objek['KD_PROPINSI'].'.'.$data_objek['KD_DATI2'].'.'.$data_objek['KD_KECAMATAN'].'.'.$data_objek['KD_KELURAHAN'].'.'.$data_objek['KD_BLOK'].'.'.$data_objek['NO_URUT'].'.'.$data_objek['KD_JNS_OP']; ?></td>
			
			<td>Luas Bumi (m<sup>2</sup>)</td>
			<td>:</td>
			<td><?php echo number_format($data_objek['TOTAL_LUAS_BUMI'], 0, "," , "." ); ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $data_subjek['NM_WP']; ?></td>
			<td>NJOP Bumi (m<sup>2</sup>) / Kelas</td>
			<td>:</td>
			<td><?php echo number_format($data_objek['NJOP_BUMI']/$data_objek['TOTAL_LUAS_BUMI'], 0, "," , "." ). ' / '.$data_sppt[count($data_sppt)-1]['KD_KLS_TANAH']; ?></td>
		</tr>
		<tr>
			<td>Alamat WP</td>
			<td>:</td>
			<td><?php echo $data_subjek['JALAN_WP'].' RT '. $data_subjek['RT_WP']. ' ' .$data_subjek['KELURAHAN_WP']; ?></td>
			<td>Luas Bangunan (m<sup>2</sup>)</td>
			<td>:</td>
			<td><?php echo number_format($data_objek['TOTAL_LUAS_BNG'], 0, "," , "." ); ?></td>
		</tr>
		<tr>
			<td>Alamat OP</td>
			<td>:</td>
			<td style="width: 250px;" ><?php echo $data_objek['JALAN_OP'].' RT '. $data_objek['RT_OP'].' '.$kelurahan[$data_objek['KD_KECAMATAN']][$data_objek['KD_KELURAHAN']] ?></td>
			<td>NJOP Bangunan (m<sup>2</sup>) / Kelas</td>
			<td>:</td>
			<td><?php if($data_objek['TOTAL_LUAS_BNG']>0) echo number_format($data_objek['NJOP_BNG']/$data_objek['TOTAL_LUAS_BNG'], 0, "," , "." ). ' / '.$data_sppt[count($data_sppt)-1]['KD_KLS_BNG']; ?></td>
		</tr>
	  </table>	  
	</div>
</div>
<div class="row">
	<div class="col-xs-12" style="font-size:12px">
		<table class="table table-bordered">
			<thead>
			<tr>
				<th>TAHUN</th>
				<th>NAMA</th>
				<th>POKOK PBB</th>
				<th>DENDA TERHUTANG</th>
				<th>JATUH TEMPO</th>
				<th>TOTAL TAGIHAN</th>
				<th>TGL BAYAR</th>
			</tr>
			</thead>
			<tbody>
				<?php 
				$TOTAL_POKOK = 0;
				$TOTAL_DENDA = 0;
				$TOTAL_TAGIHAN = 0;
				foreach ($data_sppt as $key => $value) { 
					$model_sppt = new Sppt();

					$DENDA_SPPT = isset($data_pembayaran[$value['THN_PAJAK_SPPT']]['DENDA_SPPT']) ? $data_pembayaran[$value['THN_PAJAK_SPPT']]['DENDA_SPPT'] : 0;
					$JML_BAYAR = isset($data_pembayaran[$value['THN_PAJAK_SPPT']]['JML_BAYAR']) ? $data_pembayaran[$value['THN_PAJAK_SPPT']]['JML_BAYAR'] : 0; 
					$TGL_BAYAR =  isset($data_pembayaran[$value['THN_PAJAK_SPPT']]['TGL_PEMBAYARAN_SPPT']) ? $data_pembayaran[$value['THN_PAJAK_SPPT']]['TGL_PEMBAYARAN_SPPT'] : 0; 
					
					$POKOK_BAYAR = $JML_BAYAR - $DENDA_SPPT;
					$TAGIHAN = $value['PBB_YG_HARUS_DIBAYAR_SPPT'] - $POKOK_BAYAR;
					if($TAGIHAN<0) $TAGIHAN = 0;
					$denda = 0;
					if($TAGIHAN>0){		
										
						/*
						 * PENYESUAIAN TANGGAL DI ORACLE
						 */
						$datePart = date_parse_from_format('d-M-y', $value['TGL_JATUH_TEMPO_SPPT']);
						if(empty($datePart['month'])){
							$tgl = explode('-', $value['TGL_JATUH_TEMPO_SPPT']);
							if($tgl[1]=='DES') $datePart['month'] = '12';
							if($tgl[1]=='OKT') $datePart['month'] = '10';
							if($tgl[1]=='MEI') $datePart['month'] = '05';
							if($tgl[1]=='AGU') $datePart['month'] = '08';
						}

						$denda = $model_sppt->hitungDenda($datePart,$value['PBB_YG_HARUS_DIBAYAR_SPPT']);
						$TOTAL_POKOK += $TAGIHAN;
						$TOTAL_DENDA += $denda;
						$TAGIHAN += $denda;
						$TOTAL_TAGIHAN += $TAGIHAN;
					}

					if(!$show_all && $TAGIHAN==0) continue;
				?>
				<tr>
				<td><?= $value['THN_PAJAK_SPPT'] ?></td>
				<td><?= $value['NM_WP_SPPT'] ?></td>
				<td style="text-align:right"><?= number_format($value['PBB_YG_HARUS_DIBAYAR_SPPT'], 0, "," , "." ) ?></td>
				<td style="text-align:right"><?= number_format($denda, 0, "," , "." ) ?></td>
				<td><?= $value['TGL_JATUH_TEMPO_SPPT'] ?></td>
				<td style="text-align:right"><?= number_format($TAGIHAN, 0, "," , "." ) ?></td>
				<td><?= $TGL_BAYAR ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
</div>
<div class="row">
	<div class="col-xs-12" style="font-size:12px">
		<table class="table table-bordered">
			<tr>			
				<th colspan="2"><center>TOTAL TAGIHAN</center></th>
			</tr>
			<tr>
				<th>Total Pokok</th>
				<td><?= number_format($TOTAL_POKOK, 0, "," , "." ) ?></td>
			</tr>
			<tr>
				<th>Total Denda</th>
				<td><?= number_format($TOTAL_DENDA, 0, "," , "." ) ?></td>
			</tr>
			<tr>
				<th>Total</th>
				<td><?= number_format($TOTAL_TAGIHAN, 0, "," , "." ) ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-xs-8">
		Catatan:<br/>

		<ul>
			<li>Untuk Mengetahui Tagihan PBB bisa dilakukan pada Website http://pbb.beraukab.go.id</li>
		</ul>

	</div>
	<div class="col-xs-4" style="font-size:12px">
		<center>
		<table>
			<tr>
				<th style="text-align:center">Tanjung Redeb, <?= date('d-M-y') ?></th>
			</tr>
			<tr>
				<th style="text-align:center">Petugas Penerima</th>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<th style="text-align:center"><?= Yii::$app->user->identity->real_name ?></th>
			</tr>
			
		</table>
		</center>
	</div>
</div>
</div>

<?php

$this->registerJs("
	jQuery(document).ready(function() {
		window.print();
	});
",View::POS_END);

?>