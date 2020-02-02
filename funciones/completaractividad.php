<?php
if ($_POST) {
	include("conexion.php");
	$id_actividad=$_POST['id_actividad'];
	$query="UPDATE actividades SET completado = 'Completado' WHERE id_actividad = '$id_actividad'";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		echo "Datos Guardados";
	}
}