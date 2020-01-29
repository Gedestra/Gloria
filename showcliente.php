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
	<title>3D LASHES | Cliente</title>
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

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="img/logo1.png" />
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="funciones/confetti.js"></script>
	<script src="funciones/confetti.min.js"></script>
	
</head>
<body>
	<?php 
	include("head.php");
	$conexion->query("SET NAMES 'utf8'");
	$cliente=$_GET['cliente'];
	$query="SELECT * FROM clientes WHERE id_cliente='$cliente'";
	$resultado=$conexion->query($query);
	$row=$resultado->fetch_assoc();
	?>
	<!-- end:: Header -->
	<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

		<!-- begin:: Subheader -->


		<!-- end:: Subheader -->

		<!-- begin:: Content -->
		<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

			<!--Begin::App-->
			<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

				<!--Begin:: App Aside Mobile Toggle-->
				<button class="kt-app__aside-close" id="kt_user_profile_aside_close">
					<i class="la la-close"></i>
				</button>

				<!--End:: App Aside Mobile Toggle-->

				<!--Begin:: App Aside-->
				<div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

					<!--begin:: Widgets/Applications/User/Profile1-->
					<div class="kt-portlet kt-portlet--height-fluid-">
						<div class="kt-portlet__head  kt-portlet__head--noborder">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">
								</h3>
							</div>
							<div class="kt-portlet__head-toolbar">
								<a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
									<i class="flaticon-more-1"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">

									<!--begin::Nav-->
									<ul class="kt-nav">
										<li class="kt-nav__head">
											Export Options
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
													<span class="kt-nav__link-text">Activity</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
													<span class="kt-nav__link-text">FAQ</span>
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
											<span class="kt-media kt-media--danger kt-margin-r-2 kt-margin-t-2"><span style="width: 70px; height: 65px; font-size: 34px">
												<?php 
												echo substr($row['nombres'], 0, 1); 
												echo substr($row['apellidos'], 0, 1); 
												?></span></span>
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__section">
													<a href="#" class="kt-widget__username">
														<?php
														$fecha_nacimiento_cumple=strtotime($row['fecha_nacimiento']);
														$mes = date("m", $fecha_nacimiento_cumple);
														$cumple=$mes;
														$fechaActual = strtotime(date('d-m-Y'));
														$mesactual = date("m", $fechaActual);
														$compara=$mesactual;
														if ($cumple==$compara) {
															echo "<i class='la la-birthday-cake fa-2x' style='color: #1dc9b7'></i> 
															<script src='https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js'>
															</script>
															<script>confetti.start(3000);</script>
																
																";
															}
															?>
														</a>
														<a href="#" class="kt-widget__username">
															<?php echo $row['nombres'].' '.$row['apellidos']; ?>
														</a>
													</div>
													<div class="kt-widget__action">
														<button type="button" class="btn btn-info btn-sm">Disponibilidad</button>
														<button type="button" class="btn btn-success btn-sm">Editar</button>
													</div>
												</div>
											</div>
											<div class="kt-widget__body">
												<div class="kt-widget__content">
													<div class="kt-widget__info">
														<span class="kt-widget__label">Correo</span>
														<a href="#" class="kt-widget__data"><?php echo $row['correo']; ?></a>
													</div>
													<div class="kt-widget__info">
														<span class="kt-widget__label">Teléfono/Celular</span>
														<a href="#" class="kt-widget__data"><?php echo $row['telefono']; ?></a>
													</div>
													<div class="kt-widget__info">
														<span class="kt-widget__label">Sexo</span>
														<a href="#" class="kt-widget__data"><?php echo $row['sexo']; ?></a>
													</div>
													<div class="kt-widget__info">
														<span class="kt-widget__label">Fecha de nacimiento</span>
														<a href="#" class="kt-widget__data"><?php echo $row['fecha_nacimiento']; ?></a>
													</div>
													<div class="kt-widget__info">
														<span class="kt-widget__label">Pais</span>
														<a href="#" class="kt-widget__data"><?php echo $row['pais']; ?></a>
													</div>
													<div class="kt-widget__info">
														<span class="kt-widget__label">Estado</span>
														<a href="#" class="kt-widget__data"><?php echo $row['estado']; ?></a>
													</div>
													<div class="kt-widget__info">
														<span class="kt-widget__label">Dirección</span>
														<a href="#" class="kt-widget__data"><?php echo $row['direccion']; ?></a>
													</div>
													<div class="kt-widget__info">
														<span class="kt-widget__label">Ocupación</span>
														<a href="#" class="kt-widget__data"><?php echo $row['ocupacion']; ?></a>
													</div>
												</div>
												<div class="kt-widget__items">

												</div>
											</div>
										</div>

										<!--end::Widget -->
									</div>
								</div>

								<!--end:: Widgets/Applications/User/Profile1-->
							</div>

							<!--End:: App Aside-->

							<!--Begin:: App Content-->
							<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
								<div class="row">
									<div class="col-xl-12">

										<!--begin:: Widgets/Order Statistics-->
										<div class="kt-portlet kt-portlet--height-fluid">
											<div class="kt-portlet__head">
												<div class="kt-portlet__head-label">
													<h3 class="kt-portlet__head-title">
														Hoja Técnica
													</h3>
												</div>
												<div class="kt-portlet__head-toolbar">
													<a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
														Exportar
													</a>
													<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">

														<!--begin::Nav-->
														<ul class="kt-nav">
															<li class="kt-nav__head">
																Export Options
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
																		<span class="kt-nav__link-text">Activity</span>
																	</a>
																</li>
																<li class="kt-nav__item">
																	<a href="#" class="kt-nav__link">
																		<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
																		<span class="kt-nav__link-text">FAQ</span>
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
												<div class="kt-portlet__body kt-portlet__body--fluid">
													<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
														<div class="row">
															<div class="col-lg-12">
																<div class="kt-portlet">
																	<div class="kt-portlet__head kt-portlet__head--noborder  kt-ribbon kt-ribbon--danger kt-ribbon--shadow kt-ribbon--left kt-ribbon--round">
																		<div class="kt-ribbon__target" style="top: 12px; right: -2px;">
																			junio 22 del 2020
																		</div>
																		<div class="kt-portlet__head-label">
																			<h1 class="kt-portlet__head-title">
																				Actividad
																			</h1>
																		</div>
																	</div>
																	<div class="kt-portlet__body kt-portlet__body--fit-top">
																		<h4>Sellador</h4>
																		<label for="">Atendio: <span>Maria del carmen arjona</span></label>
																		<label for="">Transacción: cerrada</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-12">
																<div class="kt-portlet">
																	<div class="kt-portlet__head kt-portlet__head--noborder  kt-ribbon kt-ribbon--danger kt-ribbon--shadow kt-ribbon--left kt-ribbon--round">
																		<div class="kt-ribbon__target" style="top: 12px; right: -2px;">
																			junio 22 del 2020
																		</div>
																		<div class="kt-portlet__head-label">
																			<h1 class="kt-portlet__head-title">
																				Actividad
																			</h1>
																		</div>
																	</div>
																	<div class="kt-portlet__body kt-portlet__body--fit-top">
																		<h4>Radiofecuencia</h4>
																		<label for="">Abdomen</label>
																		<label for="">Atendio: <span>Maria del carmen arjona</span></label>
																		<label for="">Transacción: cerrada</label>
																	</div>
																</div>
															</div>
															<div class="col-lg-12">
																<div class="kt-portlet">
																	<div class="kt-portlet__head kt-portlet__head--noborder  kt-ribbon kt-ribbon--success kt-ribbon--shadow kt-ribbon--left kt-ribbon--round">
																		<div class="kt-ribbon__target" style="top: 12px; right: -2px;">
																			junio 21 del 2020
																		</div>
																		<div class="kt-portlet__head-label">
																			<h1 class="kt-portlet__head-title">
																				Actividad
																			</h1>
																		</div>
																	</div>
																	<div class="kt-portlet__body kt-portlet__body--fit-top">
																		<h4>Aplicación Técnica perfecta</h4>
																		<table>
																			<thead>
																				<tr>
																					<th>lugar</th>
																					<th>Tipo</th>
																					<th>Tamaño</th>
																					<th>Grosor</th>
																					<th>Adhesivo</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Interior</td>
																					<td>J</td>
																					<td>10</td>
																					<td>.05</td>
																					<td>Pegamento</td>
																				</tr>
																				<tr>
																					<td>Centro</td>
																					<td>J</td>
																					<td>10</td>
																					<td>.05</td>
																					<td>Pegamento</td>
																				</tr>
																				<tr>
																					<td>Exterior</td>
																					<td>J</td>
																					<td>10</td>
																					<td>.05</td>
																					<td>Pegamento</td>
																				</tr>
																			</tbody>
																		</table>
																		<label for="">Atendio: <span><strong>Maria del carmen arjona</strong></span></label>
																		<label for="">Transacción: abierta</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- begin::Sticky Toolbar -->
											<?php include("menu.php"); ?>
											<!-- END begin::Sticky Toolbar -->
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
										</body>
										</html>
