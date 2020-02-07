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
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
</head>
<body>
    <?php include("head.php"); ?>
    
    <!-- end:: Header -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
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
                    <div class="row">
                        <div class="col-3" >
                            <span class="col-12">Tipo de Actividad</span>
                            <div class="col-12">
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-file-text-o" ></i>
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-envelope-o"></i> 
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-phone"></i>      
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-money"></i>      
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-cart-plus"></i>  
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-bell-o"></i>     
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-briefcase"></i>  
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-cog"></i>        
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-cut"></i>        
                                <i style="cursor:pointer; border: 1px #ccc solid" class="la fa-2x la-eye"></i>        
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="col-12">Completado</span>
                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success col-12">
                              <label>
                                  <input type="checkbox" checked="checked" name="">
                                  <span></span>
                              </label>
                          </span>
                      </div>
                      <div class="col-2"></div>
                      <div class="col-2">
                        <span class="col-12">Filtrar Por</span>
                        <select class="form-control kt-select2 select2-hidden-accessible" id="kt_select2_1" name="param" data-select2-id="kt_select2_1" tabindex="-1" aria-hidden="true">
                           <?php
                           $query = "SELECT id_sucursal AS id,nombre AS nombre FROM sucursales UNION SELECT id_empleado AS id, concat_ws(' ', nombre, apellidos) AS nombre FROM empleados";
                           $resultado=$conexion->query($query);
                           while ($row3=$resultado->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row3['id']; ?>"><?php echo $row3['nombre']; ?></option><?php 
                        }
                        ?>
                    </select>
                    <script src="assets/js/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>
                </div>
                <div class="col-3" style="margin-left:15px;" >
                    <span>Buscar Por Fecha</span>
                    <div class="input-daterange input-group" id="kt_datepicker_5">
                      <input type="text" class="form-control" name="start" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: pointer;">
                      <div class="input-group-append">
                         <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                     </div>
                     <input type="text" class="form-control" name="end">
                 </div>
             </div>
         </div>
         <br>
         <!--begin: Datatable -->
         <table class="table table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>Completado</th>
                    <th>Confirmado</th>
                    <th>Fecha y hora de inicio</th>
                    <th>Actividad</th>
                    <th>Tipo de actividad</th>
                    <th>Cliente</th>
                    <th>Transacción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include("funciones/conexion.php");
                $conexion->query("SET NAMES 'utf8'");
                $query = "SELECT ac.confirmar,a.confirmado,a.id_empleado,ac.id_tipo_actividad,a.id_Actividad,nombre_tipo_Actividad, c.id_cliente, nombres,apellidos,correo,telefono,fecha_hora_inicio,fecha_hora_termino,nombre_actividad, id_icon FROM actividades AS a INNER JOIN clientes AS c ON a.id_cliente=c.id_cliente INNER JOIN tipo_actividad AS ac ON a.id_tipo_actividad=ac.id_tipo_actividad WHERE a.completado='No completado'";
                $resultado=$conexion->query($query);
                while ($row=$resultado->fetch_assoc()) {

                    date_default_timezone_set('America/Mexico_City');
                    setlocale(LC_TIME, 'es_MX.UTF-8');
                    $hoy = date("Y-m-d H:i:s");
                    $fecha_entrada = $row['fecha_hora_inicio'];

                    $datos=$row['id_cliente']."||".$row['nombres']."||".$row['apellidos']."||".$row['correo']."||".$row['telefono']."||".$row['id_Actividad']."||".$row['id_tipo_actividad']."||".$row['nombre_actividad']."||".$row['fecha_hora_inicio']."||".$row['fecha_hora_termino']."||".$row['id_empleado']."||".$row['confirmado'];
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
                        case '6':
                        $icon="<i class='la la-bell'></i>";
                        break;
                        case '7':
                        $icon="<i class='la la-briefcase'></i>";
                        break;
                        case '8':
                        $icon="<i class='la la-cog'></i>";
                        break;
                        case '9':
                        $icon="<i class='la la-cut'></i>";
                        break;
                        case '10':
                        $icon="<i class='la la-eye'></i>";
                        break;

                        default:
                        $icon="<i class='la la-cart-plus'></i>";
                        break;
                    }
                    ?>
                    <tr id="<?php echo $row['id_Actividad'];?>">
                        <td style="text-align: center;">
                            <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success" style="margin-bottom: 15px;"><input type="checkbox" onclick="btncompletadoactividad('<?php echo $datos; ?>')"><span></span></label>
                        </td>
                        <td style="text-align: center;">
                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                <label>
                                    <input type="checkbox" id="<?php echo $row['id_Actividad'].'confirmar'; ?>" name="confirmadoactividad" value="Activo" onclick="confiactividad('<?php echo $datos; ?>')" <?php if ($row['confirmado']=='Confirmada') {
                                        echo "checked";
                                    } if ($row['confirmar']!="Confirmable") {
                                       echo "disabled";
                                   } ?>>
                                   <span></span>
                               </label>
                           </span>
                       </td>
                       <td style="color: <?php if ($hoy > $fecha_entrada) {echo $color="#fd397a";} ?>"><?php echo $row['fecha_hora_inicio']; ?></td>
                       <td>
                        <a style="color: <?php if ($hoy > $fecha_entrada) {echo $color="#fd397a";} ?>" href="#" onclick="modaleditactiviti('<?php echo $datos; ?>')" class="dropdown-item" data-toggle="modal" data-target="#modaleditactividad"><?php echo $row['nombre_actividad']; ?></a>
                    </td>
                    <td style="color: <?php if ($hoy > $fecha_entrada) {echo $color="#fd397a";} ?>">
                        <?php echo $icon." ".$row['nombre_tipo_Actividad']; ?>  
                    </td>
                    <td>
                        <a class="dropdown-item" style="color: <?php if ($hoy > $fecha_entrada) {echo $color="#fd397a";} ?>" href="#" onclick="agregaform('<?php echo $datos; ?>')" data-toggle="modal" data-target="#kt_modal_5"><?php echo $row['nombres']." ".$row['apellidos'];?></a>
                    </td>
                    <td style="color: <?php if ($hoy > $fecha_entrada) {echo $color="#fd397a";} ?>">
                        <?php echo $row['id_transaccion'];?>

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

<!--begin::Modal editar-->
<div class="modal fade" id="modaleditactividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title editcambiotitle" id="exampleModalLabel">Editar Actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">


                <div class="form-group row">
                    <aside class="col-2"></aside>
                    <div class="btn-group col-8" role="group" aria-label="Button group with nested dropdown" id="icontipoedit">

                    </div>
                    <div id="inputidiconedit"></div>
                    <div id="inputidactividadedit"></div>

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
                            <input type="text" class="form-control testfecha" readonly="" placeholder="Seleccionar Fecha" name="editfechaactividad" id="kt_datepicker_2">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group timepicker">
                            <input class="form-control testhora" id="kt_timepicker_1" readonly="" name="horaactividad" type="text">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-clock-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control kt-selectpicker" name="duracionactividadedit" id="duracionactividadedit">
                            <option value="" style="display: none;">Seleccionar</option>
                            <option value="5">5 minutos</option>
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
                        <input type="text" class="form-control" name="nombre_actividad_edit" id="nombre_actividad_edit">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-form-label col-2">Asignar a</label>
                    <div class="col-10">
                        <select class="form-control kt-selectpicker" data-live-search="true" tabindex="-98" name="nombre_empleado_actividadeditar" id="nombre_empleado_actividadeditar">
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
                        <select class="form-control kt-selectpicker" data-live-search="true" tabindex="-98" name="nombre_clienteeditar" id="nombre_clienteeditar">
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
                    <label for="" class="col-form-label col-2">Confirmado</label>
                    <div class="col-10">
                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                            <label>
                                <input type="checkbox" id="editconfirmadoactividad" name="editconfirmadoactividad" value="Confirmada">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="editbtnguardar" onclick="btneditactividad()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End begin::Modal editar-->

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

        modaladdactiviti();

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

    function modaladdactiviti(response){

        var fecha = moment().format("MM/DD/YYYY");
        $(".addfechaactual").val(fecha);
        $('.addfechaactual').trigger("change");
        
        if (response!=undefined) {
            $('#nombre_cliente').val(response);
            $('#nombre_cliente').trigger("change");
            $('.cambiotitle').text("");
            $('.cambiotitle').text("Agregar Próxima Actividad");
        }else{
            $('.cambiotitle').text("");
            $('.cambiotitle').text("Agregar Actividad");
        }
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
                case '6':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-bell btn btn-secondary testicon';
                input.id='$idtipoactividad'
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
                input.id='$idtipoactividad'
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
                input.id='$idtipoactividad'
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
                input.id='$idtipoactividad'
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

    function modaleditactiviti(datos){
        d=datos.split('||');
        $('#icontipoedit').empty();

        if(document.getElementById(d[5]+"confirmar").getAttribute ('disabled')!=null){
            document.getElementById("editconfirmadoactividad").disabled = true;
        }else{
            document.getElementById("editconfirmadoactividad").disabled = false;
        }

        if($("#"+d[5]+"confirmar").is(':checked')) {

            $("#editconfirmadoactividad").prop("checked", true);

        }else{

            $("#editconfirmadoactividad").prop("checked", false);

        }

        <?php
        $conexion->query("SET NAMES 'utf8'");
        $query = "SELECT * FROM tipo_actividad";
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
                input.className = 'la la-file-text-o btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '2':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-envelope-o btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '3':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-phone btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '4':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-money btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '6':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-bell btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '7':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-briefcase btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '8':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cog btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '9':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cut btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '10':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-eye btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;

                default:
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cart-plus btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
            }
        }
        ?>
        
        document.getElementById('edit'+d[6]).disabled = true;
        document.getElementById('nombre_actividad_edit').value=d[7];
        var fecha=d[8].substring(0,10);
        var year=fecha.substring(0,4);
        var mount=fecha.substring(5,7);
        var day=fecha.substring(8,10);
        var fechavalue=mount+"/"+day+"/"+year;
        $(".testfecha").val(fechavalue);

        var hour=d[8].substring(11,16);
        var hours=hour.substring(0,2);
        var minuts=hour.substring(3,6);
        var houractiviti=hours+":"+minuts;

        var fecha1 = moment(d[8]);
        var fecha2 = moment(d[9]);
        var diff=fecha1-fecha2;
        var duracionedit=(fecha2.diff(fecha1, 'minutes'));

        if (parseInt(hours) > 12) {
            var tiempo="PM"
        }else{
            var tiempo="AM"
        }
        if (tiempo=="PM"||hours=="00") {
            switch (parseInt(hours)) {
              case 13:
              var hora="1:"+minuts+" "+tiempo;
              break;
              case 14:
              var hora="2:"+minuts+" "+tiempo;
              break;
              case 15:
              var hora="3:"+minuts+" "+tiempo;
              break;
              case 16:
              var hora="4:"+minuts+" "+tiempo;
              break;
              case 17:
              var hora="5:"+minuts+" "+tiempo;
              break;
              case 18:
              var hora="6:"+minuts+" "+tiempo;
              break;
              case 19:
              var hora="7:"+minuts+" "+tiempo;
              break;
              case 20:
              var hora="8:"+minuts+" "+tiempo;
              break;
              case 21:
              var hora="9:"+minuts+" "+tiempo;
              break;
              case 22:
              var hora="10:"+minuts+" "+tiempo;
              break;
              case 23:
              var hora="11:"+minuts+" "+tiempo;
              break;
              default:
              var hora="12:"+minuts+" "+tiempo;
          }
      }else{
        var cero=hours.substring(0,1);
        if (cero=="0") {
            var hora=hours.substring(1,4)+":"+minuts+" "+tiempo; 
        }else{
            var hora=hours.substring(0,4)+":"+minuts+" "+tiempo;
        } 
    }

    $(".testhora").val(hora);
    $('.testhora').trigger("change");
    document.getElementById("duracionactividadedit").value=duracionedit;
    $('#duracionactividadedit').trigger("change");
    document.getElementById('nombre_actividad_edit').value=d[7];
    $(".testfecha").val(fechavalue);
    document.getElementById("nombre_empleado_actividadeditar").value=d[10];
    $('#nombre_empleado_actividadeditar').trigger("change");
    document.getElementById("nombre_clienteeditar").value=d[0];
    $('#nombre_clienteeditar').trigger("change");
    var input = document.createElement('input');
    input.type = 'text';
    input.name = 'iconselectactividadedit';
    input.id = 'iconselectactividadedit';
    input.value = d[6];
    $('#inputidiconedit').empty();
    lugar=document.getElementById('inputidiconedit').appendChild(input);
    $("#iconselectactividadedit").css('display','none');

    var inputid_acticidad = document.createElement('input');
    inputid_acticidad.type = 'text';
    inputid_acticidad.name = 'idactividadedit';
    inputid_acticidad.id = 'idactividadedit';
    inputid_acticidad.value = d[5];
    $('#inputidactividadedit').empty();
    lugar=document.getElementById('inputidactividadedit').appendChild(inputid_acticidad);
    $("#idactividadedit").css('display','none');
}

function selecticonedit(datos){

    d=datos.split('||');
    $(".testiconedit").removeAttr("disabled");
    document.getElementById('edit'+d[0]).disabled = true;
    document.getElementById('nombre_actividad_edit').setAttribute('placeholder',d[1]);
    document.getElementById("iconselectactividadedit").value=d[0];
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
        var valueusuario='<?php echo $id_empleado_actividad; ?>';

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

function btneditactividad(){

    
    var valueeditfecha=document.getElementsByName("editfechaactividad")[0].value;
    var valueedittipoactividad=document.getElementsByName("iconselectactividadedit")[0].value;
    var valueedithora=$(".testhora").val();
    var valueeditduracion=document.getElementsByName("duracionactividadedit")[0].value;
    var valueeditnombreactividad=document.getElementsByName("nombre_actividad_edit")[0].value;
    var valueeditnombreempleado=document.getElementsByName("nombre_empleado_actividadeditar")[0].value;
    var valueeditnombrecliente=document.getElementsByName("nombre_clienteeditar")[0].value;
    var valueeditidactividad=document.getElementsByName("idactividadedit")[0].value;
    var valueusuario='<?php echo $id_empleado_actividad; ?>';
    
    if($("#editconfirmadoactividad").is(':checked')) {

        var valueconfirmadaactividad="Confirmada";

    }else{

        var valueconfirmadaactividad="No confirmada";

    }

    if (valueeditnombreactividad=="") {

        var textvalueeditnombreactividad=document.getElementById("nombre_actividad_edit").placeholder;
        valueeditnombreactividad=textvalueeditnombreactividad;
        
    }

    let fecha = valueeditfecha.split("/");
    let hora;
    if(valueedithora.includes("PM") && !valueedithora.includes(12)){
        hora = valueedithora.substring(0,5);
        hora = hora.split(":");
        hora[0]= (parseInt(hora[0])+12).toString();
    }else{
        hora = valueedithora.substring(0,5);
        hora = hora.split(":");
    }
    let iday= fecha[1];
    let imonth = fecha[0];
    let iyear = fecha[2];
    let ihour = hora[0];
    let iminutes = hora[1];
    let iseconds = 00;

    inicio = new Date(iyear, imonth-1, iday, ihour, iminutes, iseconds);
    final = moment(inicio).add(valueeditduracion, 'm').toDate();

    let fday = final.getDate();
    let fmonth = final.getMonth()+1;
    let fyear = final.getFullYear();
    let fhour = final.getHours();
    let fminutes = final.getMinutes();
    let fseconds = final.getSeconds();

    let srecord = iyear+"-"+imonth+"-"+iday+" "+ihour+":"+iminutes+":"+iseconds;
    let frecord = fyear+"-"+fmonth+"-"+fday+" "+fhour+":"+fminutes+":"+fseconds;

    $.ajax({                        
        type: "POST",                 
        url: "funciones/editactividades.php",     
        data:{
            idtipoactividad:valueedittipoactividad,
            fechainicial: srecord,
            fechafinal: frecord,
            idcliente:valueeditnombrecliente,
            idempleado:valueeditnombreempleado,
            idusuario:valueusuario,
            nombreactividad:valueeditnombreactividad,
            id_actividad:valueeditidactividad,
            confirmada:valueconfirmadaactividad
        },
        beforeSend: function () {
            document.getElementById("editbtnguardar").disabled=true;
            document.getElementById("editbtnguardar").className = "btn btn-primary kt-spinner kt-spinner--right kt-spinner--md kt-spinner--light";
        },
        success:  function (response) {
            document.getElementById("btnguardar").disabled=false;
            alertify.set('notifier','position', 'botton-right');
            alertify.success('<strong>¡Actividad Actualizada!</strong>');
            $("#modaleditactividad").modal("hide");
            setInterval(function(){
                location.reload();
            },900)
        },
        error: function(xhr, status, err) {
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>Problemas con el servidor</strong>');
            document.getElementById("editbtnguardar").disabled=false;
        }
    })

}

function btncompletadoactividad(datos){

    d=datos.split('||');

    $.ajax({                        
        type: "POST",                 
        url: "funciones/completaractividad.php",     
        data:{id_actividad:d[5],id_cliente:d[0]},
        beforeSend: function () {
        },

        success:  function (response) {

            if (response!="Hay otra actividad") {

                modaladdactiviti(response);
                alertify.set('notifier','position', 'botton-right');
                alertify.success('<strong>¡Actividad Completada!</strong>');
                setInterval(function(n){
                    $("#"+d[5]).css("display","none");
                },700)

                $("#kt_modal_4").modal("show");

            }else{

                alertify.set('notifier','position', 'botton-right');
                alertify.success('<strong>¡Actividad Completada!</strong>');
                setInterval(function(n){
                    $("#"+d[5]).css("display","none");
                },700)
            }
        },

        error: function(xhr, status, err) {
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>Problemas con el servidor</strong>');
        }
    })
}
function confiactividad(id_actividad){
    d=id_actividad.split('||');
    const actividad=d[5];
    var confirmaractividad;
    if($("#"+d[5]+"confirmar").is(':checked')) {  
       confirmaractividad="Confirmada";
       updateconfirmado(confirmaractividad, actividad);
   }else{  
    confirmaractividad="No confirmada";
    updateconfirmado(confirmaractividad, actividad);
}
function updateconfirmado(confirmaractividad, actividad){
    $.ajax({                        
        type: "POST",                 
        url: "funciones/confirmaractividad.php",     
        data:{confirmado:confirmaractividad,id_actividad:actividad},
        success:  function (response) {
            alertify.set('notifier','position', 'botton-right');
            alertify.success('<strong>¡Actividad '+confirmaractividad+'!</strong>');
        },
        error: function(xhr, status, err) {
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>Problemas con el servidor</strong>');
        }
    })  
}  
}
</script>
</body>
</html>