<?php
use yii\web\View;

use app\models\Konfigurasi;

$konfigurasi = new Konfigurasi();

$nomor_laporan = [
	'1.1' => 'Perumahan',
	'1.2' => 'Kantor, Apotik, Toko, Pasar, Ruko, Restoran, Hotel, Wisma, Gedung Pemerintah',
	'1.3' => 'Rumah Sakit',
	'1.4' => 'Bengkel/Gudang/Pertanian',
	'1.5' => 'Pabrik',
	'1.6' => 'Kantor',
	'1.7' => 'Pertokoan',
	'1.8' => 'Rumah Sakit',
	'1.9' => 'Olah Raga',
	'1.10' => 'Hotel Non Resort',
	'1.11' => 'Hotel Resort',
	'1.12' => 'Parkir',
	'1.13' => 'Apartemen',
	'1.14' => 'Sekolah',
	'1.15' => 'Mezanin',
	'1.16' => 'Kanopi',
	'1.17' => 'Daya Dukung Lantai',
	'1.18' => 'Tangki Dibawah Tanah',
	'1.19' => 'Tangki Diatas Tanah',
	'2.1' => 'Air Conditioner (AC)',
	'2.2' => 'Boiler',
	'2.3' => 'Kolam Renang',
	'2.4' => 'Perkerasan',
	'2.5' => 'Lapangan Tenis',
	'2.6' => 'Lift',
	'2.7' => 'Tangga Berjalan/ESC',
	'2.8' => 'Pagar',
	'2.9' => 'Proteksi Api',
	'2.10' => 'Saluran Pes. PABX',
	'2.11' => 'Sumur Artesis',
	'2.12' => 'Listrik/KVA',
	'3.1' => 'ATAP',
	'3.2' => 'DINDING',
	'3.3' => 'LANTAI',
	'3.4' => 'LANGIT-LANGIT',
];
?>


<center><h3>DAFTAR BIAYA KOMPONEN BANGUNAN ( DBKB ) <br />TAHUN <?= $tahun; ?></h3></center>
<table class="table table-bordered table-condensed">
	<thead>
	<tr>
		<th style="text-align:center">LUAS/TYPE/<br />VOL./LBR BTG</th>
		<th style="text-align:center">LANTAI/<br />TINGGI KLM</th>
		<th style="text-align:center">NILAI <br />(RP. 1.000,-)</th>
	</tr>
	<tr>
		<th style="text-align:center">(1)</th>
		<th style="text-align:center">(2)</th>
		<th style="text-align:center">(3)</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	foreach ($data_std as $nomor => $data_nomor):
		echo '<tr><th colspan="4">'.$nomor." ".$nomor_laporan[$nomor].'</th></tr>';
		foreach ($data_nomor as $row):

		?>
		<tr>
			<td align="center"><?php echo number_format($row['L_MIN'],'0',',','.')." s.d. ".number_format($row['L_MAX'],'0',',','.'); ?></td>
			<td align="center"><?php echo number_format($row['T_MIN'],'0',',','.')." s.d. ".number_format($row['T_MAX'],'0',',','.'); ?></td>
			<td align="right"><?php echo number_format($row['NILAI'],'0',',','.'); ?></td>
		</tr>
	<?php endforeach;
	endforeach;
	?>
	</tbody>
</table>

<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th style="text-align: center" rowspan="2">JUMLAH<br/>LANTAI</th>
			<th style="text-align: center" colspan="6">KELAS / TYPE / BINTANG</th>
		</tr>
		<tr>
			<th style="text-align: center">1</th>
			<th style="text-align: center">2</th>
			<th style="text-align: center">3</th>
			<th style="text-align: center">4</th>
			<th style="text-align: center">5</th>
			<th style="text-align: center">T.A</th>
		</tr>
		<tr>
			<?php for($i=1;$i<=7;$i++): ?>
			<th style="text-align: center">(<?= $i ?>)</th>
			<?php endfor; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_jpb as $nomor=>$data_nomor): ?>
			<tr><th colspan="7"><?= $nomor." ",$nomor_laporan[$nomor] ?></th></tr>
			<?php foreach($data_nomor as $k=>$v): ?>
			<tr>
				<td style="text-align: center"><?= $v['MIN_LT'].' s.d. '.$v['MAX_LT'] ?></td>
				<td style="text-align: right"><?= isset($v['KOL_1']) ? number_format($v['KOL_1'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_2']) ? number_format($v['KOL_2'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_3']) ? number_format($v['KOL_3'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_4']) ? number_format($v['KOL_4'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_5']) ? number_format($v['KOL_5'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_TA']) ? number_format($v['KOL_TA'],0,'','.') : '-' ?></td>
			</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>

<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th style="text-align: center">KOMPONEN<br/>JENIS PENGGUNAAN BANGUNAN</th>
			<th style="text-align: center">LUAS/TYPE<br/>VOL/LBR BTG</th>
			<th style="text-align: center">LANTAI/<br/>TINGGI KLM</th>
			<th style="text-align: center">NILAI<br/>(Rp 1.000,-)</th>
		</tr>
		<tr>
			<?php for($i=1;$i<=4;$i++): ?>
			<th style="text-align: center">(<?= $i ?>)</th>
			<?php endfor; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_jpb2 as $nomor=>$data_nomor): ?>
			<tr><th colspan="4"><?= $nomor." ",$nomor_laporan[$nomor] ?></th></tr>
			<?php foreach($data_nomor as $k=>$v): ?>
			<tr>
				<td><?= $v['TIPE'] ?></td>
				<td style="text-align: center"><?= number_format(intval($v['MIN_KAP']),0,'','.') ?> s/d <?= number_format(intval($v['MAX_KAP']),0,'','.') ?></td>
				<td>-</td>
				<td style="text-align: right;"><?= number_format($v['NILAI'],0,'','.') ?></td>
			</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th style="text-align: center" rowspan="2">KOMPONEN<br/>JENIS PENGGUNAAN BANGUNAN</th>
			<th style="text-align: center" rowspan="2">JUMLAH<br/>LANTAI</th>
			<th style="text-align: center" colspan="6">KELAS / TYPE / BINTANG</th>
		</tr>
		<tr>
			<th style="text-align: center">1</th>
			<th style="text-align: center">2</th>
			<th style="text-align: center">3</th>
			<th style="text-align: center">4</th>
			<th style="text-align: center">5</th>
			<th style="text-align: center">T.A</th>
		</tr>
		<tr>
			<?php for($i=1;$i<=8;$i++): ?>
			<th style="text-align: center">(<?= $i ?>)</th>
			<?php endfor; ?>
		</tr>
	</thead>
	<tbody>
		<tr><th colspan="8">FASILITAS</th></tr>

		<?php foreach($data_jpb3 as $nomor=>$data_nomor): ?>
			<tr><th colspan="8"><?= $nomor." ",$nomor_laporan[$nomor] ?></th></tr>
			<?php foreach($data_nomor as $k=>$v): ?>
			<tr>
				<td><?= $v['NAMA'] ?></td>
				<td>-</td>
				<td style="text-align: right"><?= isset($v['KOL_1']) ? number_format($v['KOL_1'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_2']) ? number_format($v['KOL_2'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_3']) ? number_format($v['KOL_3'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_4']) ? number_format($v['KOL_4'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_5']) ? number_format($v['KOL_5'],0,'','.') : '-' ?></td>
				<td style="text-align: right"><?= isset($v['KOL_TA']) ? number_format($v['KOL_TA'],0,'','.') : '-' ?></td>
			</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th style="text-align: center">KOMPONEN<br/>JENIS PENGGUNAAN BANGUNAN</th>
			<th style="text-align: center">LUAS/TYPE<br/>VOL/LBR BTG</th>
			<th style="text-align: center">LANTAI/<br/>TINGGI KLM</th>
			<th style="text-align: center">NILAI<br/>(Rp 1.000,-)</th>
		</tr>
		<tr>
			<?php for($i=1;$i<=4;$i++): ?>
			<th style="text-align: center">(<?= $i ?>)</th>
			<?php endfor; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_jpb4 as $nomor=>$data_nomor): ?>
			<tr><th colspan="4"><?= $nomor." ",$nomor_laporan[$nomor] ?></th></tr>
			<?php foreach($data_nomor as $k=>$v): ?>
			<tr>
				<td><?= $v['NM'] ?></td>
				<td style="text-align: center"><?= isset($v['MIN_DEP']) ? number_format(intval($v['MIN_DEP']),0,'','.') .' s/d '. number_format(intval($v['MAX_DEP']),0,'','.') : '-' ?></td>
				<td style="text-align: center"><?= isset($v['MIN_LT']) ? number_format(intval($v['MIN_LT']),0,'','.') .' s/d '. number_format(intval($v['MAX_LT']),0,'','.') : '-' ?></td>
				<td style="text-align: right;"><?= number_format($v['NILAI'],0,'','.') ?></td>
			</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th style="text-align: center">KOMPONEN<br/>JENIS PENGGUNAAN BANGUNAN</th>
			<th style="text-align: center">LUAS/TYPE<br/>VOL/LBR BTG</th>
			<th style="text-align: center">LANTAI/<br/>TINGGI KLM</th>
			<th style="text-align: center">NILAI<br/>(Rp 1.000,-)</th>
		</tr>
		<tr>
			<?php for($i=1;$i<=4;$i++): ?>
			<th style="text-align: center">(<?= $i ?>)</th>
			<?php endfor; ?>
		</tr>
	</thead>
	<tbody>
		<tr><th colspan="4">KOMPONEN MATERIAL</th></tr>

		<?php foreach($data_jpb5 as $nomor=>$data_nomor): ?>
			<tr><th colspan="4"><?= $nomor." ",$nomor_laporan[$nomor] ?></th></tr>
			<?php foreach($data_nomor as $k=>$v): ?>
			<tr>
				<td><?= $v['NM_KEGIATAN'] ?></td>
				<td>-</td>
				<td>-</td>
				<td style="text-align: right;"><?= number_format($v['NILAI'],0,'','.') ?></td>
			</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>

<table class="table">
	<tr>
		<td width="50%"></td>
		<td width="50%" style="text-align: center;">
			<center>
				<?= $konfigurasi->kota.', '.date('d F Y') ?> <br/>
				<?= $konfigurasi->kepala['jabatan'] ?> <br/><br/><br/><br/><br/>

				<u><?= $konfigurasi->kepala['nama'] ?><br/></u>
				<?= $konfigurasi->kepala['pangkat'] ?><br/>
				<?= $konfigurasi->kepala['nip'] ?><br/>
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
