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
<head>
	<meta charset="UTF-8">
	<title>3D LASHES | Promociones</title>
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
</head>
<body>
	<?php 
	include("head.php");
	if ($_POST) {
		$conexion->query("SET NAMES 'utf8'");
		$nombre=$_POST['nombre'];
		$estatus=$_POST['estatus'];
		$fecha_vigencia=$_POST['fecha_vigencia'];
		$descripcion=$_POST['descripcion'];
		$Porcentaje=$_POST['Porcentaje'];
		if ($estatus==null) {
			$conestatus="Inactivo";
		}else{
			$conestatus="Activo";
		}
		$query="INSERT INTO promociones (id_promocion, nombre, estatus, fecha_vigencia, porcentaje, descripcion) VALUES (NULL, '$nombre', '$conestatus', '$fecha_vigencia', '$Porcentaje', '$descripcion')";
		$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
		if ($resultado) {
			echo "<script>alertify.set('notifier','position', 'botton-right');
			alertify.success('<strong>Agregado correctamente</strong>');</script>";
		}
	}
	if ($_GET) {
		echo "<script>alertify.set('notifier','position', 'botton-right');
		alertify.success('<strong>¡Promoción Actualizada!</strong>');</script>";
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
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
									<path d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z" fill="#000000"/>
								</g>
							</svg>
						</span>
						<h3 class="kt-portlet__head-title">
							Listado de Promociones
						</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<div class="kt-portlet__head-actions">
								&nbsp;
								<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_4">
									<i class="la la-plus"></i>
									Agregar Promoción
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
								<th>Nombre de la Promoción</th>
								<th>Fecha de Vigencia</th>
								<th>Porcentaje</th>
								<th>Descripción</th>
								<th>Estatus</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$query = "SELECT * FROM promociones";
							$resultado=$conexion->query($query);
							while ($row=$resultado->fetch_assoc()) {
								$datospromociones=$row['id_promocion']."||".$row['nombre']."||".$row['estatus']."||".$row['fecha_vigencia']."||".$row['porcentaje'];
								?>
								<tr>
									<td><?php echo $row['nombre']; ?></td>
									<td><?php echo $row['fecha_vigencia']; ?></td>
									<td>% <?php echo $row['porcentaje']; ?></td>
									<td><?php echo $row['descripcion']; ?></td>
									<td><?php if ($row['estatus']=='Activo') {
										echo "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-success'>Activo</span>";
									}else{
										echo "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-danger'>Inactivo</span>";
									}?></td>
									<td>
										<div class="btn-group" role="group">
											<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
											<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
												<a class="dropdown-item" href="#" onclick="agregaform('<?php echo $datospromociones ?>')" data-toggle="modal" data-target="#kt_modal_5"><i class="la la-edit"></i>Editar Promoción</a>
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
	<!--begin::Modal-->
	<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Promoción</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST">
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label">Nombre de la promoción</label>
							<div class="col-lg-9 col-xl-6">
								<input type="text" class="form-control" name="nombre" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label">Descripción (para uso de referencia interna)</label>
							<div class="col-lg-9 col-xl-6">
								<div class="form-group form-group-last">
									<textarea class="form-control" id="exampleTextarea" rows="3" name="descripcion"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label">Activar</label>
							<div class="col-lg-9 col-xl-6">
								<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
									<label>
										<input type="checkbox" name="estatus" value="Activo">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label">Fecha de vigencia</label>
							<div class="col-lg-9 col-xl-6">
								<input type="date" class="form-control" name="fecha_vigencia" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label">Porcentaje Aplicar</label>
							<div class="col-lg-9 col-xl-6">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text">%</span></div>
									<input type="number" class="form-control" name="Porcentaje" placeholder="Solo Enteros" aria-describedby="basic-addon1" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
								</div>
							</div>
						</div>
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
<!--End begin::Modal-->
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Promoción</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form action="funciones/updatepromociones.php" method="POST">
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Nombre de la promocion</label>
						<div class="col-10">
							<input type="text" name="nombre" class="form-control" id="upnombre" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-2 col-form-label">Activar</label>
						<div class="col-10">
							<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
								<label>
									<input type="checkbox" name="estatus" id="upestatus" value="Activo">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-2 col-form-label">Fecha de Vigencia</label>
						<div class="col-10">
							<input type="date" name="fecha_vigencia" class="form-control" id="upfechavigencia" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-2 col-form-label">Porcentaje Aplicar</label>
						<div class="col-10">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text">%</span></div>
								<input type="number" class="form-control" name="porcentaje" id="uppromocion" placeholder="Solo Enteros" aria-describedby="basic-addon1" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
							</div>
						</div>
					</div>
					<input type="text" name="id_promocion" id="upid" style="display: none;">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--End begin::Modal-->
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
	function agregaform(datos){
		d=datos.split('||');
		$('#upnombre').val(d[1]);
		$('#uppromocion').val(d[4]);
		$('#upfechavigencia').val(d[3]);
		$('#upid').val(d[0]);
		if (d[2]=="Activo") {
			$("#upestatus").prop("checked", true);
		}else{
			$("#upestatus").prop("checked", false);
		}
	}
</script>
</body>
</html>