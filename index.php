
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | SPK Pemilih Karyawan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale-1">
	<meta name="description" content="SPK Pemilih Karyawan">
    <meta name="author" content="Misbachul Munir" />
    <!-- favicon -->
   	<link rel="icon" type="image/png"  href="assets/images/favicon.png"/>
	<!--========================Css Login Template=======================-->
		<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">	
		<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">	
		<link rel="stylesheet" type="text/css" href="vendor/login/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
		<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
	<!--========================Css Login Template=======================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						<img src="assets/images/favicon.png" width="20%">
						<div>Sistem Pemilih Karyawan Baru</div>
					</span>
				</div>

				<form class="login100-form validate-form" action="page/user/cek_login.php" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label><br>
							<?php 
								if(isset($_GET['pesan'])){
									if($_GET['pesan'] == "gagal"){
										echo "Login gagal! username dan password salah!";
									}else if($_GET['pesan'] == "logout"){
										echo "Anda telah berhasil logout";
									}else if($_GET['pesan'] == "belum_login"){
										echo "Anda harus login untuk mengakses halaman admin";
									}
								}
							?>
						</div>
					</div>
					<div class="container-login100-form-btn"><br><br><br>
						<input type="submit"  class="login100-form-btn" value="Login">
         			 </div>
				</form>
			</div>
			
		</div>
	</div>

	<!--========================Css Login Template=======================-->
		<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
		<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
		<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/login/vendor/select2/select2.min.js"></script>
		<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
		<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
		<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
		<script src="assets/login/js/main.js"></script>
	<!--========================Css Login Template=======================-->
</body>
</HTML>
