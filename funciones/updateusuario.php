<?php 
include("conexion.php");
$conexion->query("SET NAMES 'utf8'");
$id_usuario=$_POST['id_usuario'];
$usuario=$_POST['username'];
$rol=$_POST['rol'];
$query="UPDATE usuarios SET username = '$usuario', rol = '$rol' WHERE id_usuario = '$id_usuario'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../usuarios.php?usuario=update">';
}

?>