<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$id_grupo_servicio=$_POST['id_grupo_servicio'];
	$id_servicio=$_POST['id_servicio'];
	$query="INSERT INTO relacion_servicio_grupo (id_relacion_servicio, id_servicio, id_grupo_servicio) VALUES (NULL, '$id_servicio', '$id_grupo_servicio')";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?relacion=add">';
	}
}
?>