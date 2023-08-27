<?php

use yii\web\View;

$script = <<< JS
$(document).ready(function(){
		window.print();
	});
JS;
$total_pokok = 0;
$total_pokok_dibayar = 0;
$total_denda_dibayar = 0;
$total_dibayar = 0;
$total_kurang_bayar = 0;
$total_lebih_bayar = 0;
$this->registerJs($script,View::POS_END);
?>
<center>
<h3>SPPT Tahun <?= $post_data['tahun'] ?></h3>
<h4>Tanggal Realisasi <?= $post_data['tanggal_realisasi'] ?></h4>
</center>
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