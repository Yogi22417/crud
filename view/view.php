<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Data Pengguna</title>

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
						<i class="glyphicon glyphicon-user"></i> Data Pengguna
						<a class="btn btn-success pull-right" href="index.php?t=add" data-target="#modal_tambah"
							data-toggle="modal">
							<i class="glyphicon glyphicon-plus"></i> Tambah
						</a>
					</h4>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Data Pengguna</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pengguna</th>
									<th>No Hp</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<?php
							$dataBarang = $this->model->selectAll();
							$no = 0;

							// Iterasi menggunakan foreach
							foreach ($dataBarang as $row) {
								$no++;
								echo "
								<tr>
									<td>{$no}</td>
									<td>{$row['nama_pengguna']}</td>
									<td>{$row['no_hp']}</td>
									<td>{$row['alamat']}</td>
									<td>
										<div class=''>
											<a href='index.php?u={$row['id_pengguna']}' data-toggle='tooltip' data-placement='top' title='Update' style='margin-right:5px' class='btn btn-success btn-sm open_modal'>
												<i class='glyphicon glyphicon-edit'></i>
											</a>
											<a href='index.php?d={$row['id_pengguna']}' onClick=\"return confirm('Apakah Anda Yakin Menghapus Data Ini?')\" data-toggle='tooltip' data-placement='top' title='Delete' style='margin-right:5px' class='btn btn-danger btn-sm'>
												<i class='glyphicon glyphicon-trash'></i>
											</a>
										</div>
									</td>
								</tr>";
							}
							?>

						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>

</html>