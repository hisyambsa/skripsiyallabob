<?php
include("config.php");
	//cek apakah tombol daftar sudah diklik atau belum

	if (isset($_POST['daftar'])) {
		$id_data_peserta 		= $_POST['id_data_peserta'];
		$nomor		= $_POST['nomor'];
		$nama_lengkap_fam 	= $_POST['nama_lengkap_fam'];
		$nomor_hp	= $_POST['nomor_hp'];
		$dpc_dpw		= $_POST['dpc_dpw'];

		//buat query
		$sql = "INSERT INTO data_peserta (id_data_peserta, nomor, nama_lengkap_fam, nomor_hp, dpc_dpw)
				VALUE('$id_data_peserta','$nomor','$nama_lengkap_fam','$nomor_hp','$dpc_dpw')";

		$query = 'mysqli';

		//apakah query simpan berhasil ?

		if($query){
			//kalau berhasil alihkan ke halaman index.php dengan status = sukses
			header('Location: home.php?status=sukses');
		}else{
			//kalau gagal alihkan ke halaman index.php dengan status = gagal
			header('Location :home.php?status=gagal');
		}
	}else{
		die("Akses Dilarang...");
	}
?>