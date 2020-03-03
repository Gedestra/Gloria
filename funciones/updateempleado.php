<?php 
include("conexion.php");
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$estatus = $_POST['estatus'];
$puesto = $_POST['puesto'];
$id_empleado = $_POST['id_empleado'];
$sucursal = $_POST['sucursal'];
if ($estatus=="nuller") {
	$conestatus="Inactivo";
}else{
	$conestatus="Activo";
}
$query = "UPDATE empleados SET  
	correo = '$correo', 
	telefono = '$telefono', 
	estatus = '$conestatus',
	puesto = '$puesto',
	id_sucursal = '$sucursal'
	WHERE id_empleado = '$id_empleado'  ";

$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
mysql_close($connection);
?>