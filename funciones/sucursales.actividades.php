<?php 
include("session.php");
$conexion->query("SET NAMES 'utf8'");
$actividades = array();
$query = "SELECT * FROM sucursales";
$resultado = $conexion->query($query);
while($res = $resultado->fetch_assoc()){
	$row = array(
		$nombre_empleado = $res['nombre'],
		$id_empleado = $res['id_sucursal']
	);
	array_push($actividades, $row);
}
echo json_encode($actividades);
 ?>