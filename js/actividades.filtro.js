var actividades;

//tipos de filtro posibles
var filtro_tipo_actividad = false;
var filtro_actividades_completadas = false;
var filtro_sucursal_empleado = false;
var filtro_rango_fecha = false;

//variables que almacenas las funciones de filtro
var id_icon;
var sucursal_empleado;
//rango de completado pero es booleano
var rango_fechas;

/* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* FUNCION INICIAL DEL MODULO -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* */
$(document).ready(() =>{
   $.ajax({
        type: 'GET',
        url: './funciones/actividades.get.php',
        success: res => {
            actividades = JSON.parse(res);
            //console.log(actividades);
            filter();
        }
   });
});

/* -------------------------------------------------- FILTROS DEL MODULO -------------------------------------------------- */

//------------------------------    FILTRO POR ICONO    ------------------------------
function filterByIcon(id_icon){
    if(this.id_icon != null){
        if(this.id_icon != id_icon){
            filtro_tipo_actividad = true;
            this.id_icon = id_icon;
            filter();
        }else{
            if(filtro_tipo_actividad){
                filtro_tipo_actividad = false;
                filter();
            }else{
                filtro_tipo_actividad = true;
                this.id_icon = id_icon;
                filter();
            }
        }
    }else{
        this.id_icon = id_icon;
        filtro_tipo_actividad = true;
        filter();
    }
}

//------------------------------    FILTRO POR COMPLETADO ------------------------------
document.getElementById('completado').addEventListener('change',() => {
    if(document.getElementById('completado').checked){
        filtro_actividades_completadas = true;
        filter();
    }else{
        filtro_actividades_completadas = false;
        filter();
    }
});

//------------------------------    FILTRO POR SUCURSAL O EMPLEADO  ------------------------------
function filterBySelect(){
    this.sucursal_empleado = document.getElementById('kt_select2_1').options[document.getElementById("kt_select2_1").selectedIndex].text;

    if(this.sucursal_empleado != 'todas'){
        this.filtro_sucursal_empleado = true;
    }else{
        this.filtro_sucursal_empleado = false;
    }

    filter();
}

//------------------------------    FILTRO POR RANGO DE FECHA   ------------------------------
function pickDateRange(){
    rango_fechas = document.getElementById('rangoBusqueda').value.split('/');
    filtro_rango_fecha = true;
    filter();
}

function cancelFilterByRange(){
    filtro_rango_fecha = false;
}

// -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* LOGICA DE FILTRADO -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

// ------------------------------   FILTRO MAESTRO  ------------------------------
function filter(){
    let content = actividades;

    if(filtro_tipo_actividad){
        content = iconFilter(content)
        if(filtro_actividades_completadas){
            content = completeFilter(content);
            if(filtro_sucursal_empleado){
                content = sucursalEmpleadoFilter(content);
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }else{
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }
        }else{
            if(filtro_sucursal_empleado){
                content = sucursalEmpleadoFilter(content);
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }else{
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }
        }
    }else{
        if(filtro_actividades_completadas){
            content = completeFilter(content);
            if(filtro_sucursal_empleado){
                content = sucursalEmpleadoFilter(content);
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }else{
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }
        }else{
            if(filtro_sucursal_empleado){
                content = sucursalEmpleadoFilter(content);
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }else{
                if(filtro_rango_fecha){
                    content = dateRangeFilter(content);
                    printTable(content);
                }else{
                    printTable(content);
                }
            }
        }
    }

}

// ------------------------------   FILTRO POR ICONOS   ------------------------------
function iconFilter(content){
    let filtered_activities = [];
    content.forEach(actividad => {
        if(actividad.id_icon == id_icon){
            filtered_activities.push(actividad);
        }
    });

    return filtered_activities;
}

// ------------------------------   FILTRO POR COMPLETADO   ------------------------------
function completeFilter(content){
    let filtered_activities = [];
    content.forEach(actividad => {
        if(actividad.completado == 'Completado'){
            filtered_activities.push(actividad);
        }
    })
    return filtered_activities;
}

// ------------------------------   FILTRO POR SUCURSAL O EMPLEADO  ------------------------------
function sucursalEmpleadoFilter(content){
    let filtered_activities = [];
    content.forEach(actividad => {
        if(actividad.nombre_empleado + " " + actividad.apellido_empleado == sucursal_empleado ||
            actividad.nombre_sucursal == sucursal_empleado)
        {
            filtered_activities.push(actividad);
        }
    })
    return filtered_activities;
}

// ------------------------------   FILTRO POR RANGO Y FECHA    ------------------------------
function dateRangeFilter(content){
    let filtered_activities = [];
    let begin = rango_fechas[0].substring(0, rango_fechas[0].length -1);
    let end = rango_fechas[1].substring(1, rango_fechas[1].length);        
    
    let inicio = new Date(begin.split("-"));
    let termino;
    if(begin != end){
        termino = new Date(end.split("-"));
    }else{
        let fecha = end.split("-");
        termino = new Date(fecha[0], fecha[1]-1, Number(fecha[2])+1);
    }
    content.forEach(actividad => {
        let fecha = actividad.fecha_inicio.split(" ");
        fecha = fecha[0];
        fecha = new Date(fecha);
    
        if(fecha.getTime() > inicio.getTime() && fecha.getTime() < termino.getTime()){
            filtered_activities.push(actividad);
        }
    });

    return filtered_activities;
}

// -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* IMPRESION DE LA NUEVA TABLA -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
function printTable(content){
    let table = document.getElementById('content');
    console.log(content);
    if(content.length != 0){
        let tablecontent = "";
        content.forEach(actividad => {
            let completado       = "<td style='text-align: center;''><label class='kt-checkbox kt-checkbox--tick kt-checkbox--success' style='margin-bottom: 15px;'><input type='checkbox' onclick='btncompletadoactividad()'><span></span></label></td>";
            let confirmado       = "<td style='text-align: center;'><span class='kt-switch kt-switch--outline kt-switch--icon kt-switch--success'><label><input type='checkbox' id='' name='confirmadoactividad' value='Activo' onclick='confiactividad()'><span></span></label></span></td>";
            let fecha_inicio     = "<td class='fecha_inicio'>" + actividad.fecha_inicio + "</td>";
            let fecha_termino    = "<td class='fecha_termino'>" + actividad.fecha_termino + "</td>";
            let nombre_actividad = "<td class='nombre_actividad'><a href='#' onclick='modaleditactiviti()' class='dropdown-item' data-toggle='modal' data-target='#modaleditactividad'>" + actividad.nombre_actividad + "</a></td>";
            let tipo_actividad   = "<td class='tipo-actividad'>" + actividad.nombre_tipo_actividad + "</td>";
            let nombre_cliente   = "<td><a class='dropdown-item' href='#' onclick='agregaform()' data-toggle='modal' data-target='#kt_modal_5'>" + actividad.nombre_cliente + " " + actividad.apellido_cliente + "</a></td>";
            let transaccion      = "<td class='transaccion'>" + actividad.transaccion + "</td>";
            let row = "<tr id ='"+actividad.id_actividad+"'>" + completado + confirmado + fecha_inicio + fecha_termino + nombre_actividad + tipo_actividad + nombre_cliente + transaccion + "</tr>";
            tablecontent = tablecontent + row;
            table.innerHTML = tablecontent;
        })
    }else{
        table.innerHTML = "<td  colspan='8' style='color:red; font-weight: bold; text-align: center;'>Sin resultados :/</td>"
    }
    
    
}


/**
 *  "<tr id ='"actividad.id_actividad"'>" + + "</tr>"
 * 
 * <td style='text-align: center;'><label class='kt-checkbox kt-checkbox--tick kt-checkbox--success' style='margin-bottom: 15px;'><input type='checkbox' onclick='btncompletadoactividad()'><span></span></label></td>
 * <td style='text-align: center;'><span class='kt-switch kt-switch--outline kt-switch--icon kt-switch--success'><label><input type='checkbox' id='' name='confirmadoactividad' value='Activo' onclick='confiactividad()'><span></span></label></span></td>
 * <td class="fecha_inicio"></td>
 * <td class='fecha_termino'></td>
 * <td class='nombre_actividad'><a href='#' onclick='modaleditactiviti()' class='dropdown-item' data-toggle='modal' data-target='#modaleditactividad'></a></td>
 * <td class='tipo-actividad'></td>
 * <td><a class='dropdown-item' href='#' onclick='agregaform()' data-toggle='modal' data-target='#kt_modal_5'></a></td>
 * <td class='transaccion'></td>
 */

/**
 * 
 *  <tr id="<?php echo $row['id_Actividad'];?>">
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
                     <td style="color: <?php if ($hoy > $fecha_entrada) {echo $color="#fd397a";} ?>"><?php echo $row['fecha_hora_termino']; ?></td>
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
 * 

                    
 */