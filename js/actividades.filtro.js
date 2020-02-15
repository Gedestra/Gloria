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
            console.log(actividades);
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
        filtro_completado = true;
        filter();
    }else{
        filtro_completado = false;
        filter();
    }
});

//------------------------------    FILTRO POR SUCURSAL O EMPLEADO  ------------------------------
function filterBySelect(){    
    this.filtro_sucursal_empleado = document.getElementById('kt_select2_1').options[document.getElementById("kt_select2_1").selectedIndex].text;
    filter();
}

//------------------------------    FILTRO POR RANGO DE FECHA   ------------------------------
function pickDateRange(){
    rango_fechas = document.getElementById('rangoBusqueda').value.split('/');
    filtro_rango_fecha = true;
}

function cancelFilterByRange(){
    filtro_rango_fecha = false;
}

// -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* LOGICA DE FILTRADO -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

// ------------------------------   FILTRO MAESTRO  ------------------------------
function filter(){
    let content = actividades;

    //TODO: LÓGICA DE FILTRADO
    if(filtro_tipo_actividad){

        if(filtro_completado){

            if(filtro_sucursal_empleado){

                if(filtro_rango_fecha){
                    
                }
            }else{
                if(filtro_rango_fecha){
                    
                }
            }
        }else{
            if(filtro_sucursal_empleado){

                if(filtro_rango_fecha){
                    
                }
            }else{
                if(filtro_rango_fecha){
                    
                }
            }
        }
    }else{
        if(filtro_completado){

            if(filtro_sucursal_empleado){

                if(filtro_rango_fecha){
                    
                }
            }else{
                if(filtro_rango_fecha){
                    
                }
            }
        }else{
            if(filtro_sucursal_empleado){

                if(filtro_rango_fecha){
                    
                }
            }else{
                if(filtro_rango_fecha){
                    
                }
            }
        }
    }

    printTable(content);
}

// ------------------------------   FILTRO POR ICONOS   ------------------------------
function iconFilter(){

}

// ------------------------------   FILTRO POR COMPLETADO   ------------------------------
function completeFilter(){

}

// ------------------------------   FILTRO POR SUCURSAL O EMPLEADO  ------------------------------
function sucursalEmpleadoFilter(){

}

// ------------------------------   FILTRO POR RANGO Y FECHA    ------------------------------
function dateRangeFilter(){
    
}

// -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* IMPRESION DE LA NUEVA TABLA -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
function printTable(content){

}