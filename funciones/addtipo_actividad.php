<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$nombre=$_POST['nombre'];
	$estatus=$_POST['estatus'];
	$sincronizar=$_POST['sincronizar'];
	$idicon=$_POST['idicon'];
	$confirmar=$_POST['addconfirmar'];
	if ($confirmar==null) {
		$addconfirmar="No confirmable";
	}else{
		$addconfirmar="Confirmable";
	}
	if ($estatus==null) {
		$conestatus="Inactivo";
	}else{
		$conestatus="Activo";
	}
	if ($sincronizar==null) {
		$addsincronizar="Inactivo";
		$query="INSERT INTO tipo_actividad (id_tipo_actividad, nombre_tipo_actividad, estatus, confirmar, sincronizar_tipo_actividad, id_icon) VALUES (NULL, '$nombre', '$conestatus', '$addconfirmar', '$addsincronizar', '$idicon')";
		$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if ($resultado) {
			echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?tipo_actividad=add">';
		}
	}else{
		$addsincronizar="Activo";
		$query="INSERT INTO tipo_actividad (id_tipo_actividad, nombre_tipo_actividad, estatus, confirmar, sincronizar_tipo_actividad,id_icon) VALUES (NULL, '$nombre', '$conestatus', '$addconfirmar', '$addsincronizar', '$idicon')";
		$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if ($resultado) {
			$id=$conexion->insert_id;
			foreach ($_POST['id_sms'] as $key => $value) {
				$query="INSERT INTO sms_relacion (id_relacion_sms, id_sms, id_tipo_actividad, estatus) VALUES (NULL, '$value', '$id', 'Activo')";
				$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
				if ($resultado) {
					echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?relacion=add">';
				}
			}
		}
	}
	
}
?>