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
	<title>3D LASHES | Clientes</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="envioscript.js"></script>


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
	<script>
		function habilitar()
		{
			if(event.target.value!="México")
			{
				$("#ocuestado").hide();
				$("#ocudireccion").hide();
				$("#ocumunicipio").hide();

			}else{
				$("#ocuestado").show();
				$("#ocudireccion").show();
				$("#ocumunicipio").show();
			}
		}
	</script>
	<script>
		function habilitar2()
		{
			if(event.target.value!="México")
			{
				$("#2ocuestado").hide();
				$("#2ocudireccion").hide();
				$("#2ocumunicipio").hide();
				$("#estado").val("");
				$("#colonia").val("");
				$("#municipio").val("");

			}else{
				$("#municipio").val("");
				$("#estado").val("");
				$("#colonia").val("");
				$("#2ocuestado").show();
				$("#2ocudireccion").show();
				$("#2ocumunicipio").show();
				// if (estado==""&&direccion=="") {
				// 	document.getElementById("btneditar").disabled=true;
				// }else{
				// 	document.getElementById("btneditar").disabled=false;
				// }
			}
		}
	</script>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body>
	<?php 
	include("head.php"); 
	// if ($_POST) {
	// 	$conexion->query("SET NAMES 'utf8'");
	// 	$nombre=$_POST['nombre'];
	// 	$apellido=$_POST['apellido'];
	// 	$correo=$_POST['correo'];
	// 	$telefono=$_POST['telefono'];
	// 	$sexo=$_POST['sexo'];
	// 	$fecha_nacimiento=Date_create($_POST['fecha_nacimiento']);
	// 	$new_date = Date_format($fecha_nacimiento, "Y-m-d");
	// 	$ocupacion=$_POST['ocupacion'];
	// 	$direccion=$_POST['direccion'];
	// 	$estado=$_POST['estado'];
	// 	$pais=$_POST['pais'];
	// 	$municipio=$_POST['municipio'];
	// 	if ($fecha_nacimiento!=null) {
	// 		$query="INSERT INTO clientes (id_cliente, nombres, apellidos, correo, telefono, sexo, fecha_nacimiento, ocupacion, direccion, estado, municipio, estatus, pais) VALUES (NULL, '$nombre', '$apellido', '$correo', '$telefono', '$sexo', '$new_date', '$ocupacion', '$direccion', '$estado', '$municipio', 'Activo', '$pais');";
	// 		$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	// 		if ($resultado) {
	// 			echo "<script>alertify.set('notifier','position', 'botton-right');
	// 			alertify.success('<strong>Agregado correctamente</strong>');</script>";
	// 		}
	// 	}else{
	// 		$query="INSERT INTO clientes (id_cliente, nombres, apellidos, correo, telefono, sexo, fecha_nacimiento, ocupacion, direccion, estado, municipio, estatus, pais) VALUES (NULL, '$nombre', '$apellido', '$correo', '$telefono', '$sexo', NULL, '$ocupacion', '$direccion', '$estado', '$municipio', 'Activo', '$pais');";
	// 		$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
	// 		if ($resultado) {
	// 			echo "<script>alertify.set('notifier','position', 'botton-right');
	// 			alertify.success('<strong>Agregado correctamente</strong>');</script>";
	// 		}
	// 	}
	// }
	// if ($_GET['cliente']=='update') {
	// 	echo "<script>alertify.set('notifier','position', 'botton-right');
	// 	alertify.success('<strong>¡Cliente Actualizado!</strong>');</script>";
	// }else if($_GET['cliente']=='delete'){
	// 	echo "<script>alertify.set('notifier','position', 'botton-right');
	// 	alertify.error('<strong>Cliente Eliminado!</strong>');</script>";
	// } 
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
							Listado de Clientes
						</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<div class="kt-portlet__head-actions">
								&nbsp;
								<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_4">
									<i class="la la-plus"></i>
									Agregar Cliente
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
								<th>Nombre</th>
								<th>Correo</th>
								<th>Teléfono</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							include("funciones/conexion.php");
							$conexion->query("SET NAMES 'utf8'");
							$query = "SELECT * FROM clientes WHERE estatus='Activo'";
							$resultado=$conexion->query($query);
							while ($row=$resultado->fetch_assoc()) {
								$datos=$row['id_cliente']."||".$row['nombres']."||".$row['apellidos']."||".$row['correo']."||".$row['telefono']."||".$row['sexo']."||".$row['fecha_nacimiento']."||".$row['ocupacion']."||".$row['direccion']."||".$row['estado']."||".$row['pais']."||".$row['municipio'];
								$fecha_nacimiento_cumple=strtotime($row['fecha_nacimiento']);
								$mes = date("m", $fecha_nacimiento_cumple);
								$cumple=$mes;
								$fechaActual = strtotime(date('d-m-Y'));
								$mesactual = date("m", $fechaActual);
								$compara=$mesactual;
								?>
								<tr>
									<td>
										<a class="dropdown-item" href="showcliente.php?cliente=<?php echo $row['id_cliente']; ?>" target="_blank">
											<?php 
											if ($cumple==$compara) {
												echo "<i class='la la-birthday-cake fa-1x' style='color: #1dc9b7'></i> ";
												$cumple="Activo";
											}else{
												$cumple="Inactivo";
											}
											echo $row['nombres'].' '.$row['apellidos']; ?>
										</a>
									</td>
									<td><?php echo $row['correo']; ?></td>
									<td><?php echo $row['telefono']; ?></td>
									<td>
										<div class="btn-group" role="group">
											<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-ellipsis-h"></i></a>
											<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
												<a class="dropdown-item" href="showcliente.php?cliente=<?php echo $row['id_cliente']; ?>" target="_blank"><i class="la la-eye"></i>Ver detalles del cliente</a>
												<a class="dropdown-item" href="#" onclick="agregaform('<?php echo $datos ?>')" data-toggle="modal" data-target="#kt_modal_5"><i class="la la-edit"></i>Editar Cliente</a>
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
	<!--begin::Modal Agregar-->
	<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Nombre(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" name="nombre1" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Apellido(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" name="apellido">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Correo</label>
							<div class="col-10">
								<input class="form-control" name="correo" id="kt_inputmask_9" type="text" required/>
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
								<input type="radio" name="sexo" value="Hombre">Hombre
								<span></span>
							</label>
							<label class="kt-radio kt-radio--tick kt-radio--success">
								<input type="radio" name="sexo" value="Mujer">Mujer
								<span></span>
							</label>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Fecha de nacimiento</label>
							<div class="col-10">
								<input class="form-control" name="fecha_nacimiento" id="kt_inputmask_1" type="text" />
								<span class="form-text text-muted">Formato: <code>MM/DD/AAAA</code></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Ocupación</label>
							<div class="col-10">
								<input type="text" class="form-control" name="ocupacion">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">País</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="pais" id="addpais" onchange="habilitar();">
									<option value="Elegir" id="AF">Elegir opción</option>
									<option value="Afganistán" id="AF">Afganistán</option>
									<option value="Albania" id="AL">Albania</option>
									<option value="Alemania" id="DE">Alemania</option>
									<option value="Andorra" id="AD">Andorra</option>
									<option value="Angola" id="AO">Angola</option>
									<option value="Anguila" id="AI">Anguila</option>
									<option value="Antártida" id="AQ">Antártida</option>
									<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
									<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
									<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
									<option value="Argelia" id="DZ">Argelia</option>
									<option value="Argentina" id="AR">Argentina</option>
									<option value="Armenia" id="AM">Armenia</option>
									<option value="Aruba" id="AW">Aruba</option>
									<option value="Australia" id="AU">Australia</option>
									<option value="Austria" id="AT">Austria</option>
									<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
									<option value="Bahamas" id="BS">Bahamas</option>
									<option value="Bahrein" id="BH">Bahrein</option>
									<option value="Bangladesh" id="BD">Bangladesh</option>
									<option value="Barbados" id="BB">Barbados</option>
									<option value="Bélgica" id="BE">Bélgica</option>
									<option value="Belice" id="BZ">Belice</option>
									<option value="Benín" id="BJ">Benín</option>
									<option value="Bermudas" id="BM">Bermudas</option>
									<option value="Bhután" id="BT">Bhután</option>
									<option value="Bielorrusia" id="BY">Bielorrusia</option>
									<option value="Birmania" id="MM">Birmania</option>
									<option value="Bolivia" id="BO">Bolivia</option>
									<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
									<option value="Botsuana" id="BW">Botsuana</option>
									<option value="Brasil" id="BR">Brasil</option>
									<option value="Brunei" id="BN">Brunei</option>
									<option value="Bulgaria" id="BG">Bulgaria</option>
									<option value="Burkina Faso" id="BF">Burkina Faso</option>
									<option value="Burundi" id="BI">Burundi</option>
									<option value="Cabo Verde" id="CV">Cabo Verde</option>
									<option value="Camboya" id="KH">Camboya</option>
									<option value="Camerún" id="CM">Camerún</option>
									<option value="Canadá" id="CA">Canadá</option>
									<option value="Chad" id="TD">Chad</option>
									<option value="Chile" id="CL">Chile</option>
									<option value="China" id="CN">China</option>
									<option value="Chipre" id="CY">Chipre</option>
									<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
									<option value="Colombia" id="CO">Colombia</option>
									<option value="Comores" id="KM">Comores</option>
									<option value="Congo" id="CG">Congo</option>
									<option value="Corea" id="KR">Corea</option>
									<option value="Corea del Norte" id="KP">Corea del Norte</option>
									<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
									<option value="Costa Rica" id="CR">Costa Rica</option>
									<option value="Croacia" id="HR">Croacia</option>
									<option value="Cuba" id="CU">Cuba</option>
									<option value="Dinamarca" id="DK">Dinamarca</option>
									<option value="Djibouri" id="DJ">Djibouri</option>
									<option value="Dominica" id="DM">Dominica</option>
									<option value="Ecuador" id="EC">Ecuador</option>
									<option value="Egipto" id="EG">Egipto</option>
									<option value="El Salvador" id="SV">El Salvador</option>
									<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
									<option value="Eritrea" id="ER">Eritrea</option>
									<option value="Eslovaquia" id="SK">Eslovaquia</option>
									<option value="Eslovenia" id="SI">Eslovenia</option>
									<option value="España" id="ES">España</option>
									<option value="Estados Unidos" id="US">Estados Unidos</option>
									<option value="Estonia" id="EE">Estonia</option>
									<option value="c" id="ET">Etiopía</option>
									<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
									<option value="Filipinas" id="PH">Filipinas</option>
									<option value="Finlandia" id="FI">Finlandia</option>
									<option value="Francia" id="FR">Francia</option>
									<option value="Gabón" id="GA">Gabón</option>
									<option value="Gambia" id="GM">Gambia</option>
									<option value="Georgia" id="GE">Georgia</option>
									<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
									<option value="Ghana" id="GH">Ghana</option>
									<option value="Gibraltar" id="GI">Gibraltar</option>
									<option value="Granada" id="GD">Granada</option>
									<option value="Grecia" id="GR">Grecia</option>
									<option value="Groenlandia" id="GL">Groenlandia</option>
									<option value="Guadalupe" id="GP">Guadalupe</option>
									<option value="Guam" id="GU">Guam</option>
									<option value="Guatemala" id="GT">Guatemala</option>
									<option value="Guayana" id="GY">Guayana</option>
									<option value="Guayana francesa" id="GF">Guayana francesa</option>
									<option value="Guinea" id="GN">Guinea</option>
									<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
									<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
									<option value="Haití" id="HT">Haití</option>
									<option value="Holanda" id="NL">Holanda</option>
									<option value="Honduras" id="HN">Honduras</option>
									<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
									<option value="Hungría" id="HU">Hungría</option>
									<option value="India" id="IN">India</option>
									<option value="Indonesia" id="ID">Indonesia</option>
									<option value="Irak" id="IQ">Irak</option>
									<option value="Irán" id="IR">Irán</option>
									<option value="Irlanda" id="IE">Irlanda</option>
									<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
									<option value="Isla Christmas" id="CX">Isla Christmas</option>
									<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
									<option value="Islandia" id="IS">Islandia</option>
									<option value="Islas Caimán" id="KY">Islas Caimán</option>
									<option value="Islas Cook" id="CK">Islas Cook</option>
									<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
									<option value="Islas Faroe" id="FO">Islas Faroe</option>
									<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
									<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
									<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
									<option value="Islas Marshall" id="MH">Islas Marshall</option>
									<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
									<option value="Islas Palau" id="PW">Islas Palau</option>
									<option value="Islas Salomón" d="SB">Islas Salomón</option>
									<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
									<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
									<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
									<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
									<option value="Israel" id="IL">Israel</option>
									<option value="Italia" id="IT">Italia</option>
									<option value="Jamaica" id="JM">Jamaica</option>
									<option value="Japón" id="JP">Japón</option>
									<option value="Jordania" id="JO">Jordania</option>
									<option value="Kazajistán" id="KZ">Kazajistán</option>
									<option value="Kenia" id="KE">Kenia</option>
									<option value="Kirguizistán" id="KG">Kirguizistán</option>
									<option value="Kiribati" id="KI">Kiribati</option>
									<option value="Kuwait" id="KW">Kuwait</option>
									<option value="Laos" id="LA">Laos</option>
									<option value="Lesoto" id="LS">Lesoto</option>
									<option value="Letonia" id="LV">Letonia</option>
									<option value="Líbano" id="LB">Líbano</option>
									<option value="Liberia" id="LR">Liberia</option>
									<option value="Libia" id="LY">Libia</option>
									<option value="Liechtenstein" id="LI">Liechtenstein</option>
									<option value="Lituania" id="LT">Lituania</option>
									<option value="Luxemburgo" id="LU">Luxemburgo</option>
									<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
									<option value="Madagascar" id="MG">Madagascar</option>
									<option value="Malasia" id="MY">Malasia</option>
									<option value="Malawi" id="MW">Malawi</option>
									<option value="Maldivas" id="MV">Maldivas</option>
									<option value="Malí" id="ML">Malí</option>
									<option value="Malta" id="MT">Malta</option>
									<option value="Marruecos" id="MA">Marruecos</option>
									<option value="Martinica" id="MQ">Martinica</option>
									<option value="Mauricio" id="MU">Mauricio</option>
									<option value="Mauritania" id="MR">Mauritania</option>
									<option value="Mayotte" id="YT">Mayotte</option>
									<option value="México" id="MX" selected>México</option>
									<option value="Micronesia" id="FM">Micronesia</option>
									<option value="Moldavia" id="MD">Moldavia</option>
									<option value="Mónaco" id="MC">Mónaco</option>
									<option value="Mongolia" id="MN">Mongolia</option>
									<option value="Montserrat" id="MS">Montserrat</option>
									<option value="Mozambique" id="MZ">Mozambique</option>
									<option value="Namibia" id="NA">Namibia</option>
									<option value="Nauru" id="NR">Nauru</option>
									<option value="Nepal" id="NP">Nepal</option>
									<option value="Nicaragua" id="NI">Nicaragua</option>
									<option value="Níger" id="NE">Níger</option>
									<option value="Nigeria" id="NG">Nigeria</option>
									<option value="Niue" id="NU">Niue</option>
									<option value="Norfolk" id="NF">Norfolk</option>
									<option value="Noruega" id="NO">Noruega</option>
									<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
									<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
									<option value="Omán" id="OM">Omán</option>
									<option value="Panamá" id="PA">Panamá</option>
									<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
									<option value="Paquistán" id="PK">Paquistán</option>
									<option value="Paraguay" id="PY">Paraguay</option>
									<option value="Perú" id="PE">Perú</option>
									<option value="Pitcairn" id="PN">Pitcairn</option>
									<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
									<option value="Polonia" id="PL">Polonia</option>
									<option value="Portugal" id="PT">Portugal</option>
									<option value="Puerto Rico" id="PR">Puerto Rico</option>
									<option value="Qatar" id="QA">Qatar</option>
									<option value="Reino Unido" id="UK">Reino Unido</option>
									<option value="República Centroafricana" id="CF">República Centroafricana</option>
									<option value="República Checa" id="CZ">República Checa</option>
									<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
									<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
									<option value="República Dominicana" id="DO">República Dominicana</option>
									<option value="Reunión" id="RE">Reunión</option>
									<option value="Ruanda" id="RW">Ruanda</option>
									<option value="Rumania" id="RO">Rumania</option>
									<option value="Rusia" id="RU">Rusia</option>
									<option value="Samoa" id="WS">Samoa</option>
									<option value="Samoa occidental" id="AS">Samoa occidental</option>
									<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
									<option value="San Marino" id="SM">San Marino</option>
									<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
									<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
									<option value="Santa Helena" id="SH">Santa Helena</option>
									<option value="Santa Lucía" id="LC">Santa Lucía</option>
									<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
									<option value="Senegal" id="SN">Senegal</option>
									<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
									<option value="Sychelles" id="SC">Seychelles</option>
									<option value="Sierra Leona" id="SL">Sierra Leona</option>
									<option value="Singapur" id="SG">Singapur</option>
									<option value="Siria" id="SY">Siria</option>
									<option value="Somalia" id="SO">Somalia</option>
									<option value="Sri Lanka" id="LK">Sri Lanka</option>
									<option value="Suazilandia" id="SZ">Suazilandia</option>
									<option value="Sudán" id="SD">Sudán</option>
									<option value="Suecia" id="SE">Suecia</option>
									<option value="Suiza" id="CH">Suiza</option>
									<option value="Surinam" id="SR">Surinam</option>
									<option value="Svalbard" id="SJ">Svalbard</option>
									<option value="Tailandia" id="TH">Tailandia</option>
									<option value="Taiwán" id="TW">Taiwán</option>
									<option value="Tanzania" id="TZ">Tanzania</option>
									<option value="Tayikistán" id="TJ">Tayikistán</option>
									<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
									<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
									<option value="Timor Oriental" id="TP">Timor Oriental</option>
									<option value="Togo" id="TG">Togo</option>
									<option value="Tonga" id="TO">Tonga</option>
									<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
									<option value="Túnez" id="TN">Túnez</option>
									<option value="Turkmenistán" id="TM">Turkmenistán</option>
									<option value="Turquía" id="TR">Turquía</option>
									<option value="Tuvalu" id="TV">Tuvalu</option>
									<option value="Ucrania" id="UA">Ucrania</option>
									<option value="Uganda" id="UG">Uganda</option>
									<option value="Uruguay" id="UY">Uruguay</option>
									<option value="Uzbekistán" id="UZ">Uzbekistán</option>
									<option value="Vanuatu" id="VU">Vanuatu</option>
									<option value="Venezuela" id="VE">Venezuela</option>
									<option value="Vietnam" id="VN">Vietnam</option>
									<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
									<option value="Yemen" id="YE">Yemen</option>
									<option value="Zambia" id="ZM">Zambia</option>
									<option value="Zimbabue" id="ZW">Zimbabue</option>
								</select>
							</div>
						</div>
						<div class="form-group row" id="ocuestado">
							<label for="" class="col-2 col-form-label">Estado</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="estado" id="addestado">
								</select>
							</div>
						</div>
						<div class="form-group row" id="ocumunicipio">
							<label for="" class="col-2 col-form-label">Municipio</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="municipio" id="addmunicipio">
								</select>
							</div>
						</div>
						<div class="form-group row" id="ocudireccion">
							<label for="" class="col-2 col-form-label">Dirección</label>
							<div class="col-10">
								<input type="text" class="form-control" name="direccion">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="btnagregar">Guardar</button>
					</div>
			</div>
		</div>
	</div>
	<!--END::Modal-->
	<!--begin::Modal Editar-->
	<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form action="funciones/updatecliente.php" method="POST" id="formfunebres">
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Nombre(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" name="nombre" id="nombre" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Apellido(s)</label>
							<div class="col-10">
								<input type="text" class="form-control" name="apellido" id="apellido" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Correo</label>
							<div class="col-10">
								<input class="form-control" name="correo" id="correo" type="email" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Teléfono/Celular</label>
							<div class="col-10">
								<input class="form-control" name="telefono" id="telefono" type="text" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">Ocupación</label>
							<div class="col-10">
								<input class="form-control" name="ocupacion" id="ocupacion" type="text"/>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-2 col-form-label">País</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="pais" id="uppais" onchange="habilitar2();">
									<option value="Elegir" id="AF">Elegir opción</option>
									<option value="Afganistán" id="AF">Afganistán</option>
									<option value="Albania" id="AL">Albania</option>
									<option value="Alemania" id="DE">Alemania</option>
									<option value="Andorra" id="AD">Andorra</option>
									<option value="Angola" id="AO">Angola</option>
									<option value="Anguila" id="AI">Anguila</option>
									<option value="Antártida" id="AQ">Antártida</option>
									<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
									<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
									<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
									<option value="Argelia" id="DZ">Argelia</option>
									<option value="Argentina" id="AR">Argentina</option>
									<option value="Armenia" id="AM">Armenia</option>
									<option value="Aruba" id="AW">Aruba</option>
									<option value="Australia" id="AU">Australia</option>
									<option value="Austria" id="AT">Austria</option>
									<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
									<option value="Bahamas" id="BS">Bahamas</option>
									<option value="Bahrein" id="BH">Bahrein</option>
									<option value="Bangladesh" id="BD">Bangladesh</option>
									<option value="Barbados" id="BB">Barbados</option>
									<option value="Bélgica" id="BE">Bélgica</option>
									<option value="Belice" id="BZ">Belice</option>
									<option value="Benín" id="BJ">Benín</option>
									<option value="Bermudas" id="BM">Bermudas</option>
									<option value="Bhután" id="BT">Bhután</option>
									<option value="Bielorrusia" id="BY">Bielorrusia</option>
									<option value="Birmania" id="MM">Birmania</option>
									<option value="Bolivia" id="BO">Bolivia</option>
									<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
									<option value="Botsuana" id="BW">Botsuana</option>
									<option value="Brasil" id="BR">Brasil</option>
									<option value="Brunei" id="BN">Brunei</option>
									<option value="Bulgaria" id="BG">Bulgaria</option>
									<option value="Burkina Faso" id="BF">Burkina Faso</option>
									<option value="Burundi" id="BI">Burundi</option>
									<option value="Cabo Verde" id="CV">Cabo Verde</option>
									<option value="Camboya" id="KH">Camboya</option>
									<option value="Camerún" id="CM">Camerún</option>
									<option value="Canadá" id="CA">Canadá</option>
									<option value="Chad" id="TD">Chad</option>
									<option value="Chile" id="CL">Chile</option>
									<option value="China" id="CN">China</option>
									<option value="Chipre" id="CY">Chipre</option>
									<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
									<option value="Colombia" id="CO">Colombia</option>
									<option value="Comores" id="KM">Comores</option>
									<option value="Congo" id="CG">Congo</option>
									<option value="Corea" id="KR">Corea</option>
									<option value="Corea del Norte" id="KP">Corea del Norte</option>
									<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
									<option value="Costa Rica" id="CR">Costa Rica</option>
									<option value="Croacia" id="HR">Croacia</option>
									<option value="Cuba" id="CU">Cuba</option>
									<option value="Dinamarca" id="DK">Dinamarca</option>
									<option value="Djibouri" id="DJ">Djibouri</option>
									<option value="Dominica" id="DM">Dominica</option>
									<option value="Ecuador" id="EC">Ecuador</option>
									<option value="Egipto" id="EG">Egipto</option>
									<option value="El Salvador" id="SV">El Salvador</option>
									<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
									<option value="Eritrea" id="ER">Eritrea</option>
									<option value="Eslovaquia" id="SK">Eslovaquia</option>
									<option value="Eslovenia" id="SI">Eslovenia</option>
									<option value="España" id="ES">España</option>
									<option value="Estados Unidos" id="US">Estados Unidos</option>
									<option value="Estonia" id="EE">Estonia</option>
									<option value="c" id="ET">Etiopía</option>
									<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
									<option value="Filipinas" id="PH">Filipinas</option>
									<option value="Finlandia" id="FI">Finlandia</option>
									<option value="Francia" id="FR">Francia</option>
									<option value="Gabón" id="GA">Gabón</option>
									<option value="Gambia" id="GM">Gambia</option>
									<option value="Georgia" id="GE">Georgia</option>
									<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
									<option value="Ghana" id="GH">Ghana</option>
									<option value="Gibraltar" id="GI">Gibraltar</option>
									<option value="Granada" id="GD">Granada</option>
									<option value="Grecia" id="GR">Grecia</option>
									<option value="Groenlandia" id="GL">Groenlandia</option>
									<option value="Guadalupe" id="GP">Guadalupe</option>
									<option value="Guam" id="GU">Guam</option>
									<option value="Guatemala" id="GT">Guatemala</option>
									<option value="Guayana" id="GY">Guayana</option>
									<option value="Guayana francesa" id="GF">Guayana francesa</option>
									<option value="Guinea" id="GN">Guinea</option>
									<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
									<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
									<option value="Haití" id="HT">Haití</option>
									<option value="Holanda" id="NL">Holanda</option>
									<option value="Honduras" id="HN">Honduras</option>
									<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
									<option value="Hungría" id="HU">Hungría</option>
									<option value="India" id="IN">India</option>
									<option value="Indonesia" id="ID">Indonesia</option>
									<option value="Irak" id="IQ">Irak</option>
									<option value="Irán" id="IR">Irán</option>
									<option value="Irlanda" id="IE">Irlanda</option>
									<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
									<option value="Isla Christmas" id="CX">Isla Christmas</option>
									<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
									<option value="Islandia" id="IS">Islandia</option>
									<option value="Islas Caimán" id="KY">Islas Caimán</option>
									<option value="Islas Cook" id="CK">Islas Cook</option>
									<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
									<option value="Islas Faroe" id="FO">Islas Faroe</option>
									<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
									<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
									<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
									<option value="Islas Marshall" id="MH">Islas Marshall</option>
									<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
									<option value="Islas Palau" id="PW">Islas Palau</option>
									<option value="Islas Salomón" d="SB">Islas Salomón</option>
									<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
									<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
									<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
									<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
									<option value="Israel" id="IL">Israel</option>
									<option value="Italia" id="IT">Italia</option>
									<option value="Jamaica" id="JM">Jamaica</option>
									<option value="Japón" id="JP">Japón</option>
									<option value="Jordania" id="JO">Jordania</option>
									<option value="Kazajistán" id="KZ">Kazajistán</option>
									<option value="Kenia" id="KE">Kenia</option>
									<option value="Kirguizistán" id="KG">Kirguizistán</option>
									<option value="Kiribati" id="KI">Kiribati</option>
									<option value="Kuwait" id="KW">Kuwait</option>
									<option value="Laos" id="LA">Laos</option>
									<option value="Lesoto" id="LS">Lesoto</option>
									<option value="Letonia" id="LV">Letonia</option>
									<option value="Líbano" id="LB">Líbano</option>
									<option value="Liberia" id="LR">Liberia</option>
									<option value="Libia" id="LY">Libia</option>
									<option value="Liechtenstein" id="LI">Liechtenstein</option>
									<option value="Lituania" id="LT">Lituania</option>
									<option value="Luxemburgo" id="LU">Luxemburgo</option>
									<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
									<option value="Madagascar" id="MG">Madagascar</option>
									<option value="Malasia" id="MY">Malasia</option>
									<option value="Malawi" id="MW">Malawi</option>
									<option value="Maldivas" id="MV">Maldivas</option>
									<option value="Malí" id="ML">Malí</option>
									<option value="Malta" id="MT">Malta</option>
									<option value="Marruecos" id="MA">Marruecos</option>
									<option value="Martinica" id="MQ">Martinica</option>
									<option value="Mauricio" id="MU">Mauricio</option>
									<option value="Mauritania" id="MR">Mauritania</option>
									<option value="Mayotte" id="YT">Mayotte</option>
									<option value="México" id="MX" selected>México</option>
									<option value="Micronesia" id="FM">Micronesia</option>
									<option value="Moldavia" id="MD">Moldavia</option>
									<option value="Mónaco" id="MC">Mónaco</option>
									<option value="Mongolia" id="MN">Mongolia</option>
									<option value="Montserrat" id="MS">Montserrat</option>
									<option value="Mozambique" id="MZ">Mozambique</option>
									<option value="Namibia" id="NA">Namibia</option>
									<option value="Nauru" id="NR">Nauru</option>
									<option value="Nepal" id="NP">Nepal</option>
									<option value="Nicaragua" id="NI">Nicaragua</option>
									<option value="Níger" id="NE">Níger</option>
									<option value="Nigeria" id="NG">Nigeria</option>
									<option value="Niue" id="NU">Niue</option>
									<option value="Norfolk" id="NF">Norfolk</option>
									<option value="Noruega" id="NO">Noruega</option>
									<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
									<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
									<option value="Omán" id="OM">Omán</option>
									<option value="Panamá" id="PA">Panamá</option>
									<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
									<option value="Paquistán" id="PK">Paquistán</option>
									<option value="Paraguay" id="PY">Paraguay</option>
									<option value="Perú" id="PE">Perú</option>
									<option value="Pitcairn" id="PN">Pitcairn</option>
									<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
									<option value="Polonia" id="PL">Polonia</option>
									<option value="Portugal" id="PT">Portugal</option>
									<option value="Puerto Rico" id="PR">Puerto Rico</option>
									<option value="Qatar" id="QA">Qatar</option>
									<option value="Reino Unido" id="UK">Reino Unido</option>
									<option value="República Centroafricana" id="CF">República Centroafricana</option>
									<option value="República Checa" id="CZ">República Checa</option>
									<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
									<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
									<option value="República Dominicana" id="DO">República Dominicana</option>
									<option value="Reunión" id="RE">Reunión</option>
									<option value="Ruanda" id="RW">Ruanda</option>
									<option value="Rumania" id="RO">Rumania</option>
									<option value="Rusia" id="RU">Rusia</option>
									<option value="Samoa" id="WS">Samoa</option>
									<option value="Samoa occidental" id="AS">Samoa occidental</option>
									<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
									<option value="San Marino" id="SM">San Marino</option>
									<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
									<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
									<option value="Santa Helena" id="SH">Santa Helena</option>
									<option value="Santa Lucía" id="LC">Santa Lucía</option>
									<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
									<option value="Senegal" id="SN">Senegal</option>
									<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
									<option value="Sychelles" id="SC">Seychelles</option>
									<option value="Sierra Leona" id="SL">Sierra Leona</option>
									<option value="Singapur" id="SG">Singapur</option>
									<option value="Siria" id="SY">Siria</option>
									<option value="Somalia" id="SO">Somalia</option>
									<option value="Sri Lanka" id="LK">Sri Lanka</option>
									<option value="Suazilandia" id="SZ">Suazilandia</option>
									<option value="Sudán" id="SD">Sudán</option>
									<option value="Suecia" id="SE">Suecia</option>
									<option value="Suiza" id="CH">Suiza</option>
									<option value="Surinam" id="SR">Surinam</option>
									<option value="Svalbard" id="SJ">Svalbard</option>
									<option value="Tailandia" id="TH">Tailandia</option>
									<option value="Taiwán" id="TW">Taiwán</option>
									<option value="Tanzania" id="TZ">Tanzania</option>
									<option value="Tayikistán" id="TJ">Tayikistán</option>
									<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
									<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
									<option value="Timor Oriental" id="TP">Timor Oriental</option>
									<option value="Togo" id="TG">Togo</option>
									<option value="Tonga" id="TO">Tonga</option>
									<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
									<option value="Túnez" id="TN">Túnez</option>
									<option value="Turkmenistán" id="TM">Turkmenistán</option>
									<option value="Turquía" id="TR">Turquía</option>
									<option value="Tuvalu" id="TV">Tuvalu</option>
									<option value="Ucrania" id="UA">Ucrania</option>
									<option value="Uganda" id="UG">Uganda</option>
									<option value="Uruguay" id="UY">Uruguay</option>
									<option value="Uzbekistán" id="UZ">Uzbekistán</option>
									<option value="Vanuatu" id="VU">Vanuatu</option>
									<option value="Venezuela" id="VE">Venezuela</option>
									<option value="Vietnam" id="VN">Vietnam</option>
									<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
									<option value="Yemen" id="YE">Yemen</option>
									<option value="Zambia" id="ZM">Zambia</option>
									<option value="Zimbabue" id="ZW">Zimbabue</option>
								</select>
							</div>
						</div>

						<div class="form-group row" id="2ocuestado">
							<label for="" class="col-2 col-form-label">Estado</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="estado" id="estado">
								</select>
							</div>
						</div>
						<div class="form-group row" id="2ocumunicipio">
							<label for="" class="col-2 col-form-label">Municipio</label>
							<div class="col-10">
								<select class="form-control kt-selectpicker" name="municipio" id="municipio">
								</select>
							</div>
						</div>
						<div class="form-group row" id="2ocudireccion">
							<label for="" class="col-2 col-form-label">Dirección</label>
							<div class="col-10">
								<input type="text" class="form-control" name="direccion" id="colonia">
							</div>
						</div>
						<input type="text" class="form-control" name="id_cliente" id="id_cliente" style="display: none;">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" id="btneditar">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END::Modal-->
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

	<script type="text/javascript" src="js/municipios.js"></script>
	<script type="text/javascript" src="js/select_estados.js"></script>
	<script type="text/javascript" src="js/editar_select_estados.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('select').material_select();
		});
	</script>



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
			if (d[9]!="") {
				$('#2ocuestado').show();
				$('#2ocudireccion').show();
				$('#2ocumunicipio').show();
				$('#nombre').val(d[1]);
				$('#apellido').val(d[2]);
				$('#correo').val(d[3]);
				$('#telefono').val(d[4]);
				$('#ocupacion').val(d[7]);
				$('#colonia').val(d[8]);
				var estado= $('#estado').val(d[9]);
				$('#id_cliente').val(d[0]);
				$('#uppais').val(d[10]);
				var html = "<option value='' disabled selected>Selecciona el municipio</option>";
					if(estado != "Selecciona el estado"){
						var municipio = municipios[d[9]];
						for (var i = 0; i < municipio.length; i++)
							html += "<option value='" + municipio[i] + "'>" + municipio[i] + "</option>";
					}
				$('#municipio').html(html);
				$('#municipio').val(d[11]);
				
			}else{
				$('#nombre').val(d[1]);
				$('#apellido').val(d[2]);
				$('#correo').val(d[3]);
				$('#telefono').val(d[4]);
				$('#ocupacion').val(d[7]);
				$('#id_cliente').val(d[0]);
				$('#uppais').val(d[10]);
				$('#2ocuestado').hide();
				$('#2ocudireccion').hide();
				$('#2ocumunicipio').hide();
			}
		}
	</script>
	<script>
		$(document).ready(function () {
			$("#btneditar").click(function (event) {
				var esVisible = $("#2ocuestado").is(":visible");
				if (esVisible==true) {
					var municipio=$("#municipio").val();
					var estado=$("#estado").val();

					if (estado==null) {
						alert("Selecciona un estado");
						event.preventDefault();
					}
					if (municipio==null) {
						alert("Selecciona un municipio");
						event.preventDefault();
					}
				}
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$("#btnagregar").click(function (event) {
				var esVisible = $("#ocuestado").is(":visible");
				if (esVisible==true) {
					var municipio=$("#addmunicipio").val();
					var estado=$("#addestado").val();
					if (estado==null) {
						alert("Selecciona un estado");
						event.preventDefault();
					}
					if (municipio==null) {
						alert("Selecciona un municipio");
						event.preventDefault();
					}
				}
			});
		});
	</script>
</body>

<!-- end::Body -->
</html>