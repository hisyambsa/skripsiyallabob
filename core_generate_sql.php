<h1>Hasan SQL</h1>
<br>
<?php

?>
<?php for ($i = 1; $i <= 3; $i++) {
	$uniqid = uniqid();
	$rand_start = rand(1, 5);
	$rand_8_char = substr($uniqid, $rand_start, 4);


	$base_url = $_SERVER['SERVER_NAME'];
	$sql = "INSERT INTO `data_peserta` (`id_data_peserta`, `nama_lengkap_fam`, `nomor_hp`, `dpc_dpw`, `no_registrasi`, `qrcode`, `status`, `link`, `insert_time`, `update_time`) VALUES (NULL, 'fsad', '213', 'dasf', 'sfda', 'sfda', '0', '" . $base_url . "', CURRENT_TIMESTAMP, NULL);";

	echo $sql . "<br>";
} ?>