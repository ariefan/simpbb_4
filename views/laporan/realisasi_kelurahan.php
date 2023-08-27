<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$total_pokok = 0;
$total_pokok_dibayar = 0;
$total_denda_dibayar = 0;
$total_dibayar = 0;
$total_kurang_bayar = 0;
$total_lebih_bayar = 0;

$this->title = "Realisasi Kelurahan";

?>


<?php $form = ActiveForm::begin(); ?>

<div class="card-body">
	<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
	    <label class="control-label" for="tahun">Tahun</label>
	    <input type="number" required="" id="tahun" name="tahun" class="form-control" value="<?= date('Y') ?>">
	</div>

	<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
	    <label class="control-label" for="PBB_MIN">PBB Min</label>
	    <input type="number"  required="" id="PBB_MIN" name="pbb_min" class="form-control" value="0">
	</div>

	<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
	    <label class="control-label" for="PBB_MAX">PBB Max</label>
	    <input type="number" required="" id="PBB_MAX" name="pbb_max" class="form-control" value="100000000000">
	</div>
	<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
	    <label class="control-label" for="tanggal_realisasi">Tanggal Realisasi</label>
	    <input type="date" required="" id="tanggal_realisasi" name="tanggal_realisasi" class="form-control" value="<?= date('Y').'-12-31' ?>">
	</div>

	<div class="form-group">
		<input type="submit" value="Cetak" class="btn btn-success" name="tombol">
		<input type="submit" value="Lihat" class="btn btn-primary" name="tombol">
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="card-body">
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kecamatan</th>
			<th>Kelurahan</th>
			<th>Pokok</th>
			<th>Pokok Dibayar</th>
			<th>Denda Dibayar</th>
			<th>Total Dibayar</th>
			<th>Kurang Bayar</th>
			<th>Lebih Bayar</th>
			<th>%</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $key=>$val): ?>
		<?php 
		$total_pokok += $val['POKOK_TERHUTANG'];
		$total_pokok_dibayar += $val['POKOK_BAYAR'];
		$total_denda_dibayar += $val['DENDA_BAYAR'];
		$total_dibayar += $val['JUMLAH_BAYAR'];
		$total_kurang_bayar += $val['KURANG_BAYAR'];
		$total_lebih_bayar += $val['LEBIH_BAYAR'];
		?>
		<tr>
			<td><?= $key+1 ?></td>
			<td><?= $val['NM_KECAMATAN'] ?></td>
			<td><?= $val['NM_KELURAHAN'] ?></td>
			<td><?= number_format($val['POKOK_TERHUTANG'],0,'','.') ?></td>
			<td><?= number_format($val['POKOK_BAYAR'],0,'','.') ?></td>
			<td><?= number_format($val['DENDA_BAYAR'],0,'','.') ?></td>
			<td><?= number_format($val['JUMLAH_BAYAR'],0,'','.') ?></td>
			<td><?= number_format($val['KURANG_BAYAR'],0,'','.') ?></td>
			<td><?= number_format($val['LEBIH_BAYAR'],0,'','.') ?></td>
			<td><?= $val['POKOK_TERHUTANG']>0 ? number_format(($val['POKOK_BAYAR']/$val['POKOK_TERHUTANG'])*100,2,',','.') : 0 ?> %</td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="3">Total</td>
			<td><?= number_format($total_pokok,0,'','.') ?></td>
			<td><?= number_format($total_pokok_dibayar,0,'','.') ?></td>
			<td><?= number_format($total_denda_dibayar,0,'','.') ?></td>
			<td><?= number_format($total_dibayar,0,'','.') ?></td>
			<td><?= number_format($total_kurang_bayar,0,'','.') ?></td>
			<td><?= number_format($total_lebih_bayar,0,'','.') ?></td>
			<td><?= $total_pokok>0 ? number_format(($total_pokok_dibayar/$total_pokok)*100,2,',','.') : 0 ?> %</td>
		</tr>
	</tbody>
</table>
</div>
