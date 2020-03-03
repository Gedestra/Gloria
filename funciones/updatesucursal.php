<?php 
include("conexion.php");
$id_sucursal=$_POST['id_sucursal'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$estatus=$_POST['estatus'];

if ($estatus=="nuller") {
	$conestatus="Inactivo";
}else{
	$conestatus="Activo";
}
$query="UPDATE sucursales SET nombre = '$nombre', direccion = '$direccion', estatus = '$conestatus' WHERE id_sucursal = '$id_sucursal'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
mysql_close($connection);
?>