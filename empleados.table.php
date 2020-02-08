<?php 
include("funciones/conexion.php");
$conexion->query("SET NAMES 'utf8'");
$filtro=$_POST['filtrado'];
if ($filtro=="*") {
	$query = "SELECT * FROM empleados WHERE estatus='Activo' OR estatus='Inactivo' ORDER BY estatus ASC";
	echo "<script>
	$('#todos').val('*');
	</script>";
}else if ($filtro=='Activos') {
	$query = "SELECT * FROM empleados WHERE estatus='Activo'";
	echo "<script>
	$('#todos').val('Activos');
	</script>";
}else if ($filtro=='Inactivos') {
	$query = "SELECT * FROM empleados WHERE estatus='Inactivo'";
	echo "<script>
	$('#todos').val('Inactivos');
	</script>";
}else{
	$query = "SELECT * FROM empleados WHERE estatus='Activo'";
	echo "<script>
	$('#todos').val('Activos');
	</script>";
}
$resultado=$conexion->query($query);
while ($row=$resultado->fetch_assoc()) {
	$fecha_nacimiento_cumple=strtotime($row['fecha_nacimiento']);
	$mes = date("m", $fecha_nacimiento_cumple);
	
	$cumple=$mes;
	$fechaActual = strtotime(date('d-m-Y'));
	$mesactual = date("m", $fechaActual);
	$compara=$mesactual;
	$sucursal=$row['id_sucursal'];
	$query3 = "SELECT nombre FROM sucursales WHERE id_sucursal='$sucursal'";
	$resultado3=$conexion->query($query3);
	$row2=$resultado3->fetch_assoc();
	$datos=$row['id_empleado']."||".$row['nombre']."||".$row['apellidos']."||".$row['correo']."||".$row['telefono']."||".$row['sexo']."||".$row['fecha_nacimiento']."||".$row['escolaridad']."||".$row['estado_civil']."||".$row['numero_hijos']."||".$row['fecha_ingreso']."||".$row['numero_imss']."||".$row['curp']."||".$row['rfc']."||".$row['puesto']."||".$row['estatus']."||".$row['id_sucursal']."||".$row2['nombre']."||".$cumple;
	?>
	<tr>
		<td><a class="dropdown-item" href="#" onclick="agregaform('<?php echo $datos ?>')" data-toggle="modal" data-target="#kt_modal_5"><?php 
		if ($cumple==$compara) {
			echo "<i class='la la-birthday-cake fa-1x' style='color: #1dc9b7'></i> ";
			$cumple="Activo";
		}else{
			$cumple="Inactivo";
		}
		echo $row['nombre'].' '.$row['apellidos']; ?></a></td>
		<td><?php echo $row['correo']; ?></td>
		<td><?php echo $row['telefono']; ?></td>
		<td><?php echo $row2['nombre']; ?></td>
		<td><?php if($row['estatus']=='Activo'){
			echo "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-success'>Activo</span>";
		}else{
			echo "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-danger'>Inactivo</span>";
		} ?></td>
		<td>
			<div class="btn-group" role="group">
				<div class="btn-group" role="group">
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
					<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
						<a class="dropdown-item" href="#" onclick="agregaform('<?php echo $datos ?>')" data-toggle="modal" data-target="#kt_modal_5"><i class="la la-eye"></i>Ver detalles</a>
						<a class="dropdown-item" href="#" onclick="editarform('<?php echo $datos ?>')" data-toggle="modal" data-target="#kt_modal_4"><i class="la la-edit"></i>Editar Empleado</a>
					</div>
				</div>
			</div>
		</td>
	</tr>
<?php } ?>