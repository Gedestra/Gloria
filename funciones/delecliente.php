<?php 
include("conexion.php");
$id_cliente=$_POST['id_cliente'];
$query="UPDATE clientes SET estatus = 'Inactivo' WHERE id_cliente = '$id_cliente'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../clientes.php?cliente=delete">';
}

?>