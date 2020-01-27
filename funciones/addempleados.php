<?php 
if ($_POST) {
	include("conexion.php");
	$conexion->query("SET NAMES 'utf8'");
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$sexo=(empty($_POST['sexo']))?NULL:$_POST['sexo'];
	$fecha_nacimiento=Date_create((empty($_POST['fecha_nacimiento']))?NULL:$_POST['fecha_nacimiento']);
	$new_date_nacimiento = Date_format($fecha_nacimiento, "Y-m-d");
	$escolaridad=(empty($_POST['escolaridad']))?NULL:$_POST['escolaridad'];
	$estado_civil=(empty($_POST['estado_civil']))?NULL:$_POST['estado_civil'];
	$numero_hijos=(empty($_POST['numero_hijos']))?NULL:$_POST['numero_hijos'];
	$fecha_ingreso=Date_create((empty($_POST['fecha_ingreso']))?NULL:$_POST['fecha_ingreso']);
	$new_date_ingreso = Date_format($fecha_ingreso, "Y-m-d");
	$numero_imss=(empty($_POST['numero_imss']))?NULL:$_POST['numero_imss'];
	$curp=(empty($_POST['curp']))?NULL:$_POST['curp'];
	$rfc=(empty($_POST['rfc']))?NULL:$_POST['rfc'];
	$puesto=(empty($_POST['puesto']))?NULL:$_POST['puesto'];
	$sucursal=(empty($_POST['sucursal']))?NULL:$_POST['sucursal'];
	if ($fecha_nacimiento==null) {
		$query2="INSERT INTO empleados (id_empleado, nombre, apellidos, correo, telefono, sexo, fecha_nacimiento, escolaridad, estado_civil, numero_hijos, fecha_ingreso, numero_imss, curp, rfc, puesto, estatus, id_sucursal) VALUES (NULL, '$nombre', '$apellidos', '$correo', '$telefono', '$sexo', NULL, '$escolaridad', '$estado_civil', '$numero_hijos', NULL, '$numero_imss', '$curp', '$rfc', '$puesto', 'Activo', '$sucursal')";
		$resultado2 = $conexion->query($query2) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if ($resultado2) {
			echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../empleados.php?empleado=add">';
		}
	}else{
		$query2="INSERT INTO empleados (id_empleado, nombre, apellidos, correo, telefono, sexo, fecha_nacimiento, escolaridad, estado_civil, numero_hijos, fecha_ingreso, numero_imss, curp, rfc, puesto, estatus, id_sucursal) VALUES (NULL, '$nombre', '$apellidos', '$correo', '$telefono', '$sexo', '$new_date_nacimiento', '$escolaridad', '$estado_civil', '$numero_hijos', '$new_date_ingreso', '$numero_imss', '$curp', '$rfc', '$puesto', 'Activo', '$sucursal')";
		$resultado2 = $conexion->query($query2) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if ($resultado2) {
			echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=../empleados.php?empleado=add">';
		}
	}
}
?>