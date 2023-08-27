<?php
$w = 70;
$h = 45;

for( $i= 1 ; $i <= $h ; $i++ ){ 
	$text[$i][1] = substr($i, -1) == 0 ? '' : substr($i, -1);
	if(substr($i, -1) != 0)
	for( $j= 2 ; $j <= $w ; $j++ ){ 
		$text[$i][$j] = substr($j, -1) == 0 ? '' : substr($j, -1);
	}
}
//$datas[] = $text;
//$datas[] = $text;





$mysqli = new mysqli("localhost:9906", "root", "simpbbrahasiapsekp", "simpbb");
if ($mysqli->connect_errno) die("Connect failed: ".$mysqli->connect_error);
$query = "CALL `rekap_pembayaran_sppt`('62', '08', '080', '004', '', '', '', '2019', '0', '999999999999', '0', '1');";
$result = $mysqli->query($query);

$text = null;
while($row = $result->fetch_array()){
	$NOP = $row['KD_PROPINSI'].'.'.$row['KD_DATI2'].'.'.$row['KD_KECAMATAN'].'.'.$row['KD_KELURAHAN'].'.'.$row['KD_BLOK'].'.'.$row['NO_URUT'].'.'.$row['KD_JNS_OP'];
	$text[7][51] = $row['THN_PAJAK_SPPT'];
	$text[8][7] = $NOP;
	$text[8][37] = '#94795382396478695236';
	//$text[1][1] = $row['SIKLUS_SPPT'];
	//$text[1][1] = $row['KD_KANWIL_BANK'];
	//$text[1][1] = $row['KD_KPPBB_BANK'];
	//$text[1][1] = $row['KD_BANK_TUNGGAL'];
	//$text[1][1] = $row['KD_BANK_PERSEPSI'];
	//$text[1][1] = $row['KD_TP'];
	
	$text[10][4] = $row['JALAN_OP'].', '.$row['BLOK_KAV_NO_OP'];
	$text[11][4] = 'RW. '.$row['RW_OP'];
	$text[11][4] = 'RT. '.$row['RT_OP'];
	$text[12][4] = 'RENON';
	$text[13][4] = 'DENTIM';
	$text[14][4] = 'DENPASAR';
	
	$text[10][37] = $row['NM_WP_SPPT'];
	$text[11][37] = $row['JLN_WP_SPPT'].', '.$row['BLOK_KAV_NO_WP_SPPT'];
	$text[12][37] = 'RW. '.$row['RW_WP_SPPT'];
	$text[12][45] = 'RT. '.$row['RT_WP_SPPT'];
	$text[13][37] = $row['KELURAHAN_WP_SPPT'];
	$text[14][37] = $row['KOTA_WP_SPPT'];
	//$text[20][1] = $row['KD_POS_WP_SPPT'];
	$text[15][42] = $row['NPWP_SPPT'].'TEST';
	
	//$text[20][1] = $row['NO_PERSIL_SPPT'];	
	$text[17][4] = 'BUMI';
	$text[17][15] = $row['LUAS_BUMI_SPPT'];
	$text[17][27] = $row['KD_KLS_TANAH'];
	$text[17][32] = $row['NJOP_BUMI_SPPT'] / $row['LUAS_BUMI_SPPT'];
	$text[17][48] = str_pad(number_format($row['NJOP_BUMI_SPPT'], 0, ',', '.'), 19, " ", STR_PAD_LEFT);
	//$text[20][1] = $row['THN_AWAL_KLS_TANAH'];
	
	$text[18][4] = 'BANGUNAN';
	$text[18][15] = $row['LUAS_BNG_SPPT'];
	$text[18][27] = $row['KD_KLS_BNG'];
	$text[18][32] = $row['LUAS_BNG_SPPT'] != 0 ? $row['NJOP_BNG_SPPT'] / $row['LUAS_BNG_SPPT'] : '';
	$text[18][48] = str_pad(number_format($row['NJOP_BUMI_SPPT'], 0, ',', '.'), 19, " ", STR_PAD_LEFT);$row['NJOP_BNG_SPPT'];
	//$text[20][1] = $row['THN_AWAL_KLS_BNG'];
	
	$text[22][48] = str_pad(number_format($row['NJOP_SPPT'], 0, ',', '.'), 19," ", STR_PAD_LEFT);;
	$text[23][48] = str_pad(number_format($row['NJOPTKP_SPPT'], 0, ',', '.'), 19, " ", STR_PAD_LEFT);
	$text[24][48] = str_pad(number_format($row['NJOP_SPPT'] - $row['NJOPTKP_SPPT'], 0, ',', '.'), 19, " ", STR_PAD_LEFT);
	//$text[1][1] = $row['NJKP_SPPT'];
	$text[26][25] = $row['NJKP_SPPT'] * 0.005 . '% X ' . number_format($row['NJOP_SPPT'] - $row['NJOPTKP_SPPT'], 0, ',', '.'); 
	$text[26][48] = str_pad(number_format($row['PBB_TERHUTANG_SPPT'], 0, ',', '.'), 19, " ", STR_PAD_LEFT);
	$text[1][1] = str_pad(number_format($row['FAKTOR_PENGURANG_SPPT'], 0, ',', '.'), 19, " ", STR_PAD_LEFT);
	$text[28][48] = str_pad(number_format($row['PBB_YG_HARUS_DIBAYAR_SPPT'], 0, ',', '.'), 19, " ", STR_PAD_LEFT);
	$text[29][4] = 'BLA BLA BLA BLA BLA BLA BLA BLA BLA BLA BLA BLA RUPIAH';
	
	$text[31][17] = $row['TGL_JATUH_TEMPO_SPPT'];
	$text[31][38] = 'DENPASAR, '.$row['TGL_TERBIT_SPPT'];
	$text[33][4] = 'BANK BLA BLA BLA';
	$text[34][4] = 'KANTOR POS BLA BLA BLA';
	$text[36][41] = 'ARIEFAN';
	$text[37][41] = 'NIP. 12345678';
	$text[1][1] = $row['STATUS_PEMBAYARAN_SPPT'];
	$text[1][1] = $row['STATUS_TAGIHAN_SPPT'];
	$text[1][1] = $row['STATUS_CETAK_SPPT'];
	$text[1][1] = $row['TGL_CETAK_SPPT'];
	$text[1][1] = $row['NIP_PENCETAK_SPPT'];	
	
	$text[40][15] = $row['NM_WP_SPPT'];
	$text[41][24] = 'TEST';
	$text[42][24] = 'TEST';
	$text[43][15] = $NOP;
	$text[44][15] = $row['THN_PAJAK_SPPT'];
	$text[44][21] = $row['PBB_YG_HARUS_DIBAYAR_SPPT'];
	
	$datas[] = $text;
}





function print_single($w, $h, $datas, $multi_count = 1){
	$ds = $datas;
	$datas = [];
	$m = 0;
	$text = [];
	foreach($ds as $d){
		foreach($d as $k => $vals) foreach($vals as $l => $val) $text[$k][$l + $m * $w] = $d[$k][$l];
		$m++;
		if($m == $multi_count){
			$datas[] = $text;
			$m = 0;
			$text = [];
		}
	}
	$w *= $multi_count;
	foreach($datas as $data){
		for($i=1; $i<=$h; $i++){
			$space = 0;
			$space_taken = 0;
			if(isset($data[$i])){	
				foreach($data[$i] as $j => $v){
					$space = ($j - 1) - $space_taken;
					for($s=0; $s<$space; $s++) echo " ";
					echo $v;
					$space_taken = ($j - 1) + strlen($v);
				}
			}
			for($s=$space_taken; $s<$w; $s++) echo " ";
			echo "\n";
		}
	}
}

?>
<html>
<head>
<style>
#section-to-print {
  font-size: 10pt;
  font-family: "Courier New";
  margin:0;
  padding:0;
}

.row-print {
  margin:0;
  padding:0;  
}

@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
</head>

<body>
<pre id="section-to-print">
<?php
print_single($w, $h, $datas, 1);
?>
</pre>
</body>
</html>