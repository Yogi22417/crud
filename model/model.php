<?php

		class model{
			private $database;

				function __construct(){
					try {
						$this->database = new PDO('mysql:host=localhost;dbname=toko', 'root', '');
					} catch (PDOException $e) {
						die("Database connection failed: " . $e->getMessage());
					}
				}

				function execute($query) {
					try {
						return $this->database->query($query);
					} catch (PDOException $e) {
						die("Query failed: " . $e->getMessage());
					}
				}

				function selectAll(){
					$query = "SELECT * FROM pengguna";
					$stmt = $this->execute($query); 
				
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC); 
				
					return $data;
				}

				function selectPengguna($id_pengguna){
					$query = "SELECT * FROM pengguna where id_pengguna = '$id_pengguna'";
					$stmt = $this->execute($query); 
				
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC); 
				
					return $data;
				}

				function insertPengguna($nama_pengguna, $no_hp, $alamat){
					$query = "insert into pengguna (nama_pengguna,no_hp,alamat) values ('$nama_pengguna', '$no_hp', '$alamat')";
					return $this->execute($query);
				}

				function updatePengguna($id_pengguna, $nama_pengguna, $no_hp, $alamat){
					$query = "update pengguna set nama_pengguna='$nama_pengguna', no_hp='$no_hp', alamat='$alamat' where id_pengguna='$id_pengguna'";
					return $this->execute($query);
				}

				function hapus($id_pengguna){
					$query = "delete from pengguna where id_pengguna='$id_pengguna'";
					return $this->execute($query);
				}

				public function getLaporan() {
					$query = "
						SELECT 
							id_barang AS 'ID Barang', 
							nama_barang AS 'Nama Barang',
							harga_beli AS 'Harga Beli', 
							FLOOR(SUM(jumlah_pembelian) / 2) AS 'Total Stok Pembelian', 
							FLOOR((SUM(harga_beli) * SUM(jumlah_pembelian)) / 4) AS 'Modal Pembelian',
							harga_jual AS 'Harga Jual', 
							FLOOR(SUM(jumlah_penjualan) / 2) AS 'Total Stok Terjual', 
							FLOOR((SUM(harga_jual) * SUM(jumlah_penjualan)) / 4) AS 'Hasil Penjualan',
							FLOOR(((SUM(harga_jual) * SUM(jumlah_penjualan)) - (SUM(harga_beli) * SUM(jumlah_pembelian))) / 4) AS 'Keuntungan',
							(SUM(jumlah_pembelian) - SUM(jumlah_penjualan)) AS 'Sisa Stok'
						FROM 
							barang 
						JOIN 
							penjualan USING(id_barang)
						JOIN 
							pembelian USING(id_barang)
						GROUP BY 
							id_barang, nama_barang, harga_beli, harga_jual
					";
					
					$statement = $this->execute($query);;
					return $statement->fetchAll(PDO::FETCH_ASSOC);
				}
			
				public function getStokModalPembelian() {
					$query = "
						SELECT 
							id_barang AS 'ID Barang', 
							nama_barang AS 'Nama Barang', 
							harga_beli AS 'Harga Beli', 
							SUM(jumlah_pembelian) AS 'Total Stok Pembelian', 
							(SUM(harga_beli) * SUM(jumlah_pembelian)) AS 'Modal Pembelian'
						FROM 
							pembelian 
						RIGHT JOIN 
							barang USING(id_barang) 
						GROUP BY 
							id_barang
					";
					
					$statement = $this->execute($query);
					return $statement->fetchAll(PDO::FETCH_ASSOC);
				}
			
				public function getTransaksiPenjualan() {
					$query = "
						SELECT 
							id_barang AS 'ID Barang', 
							nama_barang AS 'Nama Barang', 
							harga_jual AS 'Harga Jual', 
							SUM(jumlah_penjualan) AS 'Total Stok Terjual', 
							(SUM(harga_jual) * SUM(jumlah_penjualan)) AS 'Hasil Penjualan'
						FROM 
							penjualan 
						RIGHT JOIN 
							barang USING(id_barang) 
						GROUP BY 
							id_barang
					";
					
					$statement = $this->execute($query);
					return $statement->fetchAll(PDO::FETCH_ASSOC);
				}

				function __destruct(){
				}

	}

?>
