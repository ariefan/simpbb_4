<table class="table">
	<thead>
		<th><input type="checkbox" id="checkAll" value=""></th>
		<th>NOP</th>
		<th>Nama</th>
		<th>PBB</th>
	</thead>
	<tbody>
		<?php foreach($data as $val): ?>
		<tr>
			<td><input type="checkbox" name="nop[]" value="<?= $val['KD_PROPINSI'].$val['KD_DATI2'].$val['KD_KECAMATAN'].$val['KD_KELURAHAN'].$val['KD_BLOK'].$val['NO_URUT'].$val['KD_JNS_OP'] ?>"></td>
			<td><?= $val['KD_PROPINSI'].'.'.$val['KD_DATI2'].'.'.$val['KD_KECAMATAN'].'.'.$val['KD_KELURAHAN'].'.'.$val['KD_BLOK'].'.'.$val['NO_URUT'].'.'.$val['KD_JNS_OP'] ?></td>
			<td><?= $val['NM_WP_SPPT'] ?></td>
			<td style="text-align: right"><?= number_format($val['PBB'],0,'','.') ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>