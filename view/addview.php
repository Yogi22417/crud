<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Input Data Pengguna</title>

	<link href="style/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style/style.css">

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<i class="glyphicon glyphicon-check"></i>
					Aplikasi Toko
				</a>
			</div>

			<div class="navbar-header">
				<a class="navbar-brand" href="index.php?pengguna">
					Pengguna
				</a>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h4>
						<i class="glyphicon glyphicon-check"></i> Input Data Barang
					</h4>
				</div>

				<a href="index.php?pengguna">
					<button class="btn btn-danger btn-reset">
						<<< Kembali</button>
				</a>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Input Data Barang</h3>
					</div>

					<div class="panel-body">
						<div class="modal-body">
							<form action="" method="POST" enctype="multipart/form-data">

								<div class="form-group">
									<label>Nama Pengguna</label>
									<input type="text" class="form-control" name="nama_pengguna" autocomplete="off"
										maxlength="10" required />
								</div>

								<div class="form-group">
									<label>No HP</label>
									<input type="text" class="form-control" name="no_hp" autocomplete="off" required />
								</div>

								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat" autocomplete="off" required />
								</div>

								<div class="modal-footer">
									<input type="submit" class="btn btn-success btn-submit" name="simpan"
										value="Simpan">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php

if (isset($_POST['simpan'])) {
	$main = new controller();
	$main->insert();
}

?>