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
	<title>3D LASHES | Inicio</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

	<!--end::Fonts -->
	<!--begin::Page Custom Styles(used by this page) -->
	<link href="assets/plugins/custom/kanban/kanban.bundle.css" rel="stylesheet" type="text/css" />

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
<body>
	<?php include("head.php");include("menu.php");?>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Default Kanban Demo
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div id="kanban1"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Custom Colors Demo
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div id="kanban2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Kanban Interactivity Demo
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div id="kanban3"></div>
						<div class="kanban-toolbar">
							<button class="btn btn-brand" id="addDefault">Add "Default" board</button>
							<button class="btn btn-danger" id="addToDo">Add element in "To Do" Board</button>
							<button class="btn btn-success" id="removeBoard">Remove "Done" Board</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Dynamic Board & Task Demo
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div id="kanban4"></div>
						<div class="kanban-toolbar">
							<div class="row">
								<div class="col-lg-4">
									<div class="kanban-toolbar__title">
										Add New Board
									</div>
									<div class="form-group row">
										<div class="col-12">
											<input id="kanban-add-board" class="form-control" type="text" placeholder="Board Name" /><br />
											<select id="kanban-add-board-color" class="form-control">
												<option value="">Select a Board Color</option>
												<option value="brand">Brand</option>
												<option value="brand-light">Brand Light</option>
												<option value="primary">Primary</option>
												<option value="primary-light">Primary Light</option>
												<option value="success">Success</option>
												<option value="success-light">Success Light</option>
												<option value="info">Info</option>
												<option value="info-light">Info Light</option>
												<option value="warning">Warning</option>
												<option value="warning-light">Warning Light</option>
												<option value="danger">Danger</option>
												<option value="danger-light">Danger Light</option>
											</select>
											<br />
											<button class="btn btn-success" id="addBoard">Add board</button>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="kanban-toolbar__title">
										Add New Task
									</div>
									<div class="form-group">
										<input id="kanban-add-task" class="form-control" type="text" placeholder="Task Name" /><br />
										<select id="kanban-select-task" class="form-control">
											<option value="">Select a Board</option>
											<option value="_board1">Board 1</option>
											<option value="_board2">Board 2</option>
											<option value="_board3">Board 3</option>
										</select>
										<br />
										<select id="kanban-add-task-color" class="form-control">
											<option value="">Select a Task Color</option>
											<option value="brand">Brand</option>
											<option value="primary">Primary</option>
											<option value="success">Success</option>
											<option value="info">Info</option>
											<option value="warning">Warning</option>
											<option value="danger">Danger</option>
										</select>
										<br />
										<button class="btn btn-primary" id="addTask">Add Task</button>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="kanban-toolbar__title">
										Remove Board
									</div>
									<div class="form-group row">
										<div class="col-12">
											<select id="kanban-select-board" class="form-control">
												<option value="">Select a Board</option>
												<option value="_board1">Board 1</option>
												<option value="_board2">Board 2</option>
												<option value="_board3">Board 3</option>
											</select>
											<br />
											<button class="btn btn-danger" id="removeBoard2">Remove Board</button>
										</div>
									</div>
								</div>
							</div>
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

	<!--begin::Page Scripts(used by this page) -->
	<script src="assets/plugins/custom/kanban/kanban.bundle.js" type="text/javascript"></script>
	<script src="assets/js/pages/components/extended/kanban-board.js" type="text/javascript"></script>
</body>
</html>