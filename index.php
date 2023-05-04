<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD</title>
	<!-- CSS Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

	<style>
		.cont {
			width: 100%;
			height: 50px;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<div class="container">
			<div class="col-md-2">
				<a class="navbar-brand text-light" href="#">
					Database Mahasiswa
				</a>
			</div>
			<div class="col-md-1">
				<div class="btn-group">
					<button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user fa-lg"></i>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item" href="index.php"><i class="fa-solid fa-backward" style="color: black;"></i> Back Main Menu</a></li>
						<li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-power-off" style="color: black;"></i> Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<br><br>

	<div class="container-fluid px-4">
		<div class="cont bg-info">
			<div class="row">
				<div class="col-md-2">
					<a href="tambah.php"><button type="button" class="btn btn-info m-2"><i class="fa-solid fa-user-plus"></i></button></a>
				</div>
				<div class="col-md-8">
					<h5 class="text-center mt-2">DATA MAHASISWA</h5>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr class="table-primary">
					<th>No</th>
					<th>Nrp</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Jurusan</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>No. Hp</th>
					<th>Asal SMA</th>
					<th>Mata Kuliah Favorit</th>
					<th>Foto</th>
					<th>Opsi</th>

				</tr>
				<?php
				include 'koneksi.php';
				$no = 1;
				$data = mysqli_query($koneksi, "select * from mahasiswa");
				while ($d = mysqli_fetch_assoc($data)) {
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['nrp']; ?></td>
						<td><?php echo $d['nama']; ?></td>
						<td><?php echo $d['jeniskelamin']; ?></td>
						<td><?php echo $d['jurusan']; ?></td>
						<td><?php echo $d['email']; ?></td>
						<td><?php echo $d['alamat']; ?></td>
						<td><?php echo $d['nohp']; ?></td>
						<td><?php echo $d['asalsma']; ?></td>
						<td><?php echo $d['matkulfavorit']; ?></td>
						<td><img src="gambar/<?php echo $d['foto']; ?>" width="100" height="70"></td>
						<td>

							<!-- edit -->
							<a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $d['id']; ?>"><i class="fa-solid fa-user-pen"></i> Edit</a>

							<!-- download -->
							<a class="btn btn-primary btn-sm" href="download.php?foto=<?php echo $d['foto']; ?>"><i class="fa-solid fa-download" style="color: #ffffff;"></i> Download</a>
							<!-- deleteeee -->
							<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user-minus">
								</i> Delete</button>
							<!-- modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Noted !!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Anda Yakin Menghapus Data Ini?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

											<a href="hapus.php?id=<?php echo $d['id']; ?>"><button type="button" class="btn btn-primary mt-2"> Yes, Delete</button></a>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>

</body>

</html>