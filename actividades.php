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

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="img/logo1.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php
    include("head.php");
    
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
                                <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_4" onclick="modaladdactiviti()">
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
                                <th>Actividad</th>
                                <th>Tipo de actividad</th>
                                <th>Cliente</th>
                                <th>Transaccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include("funciones/conexion.php");
                            $conexion->query("SET NAMES 'utf8'");
                            $query = "SELECT nombre_tipo_Actividad, c.id_cliente, nombres,apellidos,correo,telefono,fecha_hora_inicio,nombre_actividad, id_icon FROM actividades AS a INNER JOIN clientes AS c ON a.id_cliente=c.id_cliente INNER JOIN tipo_actividad AS ac ON a.id_tipo_actividad=ac.id_tipo_actividad WHERE a.completado='No completado'";
                            $resultado=$conexion->query($query);
                            while ($row=$resultado->fetch_assoc()) {
                                $datos=$row['id_cliente']."||".$row['nombres']."||".$row['apellidos']."||".$row['correo']."||".$row['telefono'];
                                switch ($row['id_icon']) {
                                    case '1':
                                    $icon="<i class='la la-file-text-o'></i>";
                                    break;
                                    case '2':
                                    $icon="<i class='la la-envelope-o'></i>";
                                    break;
                                    case '3':
                                    $icon="<i class='la la-phone'></i>";
                                    break;
                                    case '4':
                                    $icon="<i class='la la-money'></i>";
                                    break;

                                    default:
                                    $icon="<i class='la la-cart-plus'></i>";
                                    break;
                                }
                                ?>
                                <tr>
                                    <td style="text-align: center;"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--success" style="margin-bottom: 15px;"><input type="checkbox"><span></span></label></td>
                                    <td><?php echo $row['fecha_hora_inicio']; ?></td>
                                    <td><?php echo $row['nombre_actividad']; ?></td>
                                    <td><?php echo $icon." ".$row['nombre_tipo_Actividad']; ?></td>
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
                            <aside class="col-2"></aside>
                            <div class="btn-group col-8" role="group" aria-label="Button group with nested dropdown" id="icontipo">

                            </div>
                            <div id="inputidicon"></div>

                            <aside class="col-2"></aside>
                        </div>

                        <div class="form-group row">
                            <label for="" class="date col-form-label col-4">Fecha</label>
                            <label for="" class="date col-form-label col-4">Hora</label>
                            <label for="" class="date col-form-label col-4">Duración</label>
                            <style>
                                .date{
                                    text-align: center;
                                }
                            </style>
                            <div class="col-4">
                                <div class="input-group date">
                                    <input type="text" class="form-control" readonly="" placeholder="Seleccionar Fecha" id="kt_datepicker_2" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group timepicker">
                                    <input class="form-control" id="kt_timepicker_1" readonly="" placeholder="Select time" type="text" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <select class="form-control kt-selectpicker" name="nombre_cliente" required>
                                    <option value="" style="display: none;">Seleccionar</option>
                                    <option value="15">15 minutos</option>
                                    <option value="30">30 minutos</option>
                                    <option value="45">45 minutos</option>
                                    <option value="60">1 hora</option>
                                    <option value="90">1 hora 30 minutos</option>
                                    <option value="120">2 horas</option>
                                    <option value="360">6 horas</option>
                                    <option value="720">12 horas</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-2 col-form-label">Nombre de la Actividad</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="nombre_actividad" id="nombre_actividad" required>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="" class="col-form-label col-2">Asignar a</label>
                            <div class="col-10">
                                <select class="form-control kt-selectpicker" data-live-search="true" tabindex="-98" name="nombre_empleado" id="nombre_empleado_actividad" required>
                                    <?php
                                    $query = "SELECT * FROM empleados ORDER BY nombre ASC";
                                    $resultado=$conexion->query($query);
                                    while ($row3=$resultado->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row3['id_empleado']; ?>"><?php echo $row3['nombre'].$row3['apellidos']; ?></option><?php 
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-2 col-form-label">Cliente</label>
                            <div class="col-10">
                                <select class="form-control kt-selectpicker" data-live-search="true" tabindex="-98" name="nombre_cliente" required>
                                    <option value="" style="display: none;">Seleccionar</option>
                                    <?php 
                                    $query = "SELECT * FROM clientes ORDER BY nombres ASC";
                                    $resultado=$conexion->query($query);
                                    while ($row3=$resultado->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row3['id_cliente']; ?>"><?php echo $row3['nombres'].$row3['apellidos']; ?></option><?php 
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-form-label col-2">Transacción</label>
                            <div class="col-10">
                                <select class="form-control kt-selectorpicker" name="tipo_actividad">
                                    <option value="" style="display: none;">Seleccionar Transacción</option>
                                    <!-- <?php
                                    $query = "SELECT * FROM tipo_actividad WHERE estatus='Activo' ORDER BY nombre_tipo_actividad ASC ";
                                    $resultado = $conexion->query($query);
                                    while($row3 = $resultado-> fetch_assoc()){
                                        ?>
                                        <option value= "<?php echo $row3['nombre_tipo_actividad'] ?>"><?php echo $row3['nombre_tipo_actividad'] ?></option> <?php
                                    }
                                    ?> -->
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btnguardar" onclick="btnaddactividad()">Guardar</button>
                        </div>
                    </form>

                    <?php

                    ?>

                </div>
            </div>
        </div>
    </div>
    <!--End begin::Modal agregar-->
    <?php
    if ($_POST) {
        $conexion->query("SET NAMES 'utf8'");
            //$username=$_POST['username'];
            //$password=$_POST['password'];
            //$id_empleado=$_POST['id_empleado'];
            //$rol=$_POST['rol'];
            //$query="INSERT INTO usuarios (id_usuario, id_empleado, username, password, rol) VALUES (NULL, '$id_empleado', '$username', '$password', '$rol');";
            //$resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
            //if ($resultado) {
            //    echo "<script>alertify.set('notifier','position', 'botton-right');
            //    alertify.success('<strong>Agregado correctamente</strong>');</script>";
            //}
    }
        /*if ($_GET['usuario']=='update') {
            echo "<script>alertify.set('notifier','position', 'botton-right');
            alertify.success('<strong>¡Usuario Actualizado!</strong>');</script>";
        }else if($_GET['usuario']=='delete'){
            echo "<script>alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>¡Usuario Eliminado!</strong>');</script>";
        }*/
        ?>
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

                                            <div class="kt-widget__action" id="btnshowclie">
                                             <!--  <a href="showcliente.php?cliente=" class="btn btn-success btn-sm">Ver Detalles</a> -->
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
    <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
    <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>
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
                    "info": "",
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
            var boton = document.createElement('a');
            boton.text = 'Ver Detalles';
            boton.href = "showcliente.php?cliente="+d[0];
            boton.className = 'btn btn-success btn-sm';
            boton.id = 'btnshowclivi';
            boton.setAttribute('target', '_blank');
            $('#btnshowclie').empty();
            lugar=document.getElementById('btnshowclie').appendChild(boton);
        }
    </script>
    <script>
        function modaladdactiviti(){
            $('#icontipo').empty();
            <?php
            $conexion->query("SET NAMES 'utf8'");
            $query = "SELECT * FROM tipo_actividad WHERE estatus='Activo'";
            $resultado=$conexion->query($query);
            while ($row=$resultado->fetch_assoc()) {
                $datostipoactividad=$row['id_tipo_actividad']."||".$row['nombre_tipo_actividad'];
                $comas='"';
                $idtipoactividad=$row['id_tipo_actividad'];
                $nombre_tipo_actividad=$row['nombre_tipo_actividad'];
                switch ($row['id_icon']) {
                    case '1':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-file-text-o btn btn-secondary testicon';
                    input.id='$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '2':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-envelope-o btn btn-secondary testicon';
                    input.id='$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '3':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-phone btn btn-secondary testicon';
                    input.id='$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '4':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-money btn btn-secondary testicon';
                    input.id='$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;

                    default:
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-cart-plus btn btn-secondary testicon';
                    input.id='$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                }
            }
            ?>
        }
        function selecticon(datos){
            d=datos.split('||');
            $(".testicon").removeAttr("disabled");
            document.getElementById(d[0]).disabled = true;
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'iconselectactividad';
            input.id = 'iconselectactividad';
            input.value = d[0];
            $('#inputidicon').empty();
            lugar=document.getElementById('inputidicon').appendChild(input);
            $("#iconselectactividad").css('display','none');
            var inputnombreactividad=lugar=document.getElementById('nombre_actividad').setAttribute('placeholder',d[1]);
        }
        <?php 
        $query = "SELECT * FROM usuarios AS u INNER JOIN empleados AS e ON u.id_empleado=e.id_empleado WHERE username='$username'";
        $resultado=$conexion->query($query);
        $row=$resultado->fetch_assoc();
        $id_empleado_actividad=$row['id_empleado'];
        echo "$('#nombre_empleado_actividad').val('$id_empleado_actividad');";
        ?>
        function btnaddactividad(){
            var nombre_actividad_value=$("#nombre_actividad").val();
            if (nombre_actividad_value=="") {
                if($('#inputidicon').find("#iconselectactividad").length){
                    var valuetipoactividad=$('#iconselectactividad').val();
                    var texttipoactividad=document.getElementById("nombre_actividad").placeholder;
                    var valuenombreactividad=$("#nombre_actividad").val(texttipoactividad);
                }else{
                    alert("Seleccione un tipo de actividad seleccionando un icono");
                    event.preventDefault();
                }
            }
        }
    </script>
</body>
</html>