<?php

$this->title = "Salinan SPPT ".$data_objek['KD_PROPINSI'].$data_objek['KD_DATI2'].$data_objek['KD_KECAMATAN'].$data_objek['KD_KELURAHAN'].$data_objek['KD_BLOK'].$data_objek['NO_URUT'].$data_objek['KD_JNS_OP'];
use yii\web\View;
use app\models\Konfigurasi;

$konfigurasi = new Konfigurasi();
?>

<table class="table" style="margin-top: 0px;">
	<tr>
		<td width="20%"><img src="<?= Yii::getAlias('@web/images/logo-small.png',true) ?>" width="90px"/></td>
		<td><center><h2 style="font-size: 22px;margin-bottom: 0px">
		  PEMERINTAH <?= $konfigurasi->kabupaten_kop ?>
		  <?= $konfigurasi->instansi_kop ?></h2><span style="font-size: 17px">JL. Letda Tantular NO. 12 Denpasar<br/>Telp. (0361) 239079.239080 Fax. (0361) 261246</span></center></td>
	    <td width="20%"></td>
	</tr>
</table>
<hr style="border-top: 2px solid; margin:0px;margin-bottom: 5px;">
<div class="row">
	<div class="col-xs-12">
	<center><h3>SURAT PEMBERITAHUAN PAJAK TERHUTANG ELEKTRONIK (E-SPPT) <br/> PAJAK BUMI DAN BANGUNAN TAHUN <?= $tahun ?></h3></center>
	</div>
</div>

<br/>
<div class="row">
	<div class="col-xs-12">
		<table class="table">
			<tr>
				<th>NOP</th>
				<td>:</td>
				<td><?php echo $data_objek['KD_PROPINSI'].'.'.$data_objek['KD_DATI2'].'.'.$data_objek['KD_KECAMATAN'].'.'.$data_objek['KD_KELURAHAN'].'.'.$data_objek['KD_BLOK'].'.'.$data_objek['NO_URUT'].'.'.$data_objek['KD_JNS_OP']; ?></td>
				<td width="10%"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<th colspan="3"><br/></th>
				<td></td>
				<th colspan="3"></th>
			</tr>

			<tr style="margin-bottom: 5px;">
				<th colspan="3" style="text-align: center;">OBJEK PAJAK</th>
				<td></td>
				<th colspan="3" style="text-align: center;">SUBJEK PAJAK</th>
			</tr>
			
			<tr>
				<th>ALAMAT OP</th>
				<td>:</td>
				<td><?= $data_objek['JALAN_OP'] ?></td>
				<td></td>
				<th>NAMA WP</th>
				<td>:</td>
				<td><?= $data_sppt['NM_WP_SPPT'] ?></td>
			</tr>
			<tr>
				<th>DESA</th>
				<td>:</td>
				<td><?= $kelurahan[$data_objek['KD_KECAMATAN']][$data_objek['KD_KELURAHAN']] ?></td>
				<td></td>
				<th>ALAMAT WP</th>
				<td>:</td>
				<td><?= $data_sppt['JLN_WP_SPPT'] ?></td>
			</tr>
			<tr>
				<th>KECAMATAN</th>
				<td>:</td>
				<td><?= $kecamatan[$data_objek['KD_KECAMATAN']] ?></td>
				<td></td>
				<th>DESA/KEL</th>
				<td>:</td>
				<td><?= $data_sppt['KELURAHAN_WP_SPPT'] ?></td>
			</tr>
			<tr>
				<th>KAB/KOTA</th>
				<td>:</td>
				<td>KOTA DENPASAR</td>
				<td></td>
				<th>KAB/KOTA</th>
				<td>:</td>
				<td><?= $data_sppt['KOTA_WP_SPPT'] ?></td>
			</tr>
			<tr>
				<th></th>
				<td></td>
				<td></td>
				<td></td>
				<th>NPWP</th>
				<td>:</td>
				<td><?= $data_sppt['NPWP_SPPT'] ?></td>
			</tr>
		</table>		
	</div>
</div>

<br/>
<div class="row">
	<div class="col-xs-12">
		<table class="table">
			<thead>
			<tr>
				<th style="border:1px solid;text-align: center;">OBJEK PAJAK</th>
				<th style="border:1px solid;text-align: center;">LUAS (M<sup>2</sup>)</th>
				<th style="border:1px solid;text-align: center;">KELAS</th>
				<th style="border:1px solid;text-align: center;">NJOP PER M<sup>2</sup> (Rp)</th>
				<th style="border:1px solid;text-align: center;">TOTAL NJOP (Rp)</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td style="border-left: 1px solid; border-right: 1px solid; border-top:1px solid;border-bottom: none;margin-bottom: 0px;">BUMI</td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-top:1px solid;border-bottom: none;margin-bottom: 0px;text-align:right;"><?= number_format($data_sppt['LUAS_BUMI_SPPT'],0,'','.') ?></td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-top:1px solid;border-bottom: none;margin-bottom: 0px;text-align:right;"><?= $data_sppt['KD_KLS_TANAH'] ?></td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-top:1px solid;border-bottom: none;margin-bottom: 0px;text-align:right;"><?= $data_sppt['LUAS_BUMI_SPPT']==0 ? 0 : number_format($data_sppt['NJOP_BUMI_SPPT']/$data_sppt['LUAS_BUMI_SPPT'],0,'','.') ?></td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-top:1px solid;border-bottom: none;margin-bottom: 0px;text-align:right;"><?= number_format($data_sppt['NJOP_BUMI_SPPT'],0,'','.') ?></td>
				</tr>
				<tr>
					<td style="border-left: 1px solid; border-right: 1px solid; border-bottom:1px solid;border-top: none; margin-top: 0px;">BANGUNAN</td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-bottom:1px solid;border-top: none; margin-top: 0px;text-align:right;"><?= number_format($data_sppt['LUAS_BNG_SPPT'],0,'','.') ?></td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-bottom:1px solid;border-top: none; margin-top: 0px;text-align:right;"><?= $data_sppt['KD_KLS_BNG'] ?></td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-bottom:1px solid;border-top: none; margin-top: 0px;text-align:right;"><?= $data_sppt['LUAS_BNG_SPPT'] > 0 ? number_format($data_sppt['NJOP_BNG_SPPT']/$data_sppt['LUAS_BNG_SPPT'],0,'','.') : 0 ?></td>
					<td style="border-left: 1px solid; border-right: 1px solid; border-bottom:1px solid;border-top: none; margin-top: 0px;text-align:right;"><?= number_format($data_sppt['NJOP_BNG_SPPT'],0,'','.') ?></td>
				</tr>
			</tbody>
		</table>
		<table class="table">
				<tr>
					<td><strong>NJOP Sebagai Dasar Pengenaan PBB</strong></td>
					<td> = </td>
					<td style="text-align:right;"><?= number_format($data_sppt['NJOP_SPPT'],0,'','.') ?></td>
				</tr>
				<tr>
					<td>NJOPTKP (NJOP Tidak Kena Pajak)</td>
					<td> = </td>
					<td style="text-align:right;"><?= number_format($data_sppt['NJOPTKP_SPPT'],0,'','.') ?></td>
				</tr>
				<tr>
					<td>NJOP untuk perhitungan PBB</td>
					<td> = </td>
					<td style="text-align:right;"><?= number_format($data_sppt['NJOP_SPPT'] - $data_sppt['NJOPTKP_SPPT'],0,'','.') ?></td>
				</tr>
				
				<tr>
					<td>Tarif</td>
					<td> = </td>
					<td style="text-align:right;"><?= $data_sppt['NJOP_SPPT'] - $data_sppt['NJOPTKP_SPPT'] < 1000000000 ? "0,1%" : "0,2%" ?></td>
				</tr>
				<tr>
					<td>PBB TERHUTANG</td>
					<td> = </td>
					<td style="text-align:right;"><?= number_format($data_sppt['PBB_TERHUTANG_SPPT'],0,'','.') ?></td>
				</tr>
				<?php if($data_sppt['FAKTOR_PENGURANG_SPPT']>0): ?>
				<tr>
					<td>Pengurangan</td>
					<td> = </td>
					<td style="text-align:right;"><?= number_format($data_sppt['FAKTOR_PENGURANG_SPPT'],0,'','.') ?></td>
				</tr>
				<?php endif; ?>
				<tr>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="2"><strong>PAJAK BUMI DAN BANGUNAN YANG HARUS DIBAYAR (Rp)</strong></td>
					<td style="text-align:right;"><strong><?= number_format($data_sppt['PBB_YG_HARUS_DIBAYAR_SPPT'],0,'','.') ?></strong></td>
				</tr>
				<tr>
					<td colspan="3">
						<?= strtoupper(\app\models\SpptE::terbilang($data_sppt['PBB_YG_HARUS_DIBAYAR_SPPT'])) ?> RUPIAH
					</td>
				</tr>
				<tr>
					<td>TGL JATUH TEMPO : <?= \app\models\SpptE::tglIndo($data_sppt['TGL_JATUH_TEMPO_SPPT']) ?></td>
				</tr>
		</table>

		<table class="table">
			<tr>
				<td width="50%">
					TEMPAT PEMBAYARAN:
					<ul>
						<li>PT. BANK BPD BALI</li>
						<li>PT. POS INDONESIA</li>
					</ul>
				</td>
				<td style="text-align: center"><?= strtoupper($konfigurasi->kota).', '. date('d-m-Y') ?><br/><?= strtoupper($konfigurasi->kepala['jabatan']) ?></td>
			</tr>
			<tr>
				<td></td>
				<td><br/><br/><br/><br/></td>
			</tr>
			<tr>
				<td></td>
				<td style="text-align: center"><?= strtoupper($konfigurasi->kepala['nama']) ?><br/>NIP. <?= strtoupper($konfigurasi->kepala['nip']) ?></td>
			</tr>
		</table>

		<br/>
		TGL PENERBITAN: <?= \app\models\SpptE::tglIndo(date('Y-m-d'))  ?>
		<br/>
		<br/>
		<center style="text-align: center"><strong>e-SPPT PBB P2 BUKAN MERUPAKAN BUKTI KEPEMILIKAN HAK</strong></center>
	</div>
</div>