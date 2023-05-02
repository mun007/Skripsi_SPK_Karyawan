<?php

/**
 * Database connection setup
 */

$koneksi = mysqli_connect("localhost","root","","db_saw");
// cek koneksi
if (mysqli_connect_errno())
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

