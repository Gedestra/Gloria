<?php 
include("session.php");
$conexion->query("SET NAMES 'utf8'");
$nombregrupo=$_POST['nombregrupo'];
$id_grupo=$_POST['id_grupo'];
$query = "UPDATE grupo_servicio SET nombre_grupo_servicio = '$nombregrupo' WHERE id_grupo_servicio = '$id_grupo'";
$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
if ($resultado) {
	if ($_POST['servcios']!=null) {
		$query4 = "SELECT * FROM relacion_servicio_grupo WHERE id_grupo_servicio='$id_grupo'";
		$resultado4=$conexion->query($query4);
		while ($row=$resultado4->fetch_assoc()) {
			$idrelacion=$row['id_relacion_servicio'];
			$query2 = "DELETE FROM relacion_servicio_grupo WHERE id_relacion_servicio= '$idrelacion'";
			$resultado2 = $conexion->query($query2) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		}
		foreach ($_POST['servcios'] as $key => $value) {
			$query3="INSERT INTO relacion_servicio_grupo (id_relacion_servicio, id_servicio, id_grupo_servicio) VALUES (NULL, '$value', '$id_grupo')";
			$resultado3 = $conexion->query($query3) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		}
	}
}

?>