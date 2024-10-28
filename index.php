<?php

		include 'controller/control.php';

		$main = new controller();

		if(isset($_GET['t'])){
				$main->viewInsert();
		}else if(isset($_GET['u'])){
				$id_pengguna = $_GET['u'];
				$main->viewUpdate($id_pengguna);
		}else if(isset($_GET['d'])){
				$id_pengguna = $_GET['d'];
				$main->hapus($id_pengguna);
		}else if(isset($_GET['pengguna'])){
			$main->pengguna();
		}else{
			$main->index();
		}

?>
