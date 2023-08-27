<?php

$this->title = "Neraca Tahun ".$post_data['tahun_neraca'];
$this->title .= ' '.$post_data['tahun_awal'] .' s/d '.$post_data['tahun_akhir'].' ('.$post_data['per_tanggal'].')';

$total = [];
$total['SISA'] = 0;
$total['POKOK'] = 0;
$total['DENDA'] = 0;
$total['TOTAL'] = 0;
$total['PENYISIHAN'] = 0;
?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>TAHUN</th>
			<th>AWAL</th>
			<th>POKOK</th>
			<th>DENDA</th>
			<th>TOTAL</th>
			<th>SISA</th>
			<th>PENYISIHAN</th>
			<th>NETTO</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $thn=>$val): ?>
		<?php 
		$total['SISA'] += $val['SISA'];
		$total['POKOK'] += $val['POKOK'];
		$total['DENDA'] += $val['DENDA'];
		$total['TOTAL'] += $val['TOTAL'];
		$total['PENYISIHAN'] += $val['PENYISIHAN'];

		?>
		<tr>
			<td><?= $thn  ?></td>
			<td><?= number_format($val['SISA'],0,'','.')  ?></td>
			<td><?= number_format($val['POKOK'],0,'','.')  ?></td>
			<td><?= number_format($val['DENDA'],0,'','.')  ?></td>
			<td><?= number_format($val['TOTAL'],0,'','.')  ?></td>
			<td><?= number_format($val['SISA']-$val['POKOK'],0,'','.')  ?></td>
			<td><?= number_format($val['PENYISIHAN'],0,'','.')  ?></td>
			<td><?= number_format($val['SISA']-$val['POKOK']-$val['PENYISIHAN'],0,'','.')  ?></td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<th>Total</th>
			<th><?= number_format($total['SISA'],0,'','.') ?></th>
			<th><?= number_format($total['POKOK'],0,'','.') ?></th>
			<th><?= number_format($total['DENDA'],0,'','.') ?></th>
			<th><?= number_format($total['TOTAL'],0,'','.') ?></th>
			<th><?= number_format($total['SISA']-$total['POKOK'],0,'','.') ?></th>
			<th><?= number_format($total['PENYISIHAN'],0,'','.') ?></th>
			<th><?= number_format($total['SISA']-$total['POKOK']-$total['PENYISIHAN'],0,'','.') ?></th>
		</tr>
	</tbody>
</table>