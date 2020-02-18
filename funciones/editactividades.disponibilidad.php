<?php
include("session.php");
$conexion->query("SET NAMES 'utf8'");
$actividades = array();
$id_actividad_post=$_POST['id_actividad'];
$query = "
SELECT
ac.confirmar,
a.confirmado,
a.id_empleado,
ac.id_tipo_actividad,
a.id_Actividad,
nombre_tipo_Actividad,
c.id_cliente,
c.nombres AS nombreCliente,
c.apellidos AS apellidoCliente,
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
a.id_Actividad = '$id_actividad_post'";
$resultado = $conexion->query($query);
$res = $resultado->fetch_assoc();
$row = array(
	$id_tipo_actividad= $res['id_tipo_actividad'],
	$nombre_actividad = $res['nombre_actividad'],
	$id_empleado=$res['id_empleado'],
	$id_cliente=$res['id_cliente'],
	$confirmable=$res['confirmar']
);
array_push($actividades, $row);
echo json_encode($actividades);
?>
