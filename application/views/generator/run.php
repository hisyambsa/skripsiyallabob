<h1>GENERATOR SQL</h1>
<br>
<?php
$a = 1;
$b = 1 + 3;
$id_data = $this->db->get('data_peserta')->row()->id_data_peserta + 1;
?>
<?php for ($a = 1; $a <= $b; $a++) {


    $code = "beranda?code=yallabob-" . $id_data++;
    $sql = "INSERT INTO `data_peserta` (`id_data_peserta`, `nama_lengkap_fam`, `email`, `nomor_hp`, `dpc_dpw`, `no_registrasi`, `status`, `link`, `insert_time`, `update_time`, `timestamp`) VALUES (NULL, '-', NULL, NULL, '-', '$code', '0', '10', NULL, NULL, CURRENT_TIMESTAMP);";

    echo $sql . "<br>";
} ?>