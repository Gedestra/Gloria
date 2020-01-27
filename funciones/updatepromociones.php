<?php 
include("conexion.php");
$conexion->query("SET NAMES 'utf8'");
$id_promocion=$_POST['id_promocion'];
$nombre=$_POST['nombre'];
$fecha_vigencia=$_POST['fecha_vigencia'];
$porcentaje=$_POST['porcentaje'];
$estatus=$_POST['estatus'];
if ($estatus==null) {
	$addestatus='Inactivo';
}else{
	$addestatus='Activo';
}
$query="UPDATE promociones SET nombre = '$nombre', estatus = '$addestatus', fecha_vigencia = '$fecha_vigencia', porcentaje = '$porcentaje' WHERE id_promocion = '$id_promocion'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../promociones.php?promocion=update">';
}

?>