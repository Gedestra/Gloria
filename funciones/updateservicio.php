<?php 
include("conexion.php");
$conexion->query("SET NAMES 'utf8'");
$id_servicio=$_POST['id_servicio'];
$nombre=$_POST['nombre'];
$precio_lista=$_POST['precio'];
$tipo=$_POST['tipo'];
$estatus=$_POST['estatus'];
if ($estatus==null) {
	$addestatus='Inactivo';
}else{
	$addestatus='Activo';
}
$query="UPDATE servicios SET nombre_servicio = '$nombre', precio_lista = '$precio_lista', tipo = '$tipo', estatus = '$addestatus' WHERE id_servicio = '$id_servicio'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../servicios.php?servicio=update">';
}

?>