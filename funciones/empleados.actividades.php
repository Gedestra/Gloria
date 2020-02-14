<?php  
include("session.php");
$conexion->query("SET NAMES 'utf8'");
$actividades = array();
$query = "SELECT e.nombre, e.apellidos, id_empleado, s.nombre AS namesucursal, s.id_sucursal FROM empleados AS e INNER JOIN sucursales AS s ON e.id_sucursal=s.id_sucursal";
$resultado = $conexion->query($query);
while($res = $resultado->fetch_assoc()){
	switch ($res['id_empleado']) {
		case '1':

		$color="#2ecc71";
		break;
		case '2':
		$color="#1abc9c";
		break;
		case '3':
		$color="#3498db";
		break;
		case '4':
		$color="#34495e";
		break;
		case '5':
		$color="#9b59b6";
		break;
		case '6':
		$color="#16a085";
		break;
		case '7':
		$color="#2c3e50";
		break;
		case '8':
		$color="#2980b9";
		break;
		case '9':
		$color="#8e44ad";
		break;
		case '10':
		$color="#27ae60";;
		break;
		case '11':
		$color="#f1c40f";
		break;
		case '12':
		$color="#e67e22";
		break;
		case '13':
		$color="#e74c3c";
		break;
		case '14':
		$color="#ecf0f1";
		break;
		case '15':
		$color="#95a5a6";
		break;
		case '16':
		$color="#f39c12";
		break;
		case '17':
		$color="#d35400";
		break;
		case '18':
		$color="#c0392b";
		break;
		case '19':
		$color="#bdc3c7";
		break;
		default:
		$color="#7f8c8d";
		break;
	}
	$row = array(
		$nombre_empleado = $res['nombre'],
		$apellido_empleado = $res['apellidos'],
		$id_empleado = $res['id_empleado'],
		$color_empleado=$color,
		$nombre_sucursal=$res['namesucursal'],
		$id_sucursal=$res['id_sucursal']
	);
	array_push($actividades, $row);
}

echo json_encode($actividades);

?>