<h1>Hasan SQL</h1>
<br>
<?php
$a = 1;
$b = 1 + 3;
?>
<?php for ($a = 1; $a <= $b; $a++) {
    $uniqid = uniqid();
    $rand_start = rand(1, 5);
    $rand_8_char = substr($uniqid, $rand_start, 4);


    $code = "beranda?code=$rand_8_char";
    $code = "beranda?code=" . base64_encode($a);
    $code = "beranda?code=qr-" . $a;
    $sql = "INSERT INTO `data_peserta` (`id_data_peserta`, `nama_lengkap_fam`, `nomor_hp`, `dpc_dpw`, `no_registrasi`, `qrcode`, `status`, `link`, `insert_time`, `update_time`) VALUES (NULL, '', '081', NULL, 'qr-$a', 'sfda', '0', '" . base_url($code) . "', CURRENT_TIMESTAMP, NULL);";

    echo $sql . "<br>";
} ?>