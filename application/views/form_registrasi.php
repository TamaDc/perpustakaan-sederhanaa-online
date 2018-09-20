<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url()."assets/assets/login/images/icons/"?>favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/vendor/bootstrap/css/"?>bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/fonts/font-awesome-4.7.0/css/" ?>font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/fonts/iconic/css/" ?> material-design-iconic-font.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/vendor/css-hamburgers/" ?>hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/vendor/animsition/css/" ?>animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/vendor/select2/" ?> select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/vendor/daterangepicker/" ?>daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/css/" ?>util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets/login/css/" ?>main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<form action="<?php echo base_url('index.php/auth/registrasi_member'); ?>" method="post">
	<div class="container-login100" style="background-color: black;">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<center><img width="150" height="200" src="<?php echo base_url()."assets/assets/img/"; ?>book.jpg" /></center><br>
			<form class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Perpustakaan Online
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="no_member" placeholder="No Member">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="nama_member" placeholder="Nama Member">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="alamat" placeholder="Alamat">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="no_hp" placeholder="No HP">
					<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Sign In
					</button>
				</div>

				
			</form>

			
		</div>
	</div>
	</form>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url()."assets/assets/login/vendor/jquery/"?>jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."assets/assets/login/vendor/animsition/js/"?>animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."assets/assets/login/vendor/bootstrap/js/"?>popper.js"></script>
	<script src="<?php echo base_url()."assets/assets/login/vendor/bootstrap/js/"?>bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."assets/assets/login/vendor/select2/"?>select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."assets/assets/login/vendor/daterangepicker/"?>moment.min.js"></script>
	<script src="<?php echo base_url()."assets/assets/login/vendor/daterangepicker/"?>daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."assets/assets/login/vendor/countdowntime/"?>countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."assets/assets/login/js/"?>main.js"></script>

</body>
</html>