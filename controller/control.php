<?php

		include "model/model.php";
		require_once 'model/LaporanRugiLaba.php';

		class controller{

				public $model;

				function __construct(){
						$this->model = new model();
				}

				function index(){
					$dataLaporan = $this->model->getLaporan();
			
					$dataStokModal = $this->model->getStokModalPembelian();
			
					$dataTransaksiPenjualan = $this->model->getTransaksiPenjualan();
			
					include 'view/index.php';
				}

				function viewInsert(){
						include "view/addview.php";
				}

				function insert(){
						$nama_pengguna = $_POST['nama_pengguna'];
						$no_hp = $_POST['no_hp'];
						$alamat = $_POST['alamat'];

						$insert = $this->model->insertPengguna($nama_pengguna, $no_hp, $alamat);
						header("location:index.php?pengguna");
				}

				function viewUpdate($id_pengguna){
						$data = $this->model->selectPengguna($id_pengguna);

						include "view/editview.php";
				}

				function update(){
						$id_pengguna = $_POST['id_pengguna'];
						$nama_pengguna = $_POST['nama_pengguna'];
						$no_hp = $_POST['no_hp'];
						$alamat = $_POST['alamat'];

						$update = $this->model->updatePengguna($id_pengguna, $nama_pengguna, $no_hp, $alamat);
						header("location:index.php?pengguna");
				}

				function hapus($kode_barang){
						$hapus = $this->model->hapus($kode_barang);
						header("location:index.php?pengguna");
				}

				public function pengguna() {
					$data = $this->model->selectAll();
					include "view/view.php";
				}

				function __destruct(){
				}

	}


?>
