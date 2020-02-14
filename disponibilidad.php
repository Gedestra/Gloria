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
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="img/logo1.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="js/mostrar.empleados.js"></script>
</head>
<body>
    <?php include("head.php"); ?>
    
    <!-- end:: Header -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-3">

                    <!--begin::Portlet-->
                    <div class="kt-portlet" id="kt_portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="flaticon-users"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Empleados
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div id="kt_calendar_external_events" class="fc-unthemed">
                                <div class="form-group row" id="nombreempleados" style="display: flex;flex-direction: column;">
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                                <div class="form-group row" id="nombresucursales" style="display: flex;flex-direction: column;">
                                </div>
                                <!-- <div class='fc-draggable-handle kt-badge kt-badge--lg kt-badge--danger kt-badge--inline kt-margin-b-15' data-color="fc-event-danger">Reporting</div><br>
                                
                                <div class='fc-draggable-handle kt-badge kt-badge--lg kt-badge--danger kt-badge--inline kt-margin-b-15' data-color="fc-event-danger">Sucursal 1</div><br>
                                <div class='fc-draggable-handle kt-badge kt-badge--lg kt-badge--info kt-badge--inline kt-margin-b-15' data-color="fc-event-info">Sucursal 2</div><br>
                                <div class='fc-draggable-handle kt-badge kt-badge--lg kt-badge--dark kt-badge--inline kt-margin-b-15' data-color="fc-event-dark">Plaza Aleman</div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                                <div>
                                    <label class="kt-checkbox kt-checkbox--brand">
                                        <input type="checkbox" id='kt_calendar_external_events_remove'> Remove after drop
                                        <span></span>
                                    </label>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <!--end::Portlet-->
                </div>
                <div class="col-lg-9">

                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="flaticon-notes"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Disponibilidad
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-elevate btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="la la-plus"></i> Agregar Actividad
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div id="kt_calendar"></div>
                        </div>
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- End begin:: Content-->
    </div>
    <!-- end:: Content -->
    <!-- begin::Sticky Toolbar -->
    <?php include("menu.php"); ?>
    <!-- end::Sticky Toolbar -->
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
    <script src="assets/js/pages/components/calendar/external-events.js" type="text/javascript"></script>


</body>
</html>