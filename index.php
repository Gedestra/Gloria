<?php 
include("funciones/conexion.php"); 
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// $captcha=$_POST['g-recaptcha-response'];
	// $secret="6LdhRc4UAAAAAPtuw4R0ks8f2mXIvNFgKgAPmZ92";
	// if (!$captcha) {
	// 	$captchaerror=true;
	// }
	// $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
	// $arr=json_decode($response, true);
	// if ($arr['success']) {
		$username = mysqli_real_escape_string($conexion,$_POST['username']);
		$mypassword = mysqli_real_escape_string($conexion,$_POST['password']); 

		$sql = "SELECT username, password,rol FROM usuarios WHERE username = '$username' and password = '$mypassword'";
		$result = mysqli_query($conexion,$sql) or die(header("location: index.php"));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		if($row['rol']=='Empleado') {
			$_SESSION['login_user'] = $username;
			header("location: inicio.php");
		}else if($row['rol']=='Administrador'){
			$_SESSION['login_user'] = $username;
			header("location: inicio.php");
		}else{
			$error=true;
		}		
	// s
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>3D LASHES | Login</title>
	<meta name="description" content="Login page example">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

	<!--end::Fonts -->

	<!--begin::Page Custom Styles(used by this page) -->
	<link href="assets/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />

	<!--end::Page Custom Styles -->

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="img/logo1.png" />
	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

	<!-- begin:: Page -->
	<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(assets/media/bg/bg-3.jpg);">
				<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
					<div class="kt-login__container">
						<div class="kt-login__logo">
							<a href="#">
								<img src="img/logo1.png" width="300">
							</a>
						</div>
						<div class="kt-login__signin" id="test2">
							<div class="kt-login__head">
								<h3 class="kt-login__title">Inicia tu sesión</h3>
							</div>
							<form class="kt-form" method="POST" action="">
								<div class="input-group">
									<input class="form-control" type="text" placeholder="Usuario" name="username" autocomplete="off">
								</div>
								<div class="input-group">
									<input class="form-control" type="password" placeholder="Contraseña" name="password">
								</div>
								<?php if ($error!=false) {
									echo "<div style='text-align: center;'><span style='color: red; text-align: center;'>Usuario o contreseña incorrectos</span></div>";
								} ?>
								<div class="row kt-login__extra">
										<!-- <div class="col">
											<label class="kt-checkbox">
												<input type="checkbox" name="remember"> Remember me
												<span></span>
											</label>
										</div> -->
										<div class="col kt-align-right">
											<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">¿Olvidaste tu contraseña?</a>
										</div>
									</div>
									<div style="display: flex;align-items: center; justify-content: center;">
										<div class="g-recaptcha" data-sitekey="6LdhRc4UAAAAALwJeGFEGB_xl6ennJAAdf14NyGv"></div>
									</div>
									<?php 
									if ($captchaerror!=false) {echo "<div style='text-align: center;'>
									<span style='color: red; text-align: center;'>Marque recaptcha</span>
									</div>";}?>
									<div class="kt-login__actions">
										<button type="submit"  class="btn btn-danger btn-lg">Iniciar</button>
									</div>
								</form>
							</div>
							<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign Up</h3>
									<div class="kt-login__desc">Enter your details to create your account:</div>
								</div>
								<form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Fullname" name="fullname">
									</div>
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
									</div>
									<div class="row kt-login__extra">
										<div class="col kt-align-left">
											<label class="kt-checkbox">
												<input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
												<span></span>
											</label>
											<span class="form-text text-muted"></span>
										</div>
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__forgot" id="test">
								<div class="kt-login__head">
									<h3 class="kt-login__title">¿Olvidaste tu contraseña?</h3>
									<div class="kt-login__desc">Por favor ingresa tu correo</div>
								</div>
								<form class="kt-form" action="funciones/enviar.php" method="POST">
									<div class="input-group">
										<input class="form-control" type="email" placeholder="Correo" name="email" id="kt_email" autocomplete="off">
									</div>
									<div class="kt-login__actions">
										<button  class="btn btn-brand btn-elevate kt-login__btn-primary">Enviar</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancelar</button>
									</div>
								</form>
							</div>
							<!-- <div class="kt-login__account">
								<span class="kt-login__account-msg">
									Don't have an account yet ?
								</span>
								&nbsp;&nbsp;
								<a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="assets/js/pages/custom/login/login-general.js" type="text/javascript"></script>
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
	</html>