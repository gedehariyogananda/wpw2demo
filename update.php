<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$NRP = $_POST['NRP'];
$Nama = $_POST['Nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$asal_SMA = $_POST['asal_SMA'];
$matkul_favorit = $_POST['matkul_favorit'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $ekstensi) && $ukuran < 2000000) { // check if file extension is allowed and file size is less than 2MB
    $xx = $rand . '_' . $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'file/' . $xx); // move uploaded file to file directory
    mysqli_query($koneksi, "UPDATE data_mahasiswa SET NRP='$NRP', Nama='$Nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', email='$email', alamat='$alamat', no_hp='$no_hp', asal_SMA='$asal_SMA', matkul_favorit='$matkul_favorit', foto='$xx' WHERE id = '$id'");
    header("location:index.php");
} else {
    header("location:edit.php");
}
