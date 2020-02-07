<?php
include("session.php"); 
$conexion->query("SET NAMES 'utf8'");
$id_sms=$_POST['id_sms'];
$etiqueta_sms=$_POST['etiqueta_sms'];
$nombre=$_POST['nombre'];
$body=$_POST['body'];
$estatus=$_POST['estatus'];

$query="UPDATE sms_tipo SET etiqueta_sms = '$etiqueta_sms', nombre = '$nombre', body = '$body', estatus = '$estatus' WHERE id_sms = '$id_sms'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo "datos actualizado correctamente";
}

?>