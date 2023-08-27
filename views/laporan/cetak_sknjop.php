<?php

$this->title = "SK NJOP ".$data['KD_PROPINSI'].$data['KD_DATI2'].$data['KD_KECAMATAN'].$data['KD_KELURAHAN'].$data['KD_BLOK'].$data['NO_URUT'].$data['KD_JNS_OP'];

use yii\web\View;
use app\models\Konfigurasi;

$konfigurasi = new Konfigurasi();

function tgl_indo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;
}

function getBulan($bln){
	switch ($bln){ 
		case 1: return "Januari"; break;
		case 2: return "Februari"; break;
		case 3: return "Maret"; break;
		case 4: return "April"; break;
		case 5: return "Mei"; break;
		case 6: return "Juni"; break;
		case 7: return "Juli"; break;
		case 8: return "Agustus"; break;
		case 9: return "September"; break;
		case 10: return "Oktober"; break;
		case 11: return "November"; break;
		case 12: return "Desember"; break; 
	}
}


?>

<br/><br/><br/><br/><br/><br/>
<!--
<div class="row">
	<table style="font-size:14px;cellspacing=1;cellpadding=1;" border="0px" width="100%">
		<tr height='1px'><td align="center" rowspan="4" width="160px"><img src="image/logo.png" height="100px" width="110px" /></td><td align="center" style="font-size:22px; !important;font-family:'Times New Roman';font-weight: bold;">PEMERINTAH KOTA DENPASAR</td><td width="100px"></td></tr>
		<tr height='1px'><td align="center" style="font-size:22px;font-family:'Times New Roman';font-weight: bold;">BADAN PENDAPATAN DAERAH</td><td></td></tr>
		<tr height='1px'><td align="center" style="font-size:15px;font-family:'Times New Roman';">Jl. Letda Tantular No. 12 Denpasar</td><td></td></tr>
		<tr height='1px'><td align="center" style="font-size:15px;font-family:'Times New Roman';">Telp. (0361) 239079 / 239080 Fax. (0361) 261246</td><td></td></tr>
	</table>
	<hr style="min-width:100%; background-color:#000000 !important; height:2px; margin-top:5px !important; margin-bottom:7px !important;"/>
</div>
-->
<br/>
<div class="row">
	<div class="col-xs-12">
	<center>
		<p style="font-size:16px;margin:0;padding:0;font-family:tahoma;">SURAT KETERANGAN</p>
		<p style="font-size:14px;margin:0;padding:0;font-family:tahoma;">NOMOR : 973 / <?= $no_surat ?> / BPDKD</p>
	</center>
	</div>
</div>
<br/>
<div class="row">
	<p style="font-size:14px;margin:0;padding:0;font-family:tahoma;">Yang bertanda tangan dibawah ini:</p>
	<br/>
	<table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;">
		<tr>
			<td>&emsp; &emsp; 1. Nama</td>
			<td>: <?= $konfigurasi['sk_njop']['nama_pj'] ?></td>
		</tr>
		<tr>
			<td>&emsp; &emsp; 2. Jabatan</td>
			<td>: <?= $konfigurasi['sk_njop']['jabatan_pj'] ?></td>
		</tr>
	</table>
</div>
<br/>
<div class="row">
<p style="font-size:14px;margin:0;padding:0;text-align:justify;font-family:tahoma;">
Berdasarkan <?= $konfigurasi['sk_njop']['peraturan'] ?>, dengan ini menerangkan bahwa sesuai dengan basis data PBB-P2 atas objek pajak:</p>
<br/>
<table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;">
		<tr><td width="30%">&emsp; &emsp; Nomor Objek Pajak</td><td colspan="5">: <?= $data['KD_PROPINSI'].'.'.$data['KD_DATI2'].'.'.$data['KD_KECAMATAN'].'.'.$data['KD_KELURAHAN'].'.'.$data['KD_BLOK'].'-'.$data['NO_URUT'].'.'.$data['KD_JNS_OP'] ?></td></tr>
		<tr><td>&emsp; &emsp; Nama Wajib Pajak</td><td colspan="5">: <?= $data['NAMA_LAMA'] ?></td></tr>
		<tr><td>&emsp; &emsp; Alamat Wajib Pajak</td><td colspan="5">: <?= $data['JALAN_WP_LAMA'] ?></td></tr>
		<tr><td>&emsp; &emsp; Letak Objek Pajak</td><td colspan="5">: <?= $data['JALAN_OP_BARU'] ?></td></tr>
		<tr><td>&emsp; &emsp; Luas Bumi</td><td colspan="5">: <?= number_format($data['LUAS_BUMI_LAMA'],0,'','.') ?> m<sup>2</sup></td></tr>
	<tr><td>&emsp; &emsp; Luas Bangunan</td><td colspan="5">: <?= number_format($data['LUAS_BNG_LAMA'],0,'','.') ?> m<sup>2</sup></td></tr>
	<?php if($data['LUAS_BUMI_LAMA']>0): ?>
	<tr><td>&emsp; &emsp; NJOP Bumi (Rp.)</td><td>: <?= number_format($data['LUAS_BUMI_LAMA'],0,'','.') ?> m<sup>2</sup> </td><td>x</td><td>  <?= number_format($data['NJOP_BUMI_TOTAL_LAMA']/$data['LUAS_BUMI_LAMA'],0,'','.') ?>  </td> <td>=</td> <td><?= number_format($data['NJOP_BUMI_TOTAL_LAMA'],0,'','.') ?></td></tr>
	<?php else: ?>
	<tr><td>&emsp; &emsp; NJOP Bumi (Rp.)</td><td>: <?= number_format($data['LUAS_BUMI_LAMA'],0,'','.') ?> m<sup>2</sup> </td><td>x</td><td>    </td> <td>=</td> <td><?= number_format($data['NJOP_BUMI_TOTAL_LAMA'],0,'','.') ?></td></tr>
	<?php endif; ?>
	<tr><td>&emsp; &emsp; NJOP Bangunan (Rp.)</td><td>: <?= number_format($data['LUAS_BNG_LAMA'],0,'','.') ?> m<sup>2</sup> <td>x</td> </td><td><?= $data['LUAS_BNG_LAMA']!=0 ? number_format($data['NJOP_BNG_TOTAL_LAMA']/$data['LUAS_BNG_LAMA'],0,'','.') : 0 ?>  </td><td>=</td><td><?= number_format($data['NJOP_BNG_TOTAL_LAMA'],0,'','.') ?></td></tr>
</table>
</div>
<br/>
<div class="row">
	<p style="font-size:14px;margin:0;padding:0;text-align:justify;font-family:tahoma;">
		Sesuai dengan proses pelayanan PBB-P2 dengan No : <?= $no_pelayanan ?> Tanggal : <?= substr($tanggal_pelayanan,8,2).'-'.substr($tanggal_pelayanan,5,2).'-'.substr($tanggal_pelayanan,0,4) ?> akan diterbitkan SPPT untuk Tahun <?= $tahun+1 ?> sebagai berikut:
	</p>
	<br/>
	<table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;">
		<tr><td width="30%">&emsp; &emsp; Nomor Objek Pajak</td><td colspan="5">: <?= $data['KD_PROPINSI'].'.'.$data['KD_DATI2'].'.'.$data['KD_KECAMATAN'].'.'.$data['KD_KELURAHAN'].'.'.$data['KD_BLOK'].'-'.$data['NO_URUT'].'.'.$data['KD_JNS_OP'] ?></td></tr>
		<tr><td>&emsp; &emsp; Nama Wajib Pajak</td><td colspan="5">: <?= $data['NAMA_BARU'] ?></td></tr>
		<tr><td>&emsp; &emsp; Alamat Wajib Pajak</td><td colspan="5">: <?= $data['JALAN_WP_BARU'] ?></td></tr>
		<tr><td>&emsp; &emsp; Letak Objek Pajak</td><td colspan="5">: <?= $data['JALAN_OP_BARU'] ?></td></tr>
		<tr><td>&emsp; &emsp; Luas Bumi</td><td colspan="5">: <?= number_format($data['LUAS_BUMI_BARU'],0,'','.') ?> m<sup>2</sup></td></tr>
	<tr><td>&emsp; &emsp; Luas Bangunan</td><td colspan="5">: <?= number_format($data['LUAS_BNG_BARU'],0,'','.') ?> m<sup>2</sup></td></tr>

	</table>

</div>
<br/>
<div class="row">
	<p style="font-size:14px;margin:0;padding:0;text-align:justify;font-family:tahoma;">
	Apabila di kemudian hari terdapat kekeliruan akan dibetulkan dan ditindaklanjuti sesuai dengan ketentuan yang berlaku.<br/>
	&emsp; &emsp; Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan seperlunya.
	</p>
</div>

<br/><br/>

<table cellspacing="0" cellpadding="0" border="0px" width="100%" style="font-size:14px;font-family:tahoma;">
	<tr>
		<td width="50%">
		</td>
		<td width="50%">
			<center style="font-size:14px">

				<?= $konfigurasi['sk_njop']['ttd_lokasi'] ?>,				

				<?= tgl_indo(date("Y-m-d")) ?>

		
				<br/>
				<?= $konfigurasi['sk_njop']['ttd_instansi'] ?> <br/>
				<?= $konfigurasi['sk_njop']['ttd_kabupaten'] ?> 

				<br/>
				<?php if($ttd){ ?>
				<img src="/simpbb/web/image/ttd.jpg" alt="some_text">
				<?php } else {
					echo "<br/><br/>";
				} ?>
				<br/>
				<u><?= $konfigurasi['sk_njop']['nama_pj'] ?></u> <br/>
				<?= $konfigurasi['sk_njop']['pangkat_pj'] ?> <br/>
				NIP. <?= $konfigurasi['sk_njop']['nip_pj'] ?>
			</center>
		</td>
	</tr>
</table>

<?php

$this->registerJs("
	jQuery(document).ready(function() {
		window.print();
	});
",View::POS_END);

?>