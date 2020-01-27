<?php  
include("funciones/session.php"); 
$query="SELECT rol FROM usuarios WHERE username='$username'";
$resultado = $conexion->query($query);
$row=$resultado->fetch_assoc();
$sesion=$row['rol']; 
if ($sesion !='Administrador' && $sesion !='Empleado') {
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
	<base href="">
	<meta charset="utf-8" />
	<title>3D LASHES | Usuarios</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

	<!--end::Fonts -->

	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Global alertifly -->
	<link rel="stylesheet" href="funciones/alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="funciones/alertifyjs/css/themes/default.css">
	<script src="funciones/alertifyjs/alertify.js"></script>
	<!--begin::Layout Skins(used by all pages) -->

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body>
	<?php
	include("head.php");
	if ($_POST) {
		$conexion->query("SET NAMES 'utf8'");
		$username=$_POST['username'];
		$password=$_POST['password'];
		$id_empleado=$_POST['id_empleado'];
		$rol=$_POST['rol'];
		$query="INSERT INTO usuarios (id_usuario, id_empleado, username, password, rol) VALUES (NULL, '$id_empleado', '$username', '$password', '$rol');";
		$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if ($resultado) {
			echo "<script>alertify.set('notifier','position', 'botton-right');
			alertify.success('<strong>Agregado correctamente</strong>');</script>";
		}
	}
	if ($_GET['usuario']=='update') {
		echo "<script>alertify.set('notifier','position', 'botton-right');
		alertify.success('<strong>¡Usuario Actualizado!</strong>');</script>";
	}else if($_GET['usuario']=='delete'){
		echo "<script>alertify.set('notifier','position', 'botton-right');
		alertify.error('<strong>¡Usuario Eliminado!</strong>');</script>";
	} 
	?>
	<!-- end:: Header -->
	<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

		<!-- begin:: Subheader -->

		<!-- end:: Subheader -->

		<!-- begin:: Content -->
		<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head kt-portlet__head--lg">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon">
							<i class="flaticon-users-1" style="color: #2c77f4"></i>
						</span>
						<h3 class="kt-portlet__head-title">
							Listado de Usuarios
						</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<div class="kt-portlet__head-actions">
								&nbsp;
								<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_4">
									<i class="la la-plus"></i>
									Agregar usuario
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__body">

					<!--begin: Datatable -->
					<table class="table table-bordered table-hover" id="example">
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Rol</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							include("funciones/conexion.php");
							$conexion->query("SET NAMES 'utf8'");
							$query = "SELECT * FROM usuarios";
							$resultado=$conexion->query($query);
							while ($row=$resultado->fetch_assoc()) {
								$datos=$row['username']."||".$row['rol']."||".$row['id_usuario'];?>
								<tr>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['rol']; ?></td>
									<td>
										<div class="btn-group" role="group">
											<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
											<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
												<a class="dropdown-item" href="#" onclick="agregaform('<?php echo $datos ?>')" data-toggle="modal" data-target="#kt_modal_5"><i class="la la-edit"></i>Editar usuario</a>
												<a class="dropdown-item" href="#" onclick="daleform('<?php echo $datos ?>')" data-toggle="modal" data-target="#kt_modal_6"><i class="la la-close"></i>Eliminar Usuario</a>
											</div>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

					<!--end: Datatable -->
				</div>
			</div>
		</div>
		<!-- End begin:: Content-->
	</div>

	<!-- end:: Content -->
	<!-- begin::Sticky Toolbar -->
	<?php include("menu.php"); ?>
	<!-- end::Sticky Toolbar -->
	<!--begin::Modal agregar-->
	<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST">
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Usuario</label>
							<div class="col-10">
								<input type="text" class="form-control" name="username" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Asignar al empleado:</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="id_empleado" required>
									<option value="" style="display: none;">Seleccionar</option>
									<?php 
									$query1 = "SELECT id_empleado, nombre, apellidos FROM empleados WHERE estatus='Activo' ORDER BY nombre ASC";
									$resultado2=$conexion->query($query1);
									while ($row3=$resultado2->fetch_assoc()) {
										?>
										<option value="<?php echo $row3['id_empleado']; ?>"><?php echo $row3['nombre'].' '.$row3['apellidos']; ?></option><?php 
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Contraseña</label>
							<div class="col-10">
								<input type="password" class="form-control" id="pasw" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Confirmar contraseña</label>
							<div class="col-10">
								<input id="paswconf" type="password" class="form-control" name="password" required>
								<span style="color: red;display: none;" id="errorconfir">* La contraseña no coincide</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Rol</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="rol" required>
									<option value="" style="display: none;">Seleccionar</option>
									<option value="Administrador">Administrador</option>
									<option value="Encargado">Encargado</option>
									<option value="Empleado">Empleado</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="btnguardar">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--End begin::Modal agregar-->
<!--begin::Modal actualizar-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST">
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Usuario</label>
						<div class="col-10">
							<input type="text" class="form-control" name="username" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Contraseña</label>
						<div class="col-10">
							<input type="password" class="form-control" id="pasw" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Confirmar contraseña</label>
						<div class="col-10">
							<input id="paswconf" type="password" class="form-control" name="password" required>
							<span style="color: red;display: none;" id="errorconfir">* La contraseña no coincide</span>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Rol</label>
						<div class="col-10">
							<select class="form-control kt-selectpicker" name="rol" required>
								<option value="" style="display: none;">Seleccionar</option>
								<option value="Administrador">Administrador</option>
								<option value="Encargado">Encargado</option>
								<option value="Empleado">Empleado</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary" id="btnguardar">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!--End begin::Modal agregar-->
<!--begin::Modal actualizar-->
<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form action="funciones/updateusuario.php" method="POST">
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Usuario</label>
						<div class="col-10">
							<input type="text" class="form-control" id="upusername" name="username">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Rol</label>
						<div class="col-10">
							<select class="form-control kt-selectpicker" id="uprol" name="rol">
								<option value="" style="display: none;">Seleccionar</option>
								<option value="Administrador">Administrador</option>
								<option value="Encargado">Encargado</option>
								<option value="Empleado">Empleado</option>
							</select>
						</div>
					</div>
					<input type="text" class="form-control" id="upid" name="id_usuario" style="display: none;">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!--End begin::Modal agregar-->
<!--begin::Eliminar Modal-->
<div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form action="funciones/daleteusarios.php" method="POST">
					<p>¿Estas seguro que quieres eliminar al usuario  <span id="daleusuario"></span> ?</p>
					<p><strong>Este perderá completo acceso al sistema</strong></p>
					<input type="text" class="form-control" id="daleid" name="id_usuario" style="display: none;">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Aceptar</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!--End begin::Modal agregar-->
<script>
	var KTAppOptions = {
		"colors": {
			"state": {
				"brand": "#2c77f4",
				"light": "#ffffff",
				"dark": "#282a3c",
				"primary": "#5867dd",
				"success": "#34bfa3",
				"info": "#36a3f7",
				"warning": "#ffb822",
				"danger": "#fd3995"
			},
			"base": {
				"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
				"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
			}
		}
	};
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>

<!--end::Page Vendors -->
<script src="assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<!--begin::Page Scripts(used by this page) -->
<script src="assets/js/pages/dashboard.js" type="text/javascript"></script>
<!--begin::Page Scripts(used by this page) -->
<script src="assets/js/pages/crud/datatables/data-sources/html.js" type="text/javascript"></script>								
<!--end::Page Scripts -->
<!--begin::Page Scripts(used by this page) -->
<script src="assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<!--begin::Page Scripts(used by this page) -->
<script src="assets/js/pages/crud/forms/widgets/input-mask.js" type="text/javascript"></script>
<script src="assets/js/pages/crud/metronic-datatable/base/html-table.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('#example tfoot th').each( function () {
			var title = $(this).text();
			$(this).html( '<input type="text" placeholder="Buscar'+title+'" />' );
		} );


		var table = $('#example').DataTable({
			"language": {
				search: 'Buscar:',
				"lengthMenu": "Mostrando _MENU_ registros por pagina",
				"zeroRecords": "Sin datos",
				"info": "Mostrando _PAGE_ de _PAGES_",
				"infoEmpty": "Sin registros",
				"infoFiltered": "(filtrados de _MAX_)",
				paginate: {
					first: 'Primero',
					previous: 'Anterior',
					next: 'Siguiente',
					last: 'Último',
				}
			}
		});
		table.columns().every( function () {
			var that = this;

		} );
	} );
</script>
<script>
	document.getElementById('paswconf').addEventListener('input', function() {
		var campo = event.target;
		var confirma=$("#pasw").val();
		if (campo.value==confirma) {
			$("#errorconfir").hide();
			document.getElementById("btnguardar").disabled=false;
		} else {
			$("#errorconfir").show();
			document.getElementById("btnguardar").disabled=true;
		}
	});
</script>
<script>
	function agregaform(datos){
		d=datos.split('||');
		$('#upusername').val(d[0]);
		$('#uprol').val(d[1]);
		$('#upid').val(d[2]);
	}
</script>
<script>
	function daleform(datos){
		d=datos.split('||');
		$('#daleid').val(d[2]);
		$('#daleusuario').text(d[0]);
	}
</script>
</body>
<!-- end::Body -->
</html>