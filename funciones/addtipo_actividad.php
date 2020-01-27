<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$nombre=$_POST['nombre'];
	$estatus=$_POST['estatus'];
	$sincronizar=$_POST['sincronizar'];
	if ($estatus==null) {
		$conestatus="Inactivo";
	}else{
		$conestatus="Activo";
	}
	if ($sincronizar==null) {
		$addsincronizar="Inactivo";
	}else{
		$addsincronizar="Activo";
	}
	$query="INSERT INTO tipo_actividad (id_tipo_actividad, nombre_tipo_actividad, estatus, sincronizar_tipo_actividad) VALUES (NULL, '$nombre', '$conestatus', '$addsincronizar')";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?razon_perdido=add">';
	}
}
?>