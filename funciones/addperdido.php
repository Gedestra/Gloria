<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$nombre=$_POST['nombre'];
	$estatus=$_POST['estatus'];
	$query="INSERT INTO razon_perdido (id_razon_perdido, label_razon_perdido, estatus) VALUES (NULL, '$nombre', 'Activo')";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?razon_perdido=add">';
	}
}
?>