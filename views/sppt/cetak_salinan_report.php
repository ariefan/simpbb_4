<?php

$this->title = "Salinan SPPT ".$data_objek['KD_PROPINSI'].$data_objek['KD_DATI2'].$data_objek['KD_KECAMATAN'].$data_objek['KD_KELURAHAN'].$data_objek['KD_BLOK'].$data_objek['NO_URUT'].$data_objek['KD_JNS_OP'];
use yii\web\View;
use app\models\Konfigurasi;

$konfigurasi = new Konfigurasi();
?>


<div class="row">
	<div class="col-xs-12">
	  <div class="col-xs-2"><center><img src="image/logo.png" width="40px" style="padding: 2px;"/></center></div>
	  <div class="col-xs-10" style="font-size:16px">
	  	<b>
		  PEMERINTAH <?= $konfigurasi->kabupaten_kop ?><br />
		  <?= $konfigurasi->instansi_kop ?></b>
	  </div>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-xs-12">

	<center><h3><strong>SALINAN</strong></h3>SURAT PEMBERITAHUAN PAJAK TERHUTANG<br/>PAJAK BUMI DAN BANGUNAN TAHUN <?= $tahun ?><br/><strong>NOP = <?php echo $data_objek['KD_PROPINSI'].'.'.$data_objek['KD_DATI2'].'.'.$data_objek['KD_KECAMATAN'].'.'.$data_objek['KD_KELURAHAN'].'.'.$data_objek['KD_BLOK'].'.'.$data_objek['NO_URUT'].'.'.$data_objek['KD_JNS_OP']; ?></strong></center>
	</div>
</div>

<br/>


<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-5">
		<h5><strong>LETAK OBJEK PAJAK</strong></h5>
		<?= $data_objek['JALAN_OP'] ?><br/>
		RT <?= $data_objek['RT_OP'] ?> RW <?= $data_objek['RW_OP'] ?><br/>
		<?= $kecamatan[$data_objek['KD_KECAMATAN']] ?><br/>
		<?= $kelurahan[$data_objek['KD_KECAMATAN']][$data_objek['KD_KELURAHAN']] ?>
		BERAU
	</div>
	<div class="col-xs-5">
	<h5><strong>NAMA DAN ALAMAT WAJIB PAJAK</strong></h5>
		<?= $data_sppt['NM_WP_SPPT'] ?><br/>
		<?= $data_sppt['JLN_WP_SPPT'] ?><br/>
		RT <?= $data_sppt['RT_WP_SPPT'] ?> RW <?= $data_sppt['RW_WP_SPPT'] ?><br/>
		<?= $data_sppt['KELURAHAN_WP_SPPT'] ?><br/>
		BERAU
	</div>
</div>
<br/>
<div class="row">
	<div class="col-xs-12">
	<center>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>OBJEK PAJAK</th>
			<th>LUAS (M<sup>2</sup>)</th>
			<th>KELAS</th>
			<th>NJOP PER M<sup>2</sup> (Rp)</th>
			<th>TOTAL NJOP (Rp)</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td>BUMI</td>
				<td style="text-align:right"><?= number_format($data_sppt['LUAS_BUMI_SPPT'],0,'','.') ?></td>
				<td><?= $data_sppt['KD_KLS_TANAH'] ?></td>
				<td style="text-align:right"><?= number_format($data_sppt['NJOP_BUMI_SPPT']/$data_sppt['LUAS_BUMI_SPPT'],0,'','.') ?></td>
				<td style="text-align:right"><?= number_format($data_sppt['NJOP_BUMI_SPPT'],0,'','.') ?></td>
			</tr>
			<tr>
				<td>BANGUNAN</td>
				<td style="text-align:right"><?= number_format($data_sppt['LUAS_BNG_SPPT'],0,'','.') ?></td>
				<td><?= $data_sppt['KD_KLS_BNG'] ?></td>
				<td style="text-align:right"><?= $data_sppt['LUAS_BUMI_SPPT'] > 0 ? number_format($data_sppt['NJOP_BNG_SPPT']/$data_sppt['LUAS_BUMI_SPPT'],0,'','.') : 0 ?></td>
				<td style="text-align:right"><?= number_format($data_sppt['NJOP_BNG_SPPT'],0,'','.') ?></td>
			</tr>
			<tr style="text-align:right">
				<td colspan="4">NJOP Sebagai Dasar Pengenaan PBB</td>
				<td><?= number_format($data_sppt['NJOP_SPPT'],0,'','.') ?></td>
			</tr>
			<tr style="text-align:right">
				<td colspan="4">NJOPTKP (NJOP Tidak Kena Pajak)</td>
				<td><?= number_format($data_sppt['NJOPTKP_SPPT'],0,'','.') ?></td>
			</tr>
			<tr style="text-align:right">
				<td colspan="4">PBB TERHUTANG</td>
				<td><?= number_format($data_sppt['PBB_TERHUTANG_SPPT'],0,'','.') ?></td>
			</tr>
			<tr style="text-align:right">
				<td colspan="4">PBB HARUS BAYAR</td>
				<td><?= number_format($data_sppt['PBB_YG_HARUS_DIBAYAR_SPPT'],0,'','.') ?></td>
			</tr>
		</tbody>
	</table>
	</center>
	</div>
</div>

<div class="row">
	<div class="col-xs-5">
	TGL JATUH TEMPO : <?= $data_sppt['TGL_JATUH_TEMPO_SPPT'] ?><br/>
	TEMPAT PEMBAYARAN : BANK KALTIM
	<br/>
	<br/>
	Telah Diverifikasi Sesuai dengan SPPT Aslinya dan bukti lunas PBB Tahun <?= $tahun ?>
	</div>
	<div class="col-xs-1"></div>
	<div class="col-xs-6">
	<p>
	<center>
	Tanjung Redeb, <?= date('d-M-Y') ?><br/>
	
	<?= $konfigurasi->ttd_salinan[$no_ttd]['JABATAN'] ?> <br/>
	<br/>
	<br/>
	<br/>
	<u><?= $konfigurasi->ttd_salinan[$no_ttd]['NAMA'] ?></u><br/>
	<?= $konfigurasi->ttd_salinan[$no_ttd]['NIP'] ?>

	</center>
	</p>
	</div>
</div>

<br/>


<?php

$this->registerJs("
	jQuery(document).ready(function() {
		window.print();
	});
",View::POS_END);

?>