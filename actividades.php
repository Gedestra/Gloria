<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>3D LASHES | Actividades</title>
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
                            <i class="flaticon-app" style="color: #2c77f4"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Listado de Actividades
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                &nbsp;
                                <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_4">
                                    <i class="la la-plus"></i>
                                    Agregar Actividad
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
                                <th>Completado</th>
                                <th>Fecha y hora de inicio</th>
                                <th>Tipo de actividad</th>
                                <th>Cliente</th>
                                <th>Transaccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include("funciones/conexion.php");
                            $conexion->query("SET NAMES 'utf8'");
                            $query = "SELECT * FROM actividades AS a INNER JOIN clientes AS c ON a.id_cliente=c.id_cliente INNER JOIN actividades AS ac ON a.id_actividad=ac.id_actividad WHERE a.completado='No completado'";
                            $resultado=$conexion->query($query);
                            while ($row=$resultado->fetch_assoc()) {
                                    $datos=$row['id_cliente']."||".$row['nombres']."||".$row['apellidos']."||".$row['correo']."||".$row['telefono'];
                                ?>
                                <tr>
                                    <td style="text-align: center;"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--success" style="margin-bottom: 15px;"><input type="checkbox"><span></span></label></td>
                                    <td><?php echo $row['fecha_hora_inicio']; ?></td>
                                    <td><?php echo $row['nombre_actividad']; ?></td>
                                    <td><a class="dropdown-item" href="#" onclick="agregaform('<?php echo $datos ?>')" data-toggle="modal" data-target="#kt_modal_5"><?php echo $row['nombres']." ".$row['apellidos'];?></a></td>
                                    <td><?php echo $row['id_transaccion'];?></td>
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
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="POST">

                        <div class="form-group row">
                            <label for="" class="col-2 col-form-label">nombre de la Actividad</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="nombre_actividad" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-2 col-form-label">cliente</label>
                            <div class="col-10">
                                <select class="form-control kt-selectpicker" name="nombre_cliente" required>
                                    <option value="" style="display: none;">Seleccionar</option>
                                    <?php 
                                    $query = "SELECT * FROM clientes ORDER BY nombres ASC";
                                    $resultado=$conexion->query($query);
                                    while ($row3=$resultado->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row3['nombres']; ?>"><?php echo $row3['apellidos']; ?></option><?php 
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-form-label col-2">Nombre del empleado</label>
                            <div class="col-10">
                                <select class="form-control kt-selectorpicker" name="nombre_empleado" required>
                                    <option value="" style="display: none;">Seleccionar empleado</option>
                                    <?php
                                    $query = "SELECT * FROM empleados ORDER BY nombre ASC";
                                    $resultado=$conexion->query($query);
                                    while ($row3=$resultado->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row3['nombre']; ?>"><?php echo $row3['apellidos']; ?></option><?php 
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-form-label col-2">Tipo de actividad</label>
                            <div class="col-10">
                                <select class="form-control kt-selectorpicker" name="tipo_actividad" required>
                                    <option value="" style="display: none;">Seleccionar tipo de actividad</option>
                                    <?php
                                    $query = "SELECT * FROM tipo_actividad WHERE estatus='Activo' ORDER BY nombre_tipo_actividad ASC ";
                                    $resultado = $conexion->query($query);
                                    while($row3 = $resultado-> fetch_assoc()){
                                        ?>
                                        <option value= "<?php echo $row3['nombre_tipo_actividad'] ?>"><?php echo $row3['nombre_tipo_actividad'] ?></option> <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-form-label col-6">introduzca la hora de inicio de la actividad </label>
                            <label for="" class="col-form-label col-6">introduzca la hora de termino de la actividad</label>

                            <div class="col-6">
                                <div class="input-group date form_datetime form_datetime bs-datetime">
                                    <input type="text" size="16" class="form-control">
                                    <span class="input-group-addon">
                                        <button class="btn default date-set" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group date">
                                    <input type="text" class="form-control" placeholder="Select date and time" id="kt_datetimepicker_5" name="fecha_hora_final">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar glyphicon-th"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btnguardar">Guardar</button>
                        </div>
                    </form>

                    <?php

                    ?>

                </div>
            </div>
        </div>
    </div>
    <!--End begin::Modal agregar-->
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!--begin::Modal visualizar cliente-->
    <div class="modal fade show" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: transparent;border:none;">
                <div class="modal-body">
                    <div class="kt-portlet kt-portlet--height-fluid-">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                                    <i class="la la-close"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <span class="kt-media kt-media--primary kt-margin-r-2 kt-margin-t-2"><span style="width: 70px; height: 65px">CLI</span></span>
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username" id="acticlinom">
                                                
                                            </a>
                                        </div>

                                        <div class="kt-widget__action">
                                            <a href="showcliente.php?cliente=" class="btn btn-success btn-sm">Ver Detalles</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Teléfono/Celular</span>
                                            <a href="#" class="kt-widget__data" id="acticlitel"></a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Correo</span>
                                            <a href="#" class="kt-widget__data" id="acticlicor"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
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
    <script src="assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
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
            $('#upusername').val(d[0]);
            $('#acticlinom').text(d[1]);
            $('#acticlitel').text(d[4]);
            $('#acticlicor').text(d[3]);
        }
    </script>
</body>
</html>