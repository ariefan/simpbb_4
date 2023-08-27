<?php

$this->title = "Sppt Khusus ".$data1[0]['KD_PROPINSI'].$data1[0]['KD_DATI2'].$data1[0]['KD_KECAMATAN'].$data1[0]['KD_KELURAHAN'].$data1[0]['KD_BLOK'].$data1[0]['NO_URUT'].$data1[0]['KD_JNS_OP'];

use yii\web\View;
use app\models\Konfigurasi;

$konfigurasi = new Konfigurasi();

?>


<div class="row">
	<table style="font-size:14px;cellspacing=1;cellpadding=1;" border="0px" width="100%">
		<tr height='1px'><td align="center" rowspan="4" width="160px"><img src="image/logo.png" height="100px" width="110px" /></td><td align="center" style="font-size:22px; !important;font-family:'Times New Roman';font-weight: bold;">PEMERINTAH KOTA DENPASAR</td><td width="100px"></td></tr>
		<tr height='1px'><td align="center" style="font-size:22px;font-family:'Times New Roman';font-weight: bold;">BADAN PENDAPATAN DAERAH</td><td></td></tr>
		<tr height='1px'><td align="center" style="font-size:15px;font-family:'Times New Roman';">Jl. Letda Tantular No. 12 Denpasar</td><td></td></tr>
		<tr height='1px'><td align="center" style="font-size:15px;font-family:'Times New Roman';">Telp. (0361) 239079 / 239080 Fax. (0361) 261246</td><td></td></tr>
	</table>
	<hr style="min-width:100%; background-color:#000000 !important; height:2px; margin-top:5px !important; margin-bottom:7px !important;"/>
</div>

<div class="row">
	<div class="col-xs-12">
	<center>
		<p style="font-size:14px;margin:0;padding:0;font-weight: bold;">LAPORAN HASIL PENELITIAN LAPANGAN RTHK SAWAH MURNI DAN EKOWISATA</p>
	</center>
	</div>
</div>
<p font-size="7"></p>
<div class="row">
	<p style="font-size:12px;margin:0;padding:0;text-align:justify;margin-bottom:5px !important;">
	Berdasarkan Surat Perintah Tugas Nomor 973/2605/BPDKD tanggal 22 September 2017, Telah dilakukan penelitian yang dilaksanakan pada tanggal ........................................... atas objek pajak berikut :
	</p>

	<ol type="I">
		<li style="font-size:12px;font-weight:bold;">UMUM</li>
		<table border="0px" width="80%" style="font-size:12px;margin-left:8px;line-height:1px;cellspacing=1;cellpadding=1;">
			<tr height='15px'><td width="200px">1. Nomor Objek Pajak</td><td>: <?= $data1[0]['KD_PROPINSI'].'.'.$data1[0]['KD_DATI2'].'.'.$data1[0]['KD_KECAMATAN'].'.'.$data1[0]['KD_KELURAHAN'].'.'.$data1[0]['KD_BLOK'].'-'.$data1[0]['NO_URUT'].'.'.$data1[0]['KD_JNS_OP'] ?></td></tr>
			<tr height='15px'><td>2. Nama Wajib Pajak</td><td>: <?= $data1[0]['NM_WP_SPPT'] ?></td></tr>
			<tr height='15px'><td>3. Alamat Wajib Pajak</td><td>: <?= $data1[0]['JLN_WP_SPPT'],', ',$data1[0]['BLOK_KAV_NO_WP_SPPT'] ?></td></tr>
			<tr height='15px'><td>4. Alamat Objek Pajak</td><td>: <?= $data1[0]['JALAN_OP'],', ',$data1[0]['BLOK_KAV_NO_OP'] ?></td></tr>
			<tr height='15px'><td>5. Kecamatan Objek Pajak</td><td>: <?= $data1[0]['NM_KECAMATAN'] ?></td></tr>
			<tr height='15px'><td>6. Kelurahan Objek Pajak</td><td>: <?= $data1[0]['NM_KELURAHAN'] ?></td></tr>
			<tr height='15px'><td>7. Luas Bumi</td><td>: <?= number_format($data1[0]['LUAS_BUMI_SPPT'], 0, ',', '.').' m<sup>2</sup>' ?></td></tr>
			<tr height='15px'><td>8. Luas Bangunan</td><td>: <?= number_format($data1[0]['LUAS_BNG_SPPT'], 0, ',', '.').' m<sup>2</sup>' ?></td></tr>
			<tr height='15px'><td>9. Status</td><td>: 
						<?php
							if($data1[0]['JENIS_SPPT']==1){
								echo "Sawah Murni";
							}elseif($data1[0]['JENIS_SPPT']==2){
								echo "Ekowisata";
							}else{
								echo "Biasa";
							}
						?>
			</td></tr>
		</table>		
		<p font-size="7"></p>
		
		<table bordercolor="#999999" border="1" width="100%" style="font-size:12px;line-height:1px;cellspacing:1;cellpadding:1;">
			<thead>	
				<tr height='20px'>
					<th width='10px' style="text-align:center; ">NO</th><th width='10px' style="text-align:center;">TAHUN</th><th width='200px' style="text-align:center;">NAMA WAJIB PAJAK</th><th width='90px' style="text-align:center;">JATUH TEMPO</th><th width='10px' style="text-align:center;">TAGIHAN</th><th width='85px' style="text-align:center;">STATUS BAYAR</th>
				</tr>
			</thead>		
			<tbody>			
				<?php $i=1 ?>
				<?php foreach($data2 as $value){ ?>
				
				<tr height='15px'>
					<td align="center"><?= $i ?></td><td align="center"><?= $value['THN_PAJAK_SPPT'] ?></td><td align="center"><?= $value['NM_WP_SPPT'] ?></td><td align="center"><?= $value['TGL_JATUH_TEMPO_SPPT'] ?></td><td align="right"><?= number_format($value['PBB_YG_HARUS_DIBAYAR_SPPT'], 0, ',', '.'),',00' ?></td>
					<td align="center">
						<?php
							if(empty($value['TOTAL_BAYAR']) || $value['STATUS_PEMBAYARAN_SPPT']==0){
								echo "Belum Lunas";
							}elseif($value['STATUS_PEMBAYARAN_SPPT']==1){
								echo "Lunas";
							}else{
								echo "Tidak Jelas";
							}
						?>
					</td>
				</tr>

				<?php $i++ ?>			
				<?php } ?>
			</tbody>
		</table>
		<p font-size="7"></p>
		
		<li style="font-size:12px;font-weight:bold;">DASAR HUKUM</li>
		<ol type="1" style="padding-left:20px;">
			<li style="font-size:12px;text-align:justify;">Perda No. 4 Tahun 2012 tentang Pajak Bumi dan Bangunan Perdesaan dan Perkotaan (Lembaran Daerah Tahun 2012 Nomor 4).</li>	
			<li style="font-size:12px;text-align:justify;">Peraturan Walikota Denpasar Nomor 52 Tahun 2014 tentang Tata Cara Pemungutan Pajak Bumi dan Bangunan Perdesaan dan Perkotaan di Kota Denpasar (Berita Daerah Kota Denpasar Tahun 2014 Nomor 52).</li>
			<li style="font-size:12px;text-align:justify;">Perwali No. 4 Tahun 2017 tentang perubahan kedua atas Perwali Nomor 52 tahun 2014</li>
		</ol>
		<p font-size="7"></p>		
		
		<li style="font-size:12px;font-weight:bold;">HASIL PENELITIAN</li>		
		<label style="font-size:12px;padding-left:20px;"><input type="checkbox" name="checkbox" value="value" style="width:20px;height:20px;display:inline-block;line-height:20px;font-size:12px;vertical-align:bottom;"> Objek Pajak Tetap</label>
		<label style="font-size:12px;padding-left:20px;"><input type="checkbox" name="checkbox" value="value" style="width:20px;height:20px;display:inline-block;line-height:20px;font-size:12px;vertical-align:bottom;"> Objek Pajak Berubah Fungsi/Peruntukan</label>
		<p font-size="7"></p>		
		
		<li style="font-size:12px;font-weight:bold;">KESIMPULAN DAN USUL</li>		
			<p style="font-size:12px;text-align:justify;padding-left:20px;">Berdasarkan hasil penelitian diatas, maka dapat / tidak diusulkan untuk diberikan pengurangan sebesar 100%</p>
	</ol> 
	<p font-size="7"></p>

</div>

<div class="row">
	<table bordercolor="#E6E6E6" border="0" style="font-size:12px;" width="100%">
		<tbody>			
			<tr height='25px'>
				<td width='33%' style="text-align:center; ">Wajib Pajak<br/><br/><br/>(...........................................................)</td><td width='33%' style="text-align:center; " colspan="2">Pekaseh<br/><br/><br/>(...........................................................)</td><td width='33%' style="text-align:center; ">Petugas<br/><br/><br/>(...........................................................)</td>
			</tr>
			<tr height='15px'>
				<td colspan="4"></td>
			</tr>
			<tr height='25px'>
				<td width='50%' style="text-align:center;" colspan="2">Ka.Sub.Bid. Pemeriksaan<br/><br/><br/><br/><u>Gusti Ketut Wartini, SE</u></br>NIP. 19631104 199202 2 002</td><td width='50%' style="text-align:center; "colspan="2">Ka.Sub.Bid. Perhitungan dan Keberatan<br/><br/><br/><br/><u>I Putu Armaya, SE, M.Si</u></br>NIP. 19690918 200003 1 007</td>
			</tr>
			<tr height='10px'>
				<td colspan="4"></td>
			</tr>
			<tr height='25px'>
				<td width='100%' colspan="4" style="text-align:center; ">Mengetahui,<br/>Ka.Bid. Penagihan dan Keberatan<br/>Badan Pendapatan Daerah Kota Denpasar<br/><br/><br/><br/><u>Made Rai Edi Mulyawan, S.STP</u></br>NIP. 19770314 199601 1 001</td>
			</tr>
		</tbody>
	</table>
</div>

<?php

$this->registerJs("
	jQuery(document).ready(function() {
		window.print();
	});
",View::POS_END);

?>