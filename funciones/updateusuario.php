<?php 
include("conexion.php");
$id_usuario=$_POST['userid'];
$usuario=$_POST['nombre'];
$rol=$_POST['rol'];

$query="UPDATE usuarios SET username = '$usuario', rol = '$rol' WHERE id_usuario = '$id_usuario'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));


?>