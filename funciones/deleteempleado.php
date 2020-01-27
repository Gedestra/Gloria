<?php 
include("conexion.php");
$id_empleado=$_POST['id_empleado'];
$query="UPDATE empleados SET estatus = 'Eliminado' WHERE id_empleado = $id_empleado";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../empleados.php?empleado=delete">';
}

?>