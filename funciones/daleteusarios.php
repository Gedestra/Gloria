<?php 
include("conexion.php");
$id_usuario=$_POST['id_usuario'];
$query="DELETE FROM `usuarios` WHERE `id_usuario` = '$id_usuario'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../usuarios.php?usuario=delete">';
}

?>