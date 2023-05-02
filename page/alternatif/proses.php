<?php
include "../../config.php";


	if ($_GET['aksi']=='insert') {
		$id 		= $_POST['id'];
		$nama		= $_POST['nama'];
		$jenkel		= $_POST['jenkel'];
		$ttl		= $_POST['ttl'];
		$pendidikan	= $_POST['pendidikan'];
		$agama		= $_POST['agama'];
		$status		= $_POST['status'];
		$alamat		= $_POST['alamat'];
				$sql = mysqli_query($koneksi, "INSERT INTO t_alternatif (id_alternatif,nama,tempat_tgl_lahir,jenis_kelamin,pendidikan,status,agama,alamat)values (
					'$id','$nama','$ttl','$jenkel','$pendidikan','$status','$agama','$alamat')" )
						or die('Ada kesalahan pada query insert : '.mysqli_error($koneksi)); 
				if ($sql) {
					header("location: ../../main.php?page=alternatif&alert=1");
				}else{
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                }  

				
	}
	elseif ($_GET['aksi']=='update') {
		$id 		= $_POST['id'];
		$nama		= $_POST['nama'];
		$jenkel		= $_POST['jenkel'];
		$ttl		= $_POST['ttl'];
		$pendidikan	= $_POST['pendidikan'];
		$agama		= $_POST['agama'];
		$status		= $_POST['status'];
		$alamat		= $_POST['alamat'];
		$sql = mysqli_query($koneksi, "UPDATE t_alternatif SET id_alternatif = '$id',nama = '$nama',tempat_tgl_lahir='$ttl',
					jenis_kelamin = '$jenkel',pendidikan = '$pendidikan',status = '$status',agama = '$agama',alamat = '$alamat'
					WHERE id_alternatif = '$id'")or die('Ada kesalahan pada query insert : '.mysqli_error($koneksi)); 

		if ($sql) {
			header("location: ../../main.php?page=alternatif&alert=2");
		}else{
            echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
        }  
	}
	elseif ($_GET['aksi']=='delete') {
		$id = $_GET['id'];

		$sql = "DELETE FROM t_alternatif WHERE id_alternatif = '$id';
				ALTER TABLE t_alternatif DROP id_alternatif;
				ALTER TABLE t_alternatif ADD id_alternatif INT(10) NOT NULL AUTO_INCREMENT  FIRST,ADD PRIMARY KEY (id_alternatif)";	

		if (mysqli_multi_query($koneksi, $sql )) {
			header("location: ../../main.php?page=alternatif&alert=3");
		}else{
            echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
        }  
	}
?>