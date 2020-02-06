<?php
include("session.php");
$conexion->query("SET NAMES 'utf8'");
$confirmado=$_POST['confirmado'];
$id_actividad=$_POST['id_actividad'];
$query="UPDATE actividades SET confirmado = '$confirmado' WHERE id_actividad = '$id_actividad'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo 'Campo confirmado actualizado';
}