<!DOCTYPE html>
<html lang="en" dir="ltr">
		<head>
				<meta charset="utf-8">
				<title>Data Pengguna</title>

				<link href="style/css/bootstrap.min.css" rel="stylesheet">
				<link rel="stylesheet" href="style/style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                <div class="container mt-5">
        <!-- Header -->
        <div class="dashboard-header">
            <h2>DASHBOARD LAPORAN RUGI LABA</h2>
            <p>Analisis Laporan Keuangan dan Penjualan Barang</p>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Data Laporan Rugi Laba</h4>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Total Stok Pembelian</th>
                            <th>Modal Pembelian</th>
                            <th>Harga Jual</th>
                            <th>Total Stok Terjual</th>
                            <th>Hasil Penjualan</th>
                            <th>Keuntungan</th>
                            <th>Sisa Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataLaporan as $row): ?>
                            <tr>
                                <td><?= $row['ID Barang'] ?></td>
                                <td><?= $row['Nama Barang'] ?></td>
                                <td><?= $row['Harga Beli'] ?></td>
                                <td><?= $row['Total Stok Pembelian'] ?></td>
                                <td><?= $row['Modal Pembelian'] ?></td>
                                <td><?= $row['Harga Jual'] ?></td>
                                <td><?= $row['Total Stok Terjual'] ?></td>
                                <td><?= $row['Hasil Penjualan'] ?></td>
                                <td><?= $row['Keuntungan'] ?></td>
                                <td><?= $row['Sisa Stok'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Chart Stok dan Modal Pembelian -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Stok dan Modal Pembelian Sebelum Penjualan</h4>
            </div>
            <div class="card-body">
                <canvas id="stokModalChart"></canvas>
            </div>
        </div>

        <!-- Chart Total Transaksi Penjualan -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Total Transaksi Penjualan</h4>
            </div>
            <div class="card-body">
                <canvas id="transaksiPenjualanChart"></canvas>
            </div>
        </div>
    </div>
				</div>

                <!-- jQuery, DataTables, Bootstrap 5 JS, and Chart.js Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        // Data untuk chart stok dan modal pembelian
        const stokModalLabels = <?php echo json_encode(array_column($dataStokModal, 'Nama Barang')); ?>;
        const totalStokPembelian = <?php echo json_encode(array_column($dataStokModal, 'Total Stok Pembelian')); ?>;
        const modalPembelian = <?php echo json_encode(array_column($dataStokModal, 'Modal Pembelian')); ?>;

        // Grafik Stok dan Modal Pembelian
        new Chart(document.getElementById('stokModalChart'), {
            type: 'bar',
            data: {
                labels: stokModalLabels,
                datasets: [
                    {
                        label: 'Total Stok Pembelian',
                        data: totalStokPembelian,
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Modal Pembelian',
                        data: modalPembelian,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: { scales: { y: { beginAtZero: true } } }
        });

        // Data untuk chart transaksi penjualan
        const transaksiPenjualanLabels = <?php echo json_encode(array_column($dataTransaksiPenjualan, 'Nama Barang')); ?>;
        const totalStokTerjual = <?php echo json_encode(array_column($dataTransaksiPenjualan, 'Total Stok Terjual')); ?>;
        const hasilPenjualan = <?php echo json_encode(array_column($dataTransaksiPenjualan, 'Hasil Penjualan')); ?>;

        // Grafik Total Transaksi Penjualan
        new Chart(document.getElementById('transaksiPenjualanChart'), {
            type: 'bar',
            data: {
                labels: transaksiPenjualanLabels,
                datasets: [
                    {
                        label: 'Total Stok Terjual',
                        data: totalStokTerjual,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Hasil Penjualan',
                        data: hasilPenjualan,
                        backgroundColor: 'rgba(255, 206, 86, 0.7)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: { scales: { y: { beginAtZero: true } } }
        });
    </script>
		</body>
</html>
