<?php  
include("session.php");
$conexion->query("SET NAMES 'utf8'");
$actividades = array();
$query = "
SELECT
ac.confirmar,
a.confirmado,
a.id_empleado,
ac.id_tipo_actividad,
a.id_Actividad,
nombre_tipo_Actividad,
c.id_cliente,
c.nombres,
c.apellidos,
c.correo,
c.telefono,
fecha_hora_inicio,
fecha_hora_termino,
nombre_actividad,
id_icon,
e.nombre AS nombre_empleado,
e.apellidos AS apellidos_empleados
FROM
actividades AS a
INNER JOIN clientes AS c
ON
a.id_cliente = c.id_cliente
INNER JOIN tipo_actividad AS ac
ON
a.id_tipo_actividad = ac.id_tipo_actividad
INNER JOIN empleados AS e
ON
a.id_empleado=e.id_empleado
WHERE
a.completado = 'No completado'";
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
		$nombre_actividad = $res['nombre_actividad'],
		$nombre_empleado = $res['nombre_empleado'],
		$apellido_empleado = $res['apellidos_empleados'],
		$fecha_inicio=$res['fecha_hora_inicio'],
		$fecha_termino=$res['fecha_hora_termino'],
		$id_empleado=$color,
		$nombre_actividad=$res['nombre_tipo_Actividad']
	);
	array_push($actividades, $row);
}

echo json_encode($actividades);

?>