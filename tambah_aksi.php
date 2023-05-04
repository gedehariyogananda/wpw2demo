<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nrp = $_POST['nrp'];
$nama = $_POST['nama'];
$jkelamin = $_POST['jeniskelamin'];
$jurusan = $_POST['jurusan'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$sma = $_POST['asalsma'];
$matkul = $_POST['matkulfavorit'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $ekstensi)) {
	$xx = $rand . '_' . $filename;
	move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
	mysqli_query($koneksi, "insert into mahasiswa values('','$nrp','$nama','$jkelamin', '$jurusan', '$email', '$alamat', '$nohp', '$sma', '$matkul','$xx')");
	header("location:index.php");
} else {
	header("location:tambah.php");
}
