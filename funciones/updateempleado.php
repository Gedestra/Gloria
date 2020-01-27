<?php 
include("conexion.php");
$conexion->query("SET NAMES 'utf8'");
$id_empleado=$_POST['id_empleado'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$puesto=$_POST['puesto'];
$sucursal=$_POST['sucursal'];
$estatus=$_POST['estatus'];
if ($estatus==null) {
	$conestatus="Inactivo";
}else{
	$conestatus="Activo";
}
$query="UPDATE empleados SET correo = '$correo', telefono = '$telefono', estatus = '$conestatus', puesto = '$puesto' WHERE id_empleado = '$id_empleado'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../empleados.php?empleado=update">';
}

?>