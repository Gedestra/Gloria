<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$nombre=$_POST['grupo'];
	$query="INSERT INTO grupo_servicio (id_grupo_servicio, nombre_grupo_servicio) VALUES (NULL, '$nombre')";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?grupo=add">';
	}
}
?>