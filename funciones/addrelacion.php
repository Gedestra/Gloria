<?php 
include("conexion.php"); 
if ($_POST) {
	$conexion->query("SET NAMES 'utf8'");
	$newid_grupo_servicio=$_POST['newnamegrupo'];
	$id_grupo_servicio=$_POST['id_grupo_servicio'];
	if ($newid_grupo_servicio) {
		$query="INSERT INTO grupo_servicio (id_grupo_servicio, nombre_grupo_servicio) VALUES (NULL, '$newid_grupo_servicio')";
		$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if (!$resultado) {
			return false;
		}else{
			$id=$conexion->insert_id;
			foreach ($_POST['servicios'] as $key => $value) {
				$query="INSERT INTO relacion_servicio_grupo (id_relacion_servicio, id_servicio, id_grupo_servicio) VALUES (NULL, '$value', '$id')";
				$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
				if (!$resultado) {
					return false;
				}else{
					echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?relacion=add">';
				}
			}
		}
	}else if($id_grupo_servicio){
		foreach ($_POST['servicios'] as $key => $value) {
			$query="INSERT INTO relacion_servicio_grupo (id_relacion_servicio, id_servicio, id_grupo_servicio) VALUES (NULL, '$value', '$id_grupo_servicio')";
			$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
			if (!$resultado) {
				return false;
			}else{
				echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../inicio.php?relacion=add">';
			}
		}
	}
}
?>
