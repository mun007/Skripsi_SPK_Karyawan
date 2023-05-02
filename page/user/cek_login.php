
<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include "../../config.php";
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// Mengecek Login user
$query = mysqli_query($koneksi,"SELECT * FROM t_user where username='$username' AND password='$password'")
					or die('Ada kesalahan pada query user:'.mysqli_error($koneksi));
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

// Mengecek apakah data yg ditemukan
if($cek > 0){
	$data  = mysqli_fetch_assoc($query);

	$_SESSION['id_user']   = $data['id_user'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['status'] = "login";
	
	header("location:../../main.php?page=alternatif");// Jika Data user ditemukan
}else{
	header("location:../../index.php?pesan=gagal");
}
?>