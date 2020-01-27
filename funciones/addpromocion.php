<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$nombre=$_POST['nombre'];
	$estatus=$_POST['estatus'];
	$fecha_vigencia=$_POST['fecha_vigencia'];
	$Porcentaje=$_POST['Porcentaje'];
	if ($estatus==null) {
		$conestatus="Inactivo";
	}else{
		$conestatus="Activo";
	}
	$query="INSERT INTO promociones (id_promocion, nombre, estatus, fecha_vigencia, 	porcentaje) VALUES (NULL, '$nombre', '$conestatus', '$fecha_vigencia', '$Porcentaje')";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?promocion=add">';
	}
}
?>