
<div class="keberatan-index">
<div class="row">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">NOP</th>
				<th rowspan="2">Nama Pemohon</th>
				<th rowspan="2">Alamat Pemohon</th>
				<th rowspan="2">No Pelayanan</th>
				<th colspan="2">Luas Sebelum</th>
				<th colspan="2">Luas Sesudah</th>
				<th colspan="2">NJOP Sebelum</th>
				<th colspan="2">NJOP Sesudah</th>
				<th rowspan="2">Ketetapan Sebelum</th>
				<th rowspan="2">Ketetapan Sesudah</th>
				<th rowspan="2">Besaran Perubahan</th>
			</tr>
			<tr>
				<th>Tanah</th>
				<th>Bangunan</th>
				<th>Tanah</th>
				<th>Bangunan</th>
				<th>Tanah</th>
				<th>Bangunan</th>
				<th>Tanah</th>
				<th>Bangunan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $key => $value): ?>
				<tr>
					<td><?= $key+1 ?></td>
					<td><?= $value['nop'] ?></td>
					<td><?= $value['NAMA_PEMOHON'] ?></td>
					<td><?= $value['ALAMAT_PEMOHON'] ?></td>
					<td><?= $value['NO_PELAYANAN'] ?></td>
					<td style="text-align:right"><?= number_format($value['lt_sebelum'],0,'','.') ?></td>
					<td style="text-align:right"><?= number_format($value['lt_sesudah'],0,'','.') ?></td>
					<td style="text-align:right"><?= number_format($value['lb_sebelum'],0,'','.') ?></td>
					<td style="text-align:right"><?= number_format($value['lb_sesudah'],0,'','.') ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td style="text-align:right"><?= number_format($value['pbb_sebelum'],0,'','.') ?></td>
					<td style="text-align:right"><?= number_format($value['pbb_sesudah'],0,'','.') ?></td>
					<td style="text-align:right"><?= number_format($value['pbb_sebelum']-$value['pbb_sesudah'],0,'','.') ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

</div>


