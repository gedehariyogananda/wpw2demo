<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>CRUD PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<style>
		.cont {
			width: 100%;
			height: 50px;
		}
	</style>

</head>

<body>

	<nav class="navbar bg-dark">
		<div class="container">
			<a class="navbar-brand text-light" href="#">
				Database Mahasiswa
			</a>
		</div>
	</nav>
	<br>
	<div class="container">
		<br>
		<div class="cont bg-info">
			<div class="row">
				<div class="col-md-2">
					<a href="index.php"><button type="button" class="text-dark btn btn-info m-2"><i class=" fa-solid fa-right-from-bracket fa-rotate-180"></i></button></a>
				</div>
				<div class="col-md-8">
					<h5 class="text-center mt-2">UPDATE DATA MAHASISWA</h5>
				</div>
			</div>
		</div>

		<?php
		$id = $_GET['id'];
		$data = mysqli_query($koneksi, "select * from mahasiswa where id ='$id'");
		while ($d = mysqli_fetch_assoc($data)) {
		?>
			<!-- iniiii -->
			<div class="shadow p-3 mb-5 bg-body rounded">
				<form method="post" action="update.php" enctype="multipart/form-data">
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="mb-2">
								<label class="form-label mb-3">NRP</label>
								<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
								<input type="number" class="form-control" name="nrp" value="<?php echo $d['nrp']; ?>">
							</div>
							<div class="mb-2">
								<label class="form-label mb-3">Nama</label>
								<input type="text" class="form-control" name="nama" value="<?php echo $d['nama']; ?>">
							</div>
							<div class="mb-2">
								<label class="form-label mb-3">Jenis Kelamin</label>
								<div class="input-group mb-3">
									<label class="input-group-text" for="inputGroupSelect01">Gender</label>
									<select class="form-select" id="inputGroupSelect01" name="jeniskelamin" value="<?php echo $d['jeniskelamin']; ?>" required>
										<option selected>Pilih...</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>

							</div>
							<div class="mb-2">
								<label class="form-label mb-3">Jurusan</label>
								<input type="text" class="form-control" name="jurusan" value="<?php echo $d['jurusan']; ?>">
							</div>
							<div class="mb-2">
								<label class="form-label mb-3">Email</label>
								<input type="email" class="form-control" name="email" value="<?php echo $d['email']; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-2">
								<label class="form-label mb-3">Alamat</label>
								<input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat']; ?>">
							</div>
							<div class="mb-2">
								<label class="form-label mb-3">No. Hp</label>
								<input type="text" class="form-control" name="nohp" value="<?php echo $d['nohp']; ?>">
							</div>
							<div class="mb-2">
								<label class="form-label mb-3">Asal SMA</label>
								<input type="text" class="form-control" name="asalsma" value="<?php echo $d['asalsma']; ?>">
							</div>
							<div class="mb-2">
								<label class="form-label mb-3">Matkul Favorit</label>
								<input type="text" class="form-control" name="matkulfavorit" value="<?php echo $d['matkulfavorit']; ?>">
							</div>
							<div class="input-group mt-4">
								<label class="input-group-text" for="inputGroupFile01">Ubah foto</label>
								<input type="file" name="foto" class="form-control" id="inputGroupFile01" value="<?php echo $d['foto']; ?>" required="required">
							</div>
							<p style="color: red">Noted : File Harus Format .png | .jpg | .jpeg | .gif</p>
							<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-floppy-o">
								</i> Ubah Data</button>
							<!-- modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Noted !!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Anda Yakin Mengubah Data Ini?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" value="SIMPAN" class="btn btn-primary">Yes, Ubah</button>
										</div>
									</div>
								</div>
							</div>
						</div>
				</form>
			</div>
	</div>
<?php
		}
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>

</body>

</html>