<?php 
include "../../config.php";
$id 					= $_POST['id'];
$id_kriteria	= $_POST['id_kriteria'];
$subkriteria	= $_POST['subkriteria'];
$nilai				= $_POST['nilai'];

if($_POST['id_hapus']){
	$id = $_POST['id_hapus'];

	$sql = "DELETE FROM t_subkriteria WHERE id_subkriteria='$id';
			ALTER TABLE t_subkriteria DROP id_subkriteria;
			ALTER TABLE t_subkriteria ADD id_subkriteria int(10) NOT NULL AUTO_INCREMENT FIRST,ADD PRIMARY KEY(id_subkriteria)";
	$hapus = mysqli_multi_query($koneksi,$sql);
}elseif ($id == "") {
	$sql = mysqli_query($koneksi, "INSERT INTO t_subkriteria (id_kriteria,subkriteria,nilai) VALUES ('$id_kriteria','$subkriteria','$nilai')");
}else{
	$sql = mysqli_query($koneksi, "UPDATE t_subkriteria SET id_kriteria='$id_kriteria',subkriteria='$subkriteria',nilai='$nilai' WHERE id_subkriteria='$id'");
}
?>
