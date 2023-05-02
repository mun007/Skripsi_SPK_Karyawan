<?php
include "../../config.php";
include "../notifikasi.php";

switch ( $_GET['act']) {
	case 'insert' :

		$kriteria			= $_POST['kriteria'];
		$tipe					= $_POST['tipe'];
		$bobot_baru		= $_POST['bobot'];

			// Cek kapasitas bobot
			$query = mysqli_query($koneksi,"SELECT SUM(bobot) as bobot FROM t_kriteria");
			$result = mysqli_fetch_assoc($query);
			$total_bobot = $result['bobot'] + $bobot_baru;

			if ($total_bobot <= 100){
				$sql = mysqli_query($koneksi, "INSERT INTO t_kriteria (kriteria,tipe,bobot)values (
					'$kriteria','$tipe','$bobot_baru')"); 
					if ($sql) {					
						pesan("Data tersimpan", "kriteria");
					}else{
						die('Ada kesalahan pada query : '.mysqli_error($koneksi));
					}  					
			}else {
				pesan("Gagal, Total bobot melebihi 100%","kriteria");
			}
	break;	
  case 'update' :

    $id 					= $_POST['id'];
		$kriteria			= $_POST['kriteria'];
		$tipe					= $_POST['tipe'];
		$bobot_baru		= $_POST['bobot'];
		
			// Cek kapasitas bobot
			$query_1 = mysqli_query($koneksi,"SELECT SUM(bobot) as bobot FROM t_kriteria");
			$query_2 = mysqli_query($koneksi,"SELECT bobot as bobot_lama FROM t_kriteria WHERE id_kriteria='$id'");
			$result_1 = mysqli_fetch_assoc($query_1);
			$result_2 = mysqli_fetch_assoc($query_2);

			if($result_1['bobot'] <= 100){
				$total_bobot = $result_1['bobot'] - $result_2['bobot_lama']+ $bobot_baru; 
			}

			if ($total_bobot > 100){
				pesan("Gagal, total bobot melebihi 100 %","kriteria");
			}else{
				$sql = mysqli_query($koneksi, "UPDATE t_kriteria SET id_kriteria = '$id',kriteria = '$kriteria',tipe='$tipe',
						bobot = '$bobot_baru' WHERE id_kriteria = '$id'"); 
				if ($sql) {
					pesan("Data telah tersimpan","kriteria");
				}else{
					die('Ada kesalahan pada query insert : '.mysqli_error($koneksi)); 
				}
			}

	break;
	case 'delete' :

		$id = $_GET['id'];
		
		$sql = "DELETE FROM t_kriteria WHERE id_kriteria = '$id';
				ALTER TABLE t_kriteria DROP id_kriteria;
				ALTER TABLE t_kriteria ADD id_kriteria INT(10) NOT NULL AUTO_INCREMENT  FIRST,ADD PRIMARY KEY (id_kriteria);
				DELETE FROM t_subkriteria WHERE id_kriteria='$id';
				ALTER TABLE t_subkriteria DROP id_subkriteria;
				ALTER TABLE t_subkriteria ADD id_subkriteria int(10) NOT NULL AUTO_INCREMENT FIRST,ADD PRIMARY KEY(id_subkriteria)";	

		if (mysqli_multi_query($koneksi, $sql )) {
			//header('location: ../../main.php?page=kriteria&alert=3');
			pesan("Data tersimpan " , "kriteria");
		}else{
			//echo "<script>alert('Gagal di tambahkan!');window.location = 'http://localhost/spk/main.php?page=kriteria';</script>";
			pesan("Gagal ditambahkan!", "kriteria");
		}
	break;	
  default :

}
?>