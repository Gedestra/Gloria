<?php 
include("conexion.php");
$conexion->query("SET NAMES 'utf8'");

for ($i=0; $i < count($_POST['id_razon_perdido']) ; $i++) {
	echo count($_POST['estatus']) ;
	$query="UPDATE razon_perdido SET estatus = '{$_POST['estatus'][$i]}' WHERE id_razon_perdido = '{$_POST['id_razon_perdido'][$i]}'";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
}
// $uniom=array_combine($_POST['id_razon_perdido'],$_POST['estatus']);
// 	print_r($uniom);
?>