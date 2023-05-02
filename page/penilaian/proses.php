<?php
include "../../config.php";
include "../notifikasi.php";

	switch ($_GET['act']){
		case 'insert':

			$id_alternatif 	= $_POST['id_alternatif'];
			$id_kriteria 		= $_POST['id_kriteria'];
			$id_subkriteria = $_POST['id_subkriteria'];
			$count = count($id_subkriteria);
			//echo $count;
			
			if ($count > 0){
				for($i=0;$i < $count;$i++){
					if (count($id_kriteria) != count($id_subkriteria)){
						pesan("Gagal, Data kurang Lengkap","penilaian");
					}else{
						//print_r($_POST); 						
						mysqli_query($koneksi,"INSERT INTO t_penilaian (id_alternatif,id_kriteria,id_subkriteria) VALUES ('$id_alternatif','$id_kriteria[$i]','$id_subkriteria[$i]')");
					}					
				}	
				pesan("Data Tersimpan","penilaian");			
			}else{
				pesan("Gagal","penilaian");
			}	
		break;

		case 'update':

			$id_kriteria		= $_POST['id_kriteria'];
			$id_alternatif 	= $_POST['id_alternatif'];
			$nilai 					= $_POST['id_subkriteria'];
			
			$query = mysqli_query($koneksi,"UPDATE t_penilaian SET id_subkriteria='$nilai' WHERE id_kriteria='$id_kriteria' 
				AND id_alternatif='$id_alternatif'") or die('Ada kesalahan :'.mysqli_error($koneksi));
			
			if ($query) {
				pesan("Data Tersimpan","penilaian");
			}else{
				echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
			}
		break;

		case 'delete':

			$id = $_GET['id'];

			$sql = "DELETE FROM t_penilaian WHERE id_alternatif = '$id';
					ALTER TABLE t_penilaian DROP id_penilaian;
					ALTER TABLE t_penilaian ADD id_penilaian INT(10) NOT NULL AUTO_INCREMENT  FIRST,ADD PRIMARY KEY (id_penilaian)";	

			if (mysqli_multi_query($koneksi, $sql )) {
				pesan("Data Terhapus","penilaian");
			}else{
				echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
			}
		break;
	}	

?>