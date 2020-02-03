<?php 
include("conexion.php");
$conexion->query("SET NAMES 'utf8'");
$id_tipo_actividad=$_POST['id_tipo_actividad'];
$nombre=$_POST['nombre'];
$estatus=$_POST['estatus'];
$sincronizar=$_POST['sincronizar'];
if ($estatus==null) {
	$addestatus='Inactivo';
}else{
	$addestatus='Activo';
}
if ($sincronizar==null) {
	$addsincronizar="Inactivo";
}else{
	$addsincronizar="Activo";
	if ($_POST['id_sms']!=null) {
		$query2 = "DELETE FROM sms_relacion WHERE id_tipo_actividad= '$id_tipo_actividad'";
		$resultado2 = $conexion->query($query2) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if ($resultado2) {
			foreach ($_POST['id_sms'] as $key => $value) {
				$query3="INSERT INTO sms_relacion (id_relacion_sms, id_sms, id_tipo_actividad, estatus) VALUES (NULL, '$value', '$id_tipo_actividad', 'Activo')";
				$resultado3 = $conexion->query($query3) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
			}
		}
	}else{
		$addsincronizar="Inactivo";
	}
}
$query="UPDATE tipo_actividad SET nombre_tipo_actividad = '$nombre', estatus = '$addestatus', sincronizar_tipo_actividad = '$addsincronizar' WHERE id_tipo_actividad = '$id_tipo_actividad'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?tipo_actividad=update">';
}

?>