<?php
include("session.php"); 
$idtipoactividad = $_POST['idtipoactividad'];
$fecha_inicio = $_POST['fechainicial'];
$fecha_final = $_POST['fechafinal'];
$fecha=substr($fecha_inicio, 0, 10);
$hora=substr($fecha_inicio, 11, 9);
$quitar =str_replace(' ', '', $hora);
$origina=$fecha." ".$quitar;
$id_cliente = $_POST['idcliente'];
$id_empleado = $_POST['idempleado'];
$id_usuario = $_POST['idusuario'];
$nombre_actividad = $_POST['nombreactividad'];
$id_actividad = $_POST['id_actividad'];
$req = array($idtipoactividad, $origina, $fecha_final, $id_cliente, $id_empleado, $id_usuario, $completado, $nombre_actividad);

foreach($req as $content){
	if($content == null){
		echo "hay un campo vacio en la solicitud: ".$content;
	}
}
$query = "UPDATE actividades SET nombre_actividad = '$nombre_actividad', fecha_hora_inicio = '$origina', fecha_hora_termino = '$fecha_final', id_tipo_actividad = '$idtipoactividad', id_cliente = '$id_cliente', id_empleado = '$id_empleado', id_usuario = '$id_usuario' WHERE id_actividad = '$id_actividad'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if($resultado){
	echo "elemento agregado a la consulta!";
}else{
	echo "Hubo un problema para guardarlo en la bd: ".$resultado;
}
?>