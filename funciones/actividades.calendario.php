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
	$row = array(
		$nombre_actividad = $res['nombre_actividad'],
		$nombre_empleado = $res['nombre_empleado'],
		$apellido_empleado = $res['apellidos_empleados'],
		$fecha_inicio=$res['fecha_hora_inicio'],
		$fecha_termino=$res['fecha_hora_termino']
	);
	array_push($actividades, $row);
}

echo json_encode($actividades);

?>