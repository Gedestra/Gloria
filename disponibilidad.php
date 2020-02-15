<?php 
include("funciones/session.php"); 
$query="SELECT rol, id_usuario FROM usuarios WHERE username='$username'";
$resultado = $conexion->query($query);
$row=$resultado->fetch_assoc();
$sesion=$row['rol']; 
if ($sesion !='Administrador' && $sesion !='Empleado') {
    header("location: index.php");
}
$id_usuario=$row['id_usuario'];
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
    <style>
        input[class="testradio"]:checked + span:after {    
            content: "";
            width: 10px;
            height: 10px;
            background: white;
            position: absolute;
            top: 5px;
            left: 5px;
            border-radius: 100%;
        }
        input[class="testradio2"]:checked + span:after {    
            content: "";
            width: 10px;
            height: 10px;
            background: white;
            position: absolute;
            top: 5px;
            left: 5px;
            border-radius: 100%;
        }      
    </style>
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
                                    Empleados / Sucursales
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body" style="z-index: 100">
                            <div id="kt_calendar_external_events" class="fc-unthemed">
                                <div class="form-group row" id="nombresucursales" style="display: flex;flex-direction: column;">
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                                <div class="form-group row" id="nombreempleados" style="display: flex;flex-direction: column;">
                                </div>
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
                                        <button type="button" class="btn btn-elevate btn-danger dropdown-toggle" data-toggle="modal" data-target="#addactividaddisponibilidad" onclick="modaladdactiviti()">
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
    <!--begin::Modal agregar-->
    <div class="modal fade" id="addactividaddisponibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title cambiotitle" id="exampleModalLabel">Agregar Actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">


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
                                <input type="text" class="form-control addfechaactual" readonly="" placeholder="Seleccionar Fecha" name="fechaactividad" id="kt_datepicker_2">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group timepicker">
                                <input class="form-control" id="kt_timepicker_1" readonly="" name="horaactividad" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-clock-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <select class="form-control kt-selectpicker" name="duracionactividad">
                                <option value="" style="display: none;">Seleccionar</option>
                                <option value="5">5 minutos</option>
                                <option value="15">15 minutos</option>
                                <option value="30" selected>30 minutos</option>
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
                            <input type="text" class="form-control" name="nombre_actividad" id="nombre_actividad">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-form-label col-2">Asignar a</label>
                        <div class="col-10">
                            <select class="form-control kt-selectpicker" data-live-search="true" tabindex="-98" name="nombre_empleado" id="nombre_empleado_actividad">
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
                            <select class="form-control kt-selectpicker" data-live-search="true" tabindex="-98" name="nombre_cliente" id="nombre_cliente">
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
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-form-label col-2">¿Confirmar Actividad?</label>
                        <div class="col-10">
                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                <label>
                                    <input type="checkbox" name="addconfirmadoactividad" id="addconfirmadoactividad" value="Confirmado">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btnguardar" onclick="btnaddactividad()">Guardar</button>
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
    <script src="assets/js/pages/components/calendar/external-events.js" type="text/javascript"></script>
    <script src="assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>
    <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
    <script>
        function modaladdactiviti(){

            var fecha = moment().format("MM/DD/YYYY");
            $(".addfechaactual").val(fecha);
            $('.addfechaactual').trigger("change");

            
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
                    input.id='add$idtipoactividad'
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
                    input.id='add$idtipoactividad'
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
                    input.id='add$idtipoactividad'
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
                    input.id='add$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '6':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-bell btn btn-secondary testicon';
                    input.id='add$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '7':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-briefcase btn btn-secondary testicon';
                    input.id='add$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '8':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-cog btn btn-secondary testicon';
                    input.id='add$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '9':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-cut btn btn-secondary testicon';
                    input.id='add$idtipoactividad'
                    input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                    lugar=document.getElementById('icontipo').appendChild(input);
                    ";
                    break;
                    case '10':
                    echo $icon="
                    var input = document.createElement('button');
                    input.type= 'button'
                    input.title= '$nombre_tipo_actividad'
                    input.className = 'la la-eye btn btn-secondary testicon';
                    input.id='add$idtipoactividad'
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
                    input.id='add$idtipoactividad'
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
            document.getElementById('add'+d[0]).disabled = true;
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
        function btnaddactividad(){
            var confirmoactividadvalue;
            if($("#addconfirmadoactividad").is(':checked')) {  
                confirmoactividadvalue="Confirmada";
            }else{  
                confirmoactividadvalue="No confirmada";
            }
            var nombre_actividad_value=$("#nombre_actividad").val();
            if (nombre_actividad_value=="") {
                if($('#inputidicon').find("#iconselectactividad").length){
                    var texttipoactividad=document.getElementById("nombre_actividad").placeholder;
                    $("#nombre_actividad").val(texttipoactividad);
                    enviardata();
                }else{
                    alertify.set('notifier','position', 'botton-right');
                    alertify.error('<strong>Seleccione un tipo de actividad seleccionando un icono</strong>');
                }
            }else{
                enviardata();
            }

            function enviardata(){
                var valuetipoactividad=$('#iconselectactividad').val();
                var valuenombreactividad=document.getElementsByName("nombre_actividad")[0].value;
                var valuefecha=document.getElementsByName("fechaactividad")[0].value;
                var valuehora=document.getElementsByName("horaactividad")[0].value;
                var valueduracion=document.getElementsByName("duracionactividad")[0].value;
                var valuecliente=document.getElementsByName("nombre_cliente")[0].value;
                var valueempleado=document.getElementsByName("nombre_empleado")[0].value;
                var valueusuario='<?php echo $id_usuario; ?>';

                if (valuecliente!=""&&valuefecha!=""&&valueduracion!="") {

                    let fecha = valuefecha.split("/");
                    let hora;
                    if(valuehora.includes("PM") && !valuehora.includes(12)){
                        hora = valuehora.substring(0,5);
                        hora = hora.split(":");
                        hora[0]= (parseInt(hora[0])+12).toString();
                    }else{
                        hora = valuehora.substring(0,5);
                        hora = hora.split(":");
                    }
                    let iday= fecha[1];
                    let imonth = fecha[0];
                    let iyear = fecha[2];
                    let ihour = hora[0];
                    let iminutes = hora[1];
                    let iseconds = 00;

                    inicio = new Date(iyear, imonth-1, iday, ihour, iminutes, iseconds);
                    final = moment(inicio).add(valueduracion, 'm').toDate();

                    let fday = final.getDate();
                    let fmonth = final.getMonth()+1;
                    let fyear = final.getFullYear();
                    let fhour = final.getHours();
                    let fminutes = final.getMinutes();
                    let fseconds = final.getSeconds();

                    let srecord = iyear+"-"+imonth+"-"+iday+" "+ihour+":"+iminutes+":"+iseconds;
                    let frecord = fyear+"-"+fmonth+"-"+fday+" "+fhour+":"+fminutes+":"+fseconds;
                    console.log(valuetipoactividad)
                    $.ajax({                        
                        type: "POST",                 
                        url: "funciones/addactividades.php",     
                        data:{
                            idtipoactividad:valuetipoactividad,
                            fechainicial: srecord,
                            fechafinal: frecord,
                            idcliente:valuecliente,
                            idempleado:valueempleado,
                            idusuario:valueusuario,
                            completado:'No completado',
                            nombreactividad:valuenombreactividad,
                            confirmado:confirmoactividadvalue
                        },
                        beforeSend: function () {
                            document.getElementById("btnguardar").disabled=true;
                            document.getElementById("btnguardar").className = "btn btn-primary kt-spinner kt-spinner--right kt-spinner--md kt-spinner--light";
                        },
                        success:  function (response) {
                            alertify.set('notifier','position', 'botton-right');
                            alertify.success('<strong>¡Actividad Agregada!</strong>');
                            $("#kt_modal_4").modal("hide");
                            setInterval(function(){
                                location.reload();
                            },900)
                            document.getElementById("btnguardar").disabled=false;
                        },
                        error: function(xhr, status, err) {
                            alertify.set('notifier','position', 'botton-right');
                            alertify.error('<strong>Problemas con el servidor</strong>');
                        }
                    })
                }else{
                    alertify.set('notifier','position', 'botton-right');
                    alertify.error('<strong>No se aceptan campos vacios</strong>');
                    document.getElementById("btnguardar").disabled=false;
                }
            }
        }
    </script>
</body>
</html>