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
	<title>3D LASHES | Empleados</title>
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
	<link rel="shortcut icon" href="img/logo1.png" />
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js"></script>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body >
	<?php include("head.php"); 
	if ($_GET['empleado']=='update') {
		echo "<script>alertify.set('notifier','position', 'botton-right');
		alertify.success('<strong>Empleado Actualizado!</strong>');</script>";
	}else if($_GET['empleado']=='add'){
		echo "<script>alertify.set('notifier','position', 'botton-right');
		alertify.success('<strong>¡Empleado Agregado!</strong>');</script>";
	} 

	?>
	<!-- end:: Header -->
	<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
		<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head kt-portlet__head--lg">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon">
							<i class="flaticon-users-1" style="color: #2c77f4"></i>
						</span>
						<h3 class="kt-portlet__head-title">
							Listado de Empleados
						</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<div class="kt-portlet__head-actions">
								<div class="dropdown dropdown-inline">
									<button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="la la-download"></i> Exportar
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<ul class="kt-nav">
											<li class="kt-nav__section kt-nav__section--first">
												<span class="kt-nav__section-text">Elije una opción</span>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon la la-print"></i>
													<span class="kt-nav__link-text">Imprimir</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon la la-file-excel-o"></i>
													<span class="kt-nav__link-text">Excel</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								&nbsp;
								<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_7">
									<i class="la la-plus"></i>
									Agregar empleado
								</a>
							</div>
						</div>
					</div>
				</div>
				<div style="display: flex; justify-content: center; align-items: center; flex-direction: row; margin: 5px;">
					<form action="" method="POST">
						<select name="filtrado" id="todos">
							<option value="*">Todos</option>
							<option value="Activos">Activos</option>
							<option value="Inactivos">Inactivos</option>
						</select>
						<button type="submit">Filtrar</button>
					</form>
				</div>
				<div class="kt-portlet__body">
					<!--begin: Datatable -->
					<table class="table table-bordered table-hover" id="example">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Correo</th>
								<th>Teléfono</th>
								<th>Sucursal</th>
								<th>Estatus</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
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
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php include("menu.php"); ?>
		
	</div>
</div>
</div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar empleado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form action="funciones/addempleados.php" method="POST">
					<div class="kt-portlet__body">
						<div class="form-group row">
							<label for="recipient-name" class="col-2 col-form-label">Nombre(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" name="nombre" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Apellidos(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" name="apellidos" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Correo</label>
							<div class="col-10">
								<input class="form-control" id="kt_inputmask_9" name="correo" type="email" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Teléfono/Celular</label>
							<div class="col-10">
								<input class="form-control" name="telefono" id="kt_inputmask_3" type="text" required/>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Sexo</label><br>
							<label class="kt-radio kt-radio--tick kt-radio--success">
								<input type="radio" name="sexo" value="hombre">Hombre
								<span></span>
							</label>
							<label class="kt-radio kt-radio--tick kt-radio--success">
								<input type="radio" name="sexo" value="mujer">Mujer
								<span></span>
							</label>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Fecha de nacimiento</label>
							<div class="col-10">
								<input class="form-control" name="fecha_nacimiento" id="kt_inputmask_1" type="text" />
								<span class="form-text text-muted">Formato: <code>MM/DD/AAAA</code></span>
								<!-- <input type="date" class="form-control" name="fecha_nacimiento" required> -->
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Escolaridad</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="escolaridad">
									<option value="" style="display: none;">Seleccionar</option>
									<option value="preescolar">Educación preescolar</option>
									<option value="primaria">Educación primaria</option>
									<option value="secundaria">Educación secundaria</option>
									<option value="superior">Educación media superior</option>
									<option value="superior">Educación superior</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Estado civil</label><br>
							<label class="kt-radio kt-radio--tick kt-radio--success">
								<input type="radio" name="estado_civil" value="casado">Casado/a.
								<span></span>
							</label>
							<label class="kt-radio kt-radio--tick kt-radio--success">
								<input type="radio" name="estado_civil" value="soltero">Soltero/a.
								<span></span>
							</label>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Número de hijos</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="numero_hijos">
									<option value="" style="display: none;">Seleccionar</option>
									<option value="0">No hijos</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-2 col-form-label" style="padding-top: 0px;">Fecha de ingreso</label>
							<div class="col-10">
								<div class="input-group date">
									<input type="text" class="form-control" placeholder="Seleccionar" name="fecha_ingreso" id="kt_datepicker_4_1" required/>
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar"></i>
										</span>
									</div>
								</div>
								<!-- <input type="date" class="form-control" name="fecha_ingreso" required> -->
							</div>
						</div>
						
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Número de IMSS</label>
							<div class="col-10">
								<input type="text" class="form-control" name="numero_imss">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">CURP</label>
							<div class="col-10">
								<input type="text" class="form-control" name="curp">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">RFC</label>
							<div class="col-10">
								<input type="text" class="form-control" name="rfc">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Puesto</label>
							<div class="col-10">
								<input type="text" class="form-control" name="puesto">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Sucursal</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="sucursal" required>
									<option value="" style="display: none;">Seleccinar</option>
									<?php 
									$query = "SELECT * FROM sucursales WHERE estatus='Activo' ORDER BY nombre ASC";
									$resultado=$conexion->query($query);
									while ($row3=$resultado->fetch_assoc()) {
										?>
										<option value="<?php echo $row3['id_sucursal']; ?>"><?php echo $row3['nombre']; ?></option><?php 
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<!-- </form> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end::Modal-->
<!--begin::Editar Modal-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar empleado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form action="funciones/updateempleado.php" method="POST">
					<div class="kt-portlet__body">
						<div class="form-group row">
							<label for="recipient-name" class="col-2 col-form-label">Nombre(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" id="upnombre" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Apellidos(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" id="upapellido" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Estatus</label>
							<div class="col-10">
								<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
									<label>
										<input type="checkbox" id="upestatus" name="estatus" value="Activo">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Correo</label>
							<div class="col-10">
								<input class="form-control" id="upcorreo" name="correo" type="email" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Teléfono/Celular</label>
							<div class="col-10">
								<input class="form-control" name="telefono" id="uptelefono" type="text" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Puesto</label>
							<div class="col-10">
								<input type="text" class="form-control" name="puesto" id="uppuesto" >
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Sucursal</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="sucursal" id="upsucursal" required>
									<?php 
									$query = "SELECT * FROM sucursales WHERE estatus='Activo'";
									$resultado=$conexion->query($query);
									while ($row3=$resultado->fetch_assoc()) {
										?>
										<option value="<?php echo $row3['id_sucursal']; ?>"><?php echo $row3['nombre']; ?></option><?php 
									}
									?>
								</select>
							</div>
						</div>
						<input type="text" class="form-control" name="id_empleado" id="id_empleado" style="display: none;">
					</div>
					<!-- </form> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--End begin::Modal Editar-->
<!--begin::Modal ver-->
<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: transparent;border:none;">
			<div class="">
				<div class="kt-portlet kt-portlet--height-fluid-">
					<div class="kt-portlet__head  kt-portlet__head--noborder">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">

							</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal" aria-label="Close">
								<i class="la la-close"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">

								<!--begin::Nav-->
								<ul class="kt-nav">
									<li class="kt-nav__head">
										Opciones
										<span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
													<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
													<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
												</g>
											</svg> </span>
										</li>
										<li class="kt-nav__separator"></li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-drop"></i>
												<span class="kt-nav__link-text">Actividades</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
												<span class="kt-nav__link-text">Disponibilidad</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
												<span class="kt-nav__link-text">Settings</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-new-email"></i>
												<span class="kt-nav__link-text">Support</span>
												<span class="kt-nav__link-badge">
													<span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
												</span>
											</a>
										</li>
										<li class="kt-nav__separator"></li>
										<li class="kt-nav__foot">
											<a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
											<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
										</li>
									</ul>
									<!--end::Nav-->
								</div>
							</div>
						</div>
						<div class="kt-portlet__body kt-portlet__body--fit-y">

							<!--begin::Widget -->
							<div class="kt-widget kt-widget--user-profile-1">
								<div class="kt-widget__head">
									<div class="kt-widget__media">
										<span class="kt-media kt-media--primary kt-margin-r-2 kt-margin-t-2"><span style="width: 70px; height: 65px">EMP</span></span>
									</div>
									<div class="kt-widget__content">
										<div class="kt-widget__section">
											<div id="iconcumple">

											</div>
											<a href="#" class="kt-widget__username">
												<span id="nombre" style="font-size: 20px;"></span>
											</a>
											<span class="kt-widget__subtitle">
												<div id="verestatus"></div>
											</span>
										</div>
										<div class="kt-widget__action">
												<!-- <button type="button" class="btn btn-info btn-sm">Disponibilidad</button>&nbsp;
													<button type="button" class="btn btn-success btn-sm">Editar</button> -->
												</div>
											</div>
										</div>
										<div class="kt-widget__body">
											<div class="kt-widget__content">
												<div class="kt-widget__info">
													<span class="kt-widget__label">Correo</span>
													<a href="#" class="kt-widget__data"><span id="correo"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Teléfono/Celular</span>
													<a href="#" class="kt-widget__data"><span id="telefono"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Sexo</span>
													<a href="#" class="kt-widget__data"><span id="sexo"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Fecha de nacimiento</span>
													<a href="#" class="kt-widget__data"><span id="fecha_nacimiento"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Escolaridad</span>
													<a href="#" class="kt-widget__data"><span id="escolaridad"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Estado civil</span>
													<a href="#" class="kt-widget__data"><span id="estado_civil"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Numero de hijos</span>
													<a href="#" class="kt-widget__data"><span id="numero_hijos"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Fecha que ingreso</span>
													<a href="#" class="kt-widget__data"><span id="fecha_ingreso"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Numéro de IMSS</span>
													<a href="#" class="kt-widget__data"><span id="numero_imss"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">CURP</span>
													<a href="#" class="kt-widget__data"><span id="curp"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">RFC</span>
													<a href="#" class="kt-widget__data"><span id="rfc"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Puesto</span>
													<a href="#" class="kt-widget__data"><span id="puesto"></span></a>
												</div>
												<div class="kt-widget__info">
													<span class="kt-widget__label">Sucursal</span>
													<a href="#" class="kt-widget__data"><span id="id_sucursal"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>

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

			<!--end::Page Scripts -->
			<!--begin::Page Scripts(used by this page) -->
			<script src="assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
			<!--begin::Page Scripts(used by this page) -->
			<script src="assets/js/pages/crud/forms/widgets/input-mask.js" type="text/javascript"></script>
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
				function agregaform(datos){
					d=datos.split('||');
					$('#nombre').text(d[1]);
					$('#puesto').text(d[14]);
					$('#correo').text(d[3]);
					$('#telefono').text(d[4]);
					$('#sexo').text(d[5]);
					$('#fecha_nacimiento').text(d[6]);
					$('#escolaridad').text(d[7]);
					$('#estado_civil').text(d[8]);
					$('#numero_hijos').text(d[9]);
					$('#fecha_ingreso').text(d[10]);
					$('#numero_imss').text(d[11]);
					$('#curp').text(d[12]);
					$('#rfc').text(d[13]);
					$('#id_sucursal').text(d[17]);
					if (d[15]=="Activo") {
						$("#verestatus").empty();
						var parrafo = document.createElement("span");
						var contenido = document.createTextNode("Activo");
						var mostrar=parrafo.appendChild(contenido);
						document.body.appendChild(parrafo);
						var contenedor = document.getElementById("verestatus");
						contenedor.appendChild(parrafo);
						$('#verestatus').removeClass( "btn btn-bold btn-sm btn-font-sm  btn-label-danger" ).addClass( "btn btn-bold btn-sm btn-font-sm  btn-label-success" );
					}else{
						$("#verestatus").empty();
						var parrafo = document.createElement("span");
						var contenido = document.createTextNode("Inactivo");
						var mostrar=parrafo.appendChild(contenido);
						document.body.appendChild(parrafo);
						var contenedor = document.getElementById("verestatus");
						contenedor.appendChild(parrafo);
						$('#verestatus').removeClass( "btn btn-bold btn-sm btn-font-sm  btn-label-success" ).addClass( "btn btn-bold btn-sm btn-font-sm  btn-label-danger" );
					}
					if (d[18]=="Activo") {
						$("#iconcumple").empty();
						$("#iconcumple").show();
						var parrafo = document.createElement("i");
						var contenido = document.createTextNode("");
						var mostrar=parrafo.appendChild(contenido);
						document.body.appendChild(parrafo);
						var contenedor = document.getElementById("iconcumple");
						contenedor.appendChild(parrafo);
						$('#iconcumple').addClass('la la-birthday-cake fa-2x');
						$('#iconcumple').css('color', '#1dc9b7')
						confetti.start(3000);
					}else{
						$("#iconcumple").empty();
						$("#iconcumple").hide();
					}
				}
			</script>
			<script>
				function editarform(datos){
					d=datos.split('||');
					$('#id_empleado').val(d[0]);
					$('#upnombre').val(d[1]);
					$('#upapellido').val(d[2]);
					$('#upcorreo').val(d[3]);
					$('#uptelefono').val(d[4]);
					$('#uppuesto').val(d[14]);
					$('#upsucursal').val(d[16]);
					if (d[15]=="Activo") {
						$("#upestatus").prop("checked", true);
					}else{
						$("#upestatus").prop("checked", false);
					}
				}
			</script>
		</body>				
		<!-- end::Body -->
		</html>