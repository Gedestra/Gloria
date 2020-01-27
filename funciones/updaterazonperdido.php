<?php 
include("conexion.php");
$conexion->query("SET NAMES 'utf8'");
$id_razon_perdido=$_POST['id_razon_perdido'];
$nombre=$_POST['nombre'];
$estatus=$_POST['estatus'];
if ($estatus!=null) {
	$addestatus='Inactivo';
}else{
	$addestatus='Activo';
}
$query="UPDATE razon_perdido SET label_razon_perdido = '$nombre', estatus = '$addestatus' WHERE id_razon_perdido = '$id_razon_perdido'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?razon_perdido=update">';
}

?>