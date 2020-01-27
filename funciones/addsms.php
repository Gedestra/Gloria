<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$mensaje=$_POST['mensaje'];
	$nombre=$_POST['nombre'];
	$programacion=$_POST['programacion'];
	$query="INSERT INTO sms_tipo (id_sms, etiqueta_sms, nombre, body) VALUES (NULL, '$nombre', '$programacion', '$mensaje');";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?sms=add">';
	}
}
?>