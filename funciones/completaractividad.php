<?php
if ($_POST) {
	include("conexion.php");
	$id_actividad=$_POST['id_actividad'];
	$id_cliente=$_POST['id_cliente'];
	$query="UPDATE actividades SET completado = 'Completado' WHERE id_actividad = '$id_actividad'";
	$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	if ($resultado) {
		$query2="SELECT * FROM actividades WHERE id_cliente='$id_cliente' AND  completado='No completado'";
		$resultado2= $conexion->query($query2);
		$total=mysqli_num_rows($resultado2);
		if ($total>0) {
			echo "Hay otra actividad";
		}else{
			echo "No hay otra actividad";
		}
	}
}