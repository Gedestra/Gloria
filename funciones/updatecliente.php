<?php 
	include("conexion.php");
	$id_cliente=$_POST['id_cliente'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$ocupacion=$_POST['ocupacion'];
	$direccion=$_POST['direccion'];
	$estado=$_POST['estado'];
	$pais=$_POST['pais'];
	$municipio=$_POST['municipio'];
	if($pais !== "México"){
		$query="UPDATE clientes SET nombres = '$nombre', apellidos = '$apellido', correo = '$correo', telefono = '$telefono', ocupacion = '$ocupacion', direccion = NULL, estado = NULL, pais = '$pais', municipio = NULL WHERE id_cliente = '$id_cliente'";
	}else{
		$query="UPDATE clientes SET nombres = '$nombre', apellidos = '$apellido', correo = '$correo', telefono = '$telefono', ocupacion = '$ocupacion', direccion = '$direccion', estado = '$estado', pais = '$pais', municipio = '$municipio' WHERE id_cliente = '$id_cliente'";
	}
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
?>