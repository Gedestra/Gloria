<?php 
if(!empty($_POST['email'])){
	include("conexion.php");
	$conexion->query("SET NAMES 'utf8'");
	$correo=$_POST['email'];
	$query="SELECT nombre, correo FROM empleados WHERE correo='$correo'";
	$resultado=$conexion->query($query);
	$total=mysqli_num_rows($resultado);
	$row=$resultado->fetch_assoc();
	if ($total>0) {
		$resetPassLink="http://crm.lashes.mx/index.php";
		$destinatario = $correo; 
		$asunto = "Restablecimiento de contraseña de sistema Lira Avitia"; 
		$cuerpo = " 
		<!DOCTYPE html>
		<html lang='en'>
		<head>
		<meta charset='UTF-8'>
		<title>Document</title>
		</head>
		<body>
		<style type='text/css'>
		body{
			color: #434343	;font-family: helvetica
		}
		img{width: 100%}
		p{text-align: center;

		}
		h1,h2,h3{text-align: center;

		}
		h4,h5,h6{text-align: center;

		}
		#tituloh1{font-style: italic;font-weight: bold;

	}
	.etiqueta{color:#67237b;text-align: justify;

	}
	form{padding: 20px 10%}
	</style>
	<p>Te proporcionamos los datos de tu cuenta.<br>
	Has click en el enlace para recuperar tu contraseña</p>

	<div align='left' style='margin:left;width: 40%;border-style: inset;padding-left: 20px;padding-bottom: 20px;padding-right: 20px;border-color: #3A6DAF;background-color: #efefef;'>
	<h3 style='color: black'>Datos de tu cuenta</h3>
	<p class='etiqueta'>Usuario: $correo </p>
	<a href='http://sistema.liravitiasc.com.mx/update.php?id='>Actualizar contraseña</a>		
	</div>
	</body>
	</html>
	"; 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "From: Lira Avitia <info@liravitiasc.com.mx>\r\n"; 
	$headers .= "Reply-To: info@liravitiasc.com.mx\r\n"; 
	$headers .= "Return-path: '$correo'\r\n";
	mail($destinatario,$asunto,$cuerpo,$headers);
		header("Location:../index.php?uodatepass=true");
	}else{
		header("Location:../index.php?uodatepass=error");
	}
}else{
	header("Location:../index.php");
}

?>