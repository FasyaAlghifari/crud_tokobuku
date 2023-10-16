<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_buku'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$harga = $_POST['harga'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

		$foto = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		if (empty($filename)) {
			mysqli_query($koneksi,"update daftar_buku set judul='$judul', pengarang='$pengarang', penerbit='$penerbit', harga='$harga'  where id_buku='$id'");
			header("location:index.php?alert=berhasil");
		}else{
			mysqli_query($koneksi,"update daftar_buku set judul='$judul', pengarang='$pengarang', penerbit='$penerbit', harga='$harga',  foto='$foto' where id_buku='$id'");
			header("location:index.php?alert=berhasil");
		}
		

// mengalihkan halaman kembali ke index.php

?>