var actividades;       //variable que se queda fija y no se debe alterar para almacenar todas las actividades
var tabla;             //variable cambiante para que pueda reescribirse la tabla
var FilterIcon;
var filter = false;
var activities_filtered_by_icons = [];
var activities_filtered_by_completed = [];
var filtro_especifico = [];
var completado = document.getElementById('completado');


//filtro por rango de fecha
function pickDateRange(id){
    var date_range = $('#kt_datepicker_5').val();
    console.log(console.log(date_range));
}

//filtro por select variado
//primero obtendre la lista de las sucursales y de los empleados para poder hacer el filtro 
async function filterBySelect(){
    filtro_especifico = [];
    let sucursales;
    let empleados;
    //peticion para obtener las empleados
    await $.ajax({
        type: 'GET',
        url: 'funciones/empleados.get.php',
        success: res => {
            empleados = JSON.parse(res);
        },
        error : err => {
            console.log(err);
        }
    });

    //peticion para obtener los empleados sucursales
    await $.ajax({
        type: 'GET',
        url: 'funciones/getsucursales.php',
        success: res => {
            sucursales = JSON.parse(res);
        },
        error: err => {
            console.log(err);
        }
    });
    
    let filter = document.getElementById('kt_select2_1').options[document.getElementById("kt_select2_1").selectedIndex].text;
    
    actividades.forEach(element => {
        if(element.nombre_empleado+" "+element.apellido_empleado == filter || element.nombre_sucursal == filter){
            filtro_especifico.push(element);
        }
    });

    console.log(filtro_especifico);

    //magia de filtrado ocurre aqui
    //tabla.forEach(element => {
        //if(element.nombre_empleado == )
    //});
}

//filtro por completado
completado.addEventListener('change', ()=>{
    if(completado.checked){
        filterByCompleted();
    }else{
        //aqui se imprime la lista original sin filtro
        unfilterByCompleted();
    }
})

function filterByCompleted(){
    //console.log("si voy a filtrar actividades por completadas y no completadas");
    activities_filtered_by_completed = [];
    tabla.forEach(element => {
        if(element.completado == 'Completado'){
            activities_filtered_by_completed.push(element);
        }
    });
    console.log(activities_filtered_by_completed);
}

function unfilterByCompleted(){
    //console.log('no voy a filtrar por completado');
}

//preparativos previos del filtro de actividades
$(document).ready(()=>{
    $.ajax({
        type: 'GET',
        url: 'funciones/actividades.get.php',
        success: res => {
            actividades = JSON.parse(res);
            tabla = actividades;
        },
        error : err => {
            console.error(err);
        }
    });
});

//filtro por iconos
function filterByIcon(id_icon){
    let icono = document.getElementById('btn-icon-'+id_icon);
    if(FilterIcon != null){
        if(id_icon == FilterIcon){
            filter = !filter;
            if(filter){
                iconFilter(id_icon);
                setIconColor(id_icon);                
            }else{
                tabla = actividades;
                console.log(tabla);
                deSelectIconColor(id_icon);
            }
        }else{
            FilterIcon = id_icon;
            filter = true;
            iconFilter(id_icon);
            setIconColor(id_icon);
        }
    }else{
        FilterIcon = id_icon;
        filter = !filter;
        iconFilter(id_icon);
        setIconColor(id_icon);
    }
}

//funciones esteticas relacionadas con los filtros de iconos y su ilustracion
function setIconColor(id_icon){
    let icon = document.getElementById('btn-icon-'+id_icon);
    for(let i = 1; i<=10; i++){
        if('btn-icon-'+id_icon == 'btn-icon-'+i){
            icon.style.background = "#ececf5";
            icon.style.color      = "#6f7275";
            icon.style.transition = "0.3s";
        }else{
            document.getElementById('btn-icon-'+i).style.background = "white";
            document.getElementById('btn-icon-'+i).style.color = "#646c9a";
            document.getElementById('btn-icon-'+i).style.transition = "0.3s";
        }
    }
}

function deSelectIconColor(id_icon){
    let icon = document.getElementById('btn-icon-'+id_icon);
    icon.style.background = "white";
    icon.style.color = "#646c9a";
    icon.style.transition = "0.5s";
}

function iconFilter(id_icon){
    activities_filtered_by_icons = [];
    actividades.forEach(actividad => {
        if(actividad.id_icon == id_icon){
            activities_filtered_by_icons.push(actividad);
        }
    });
    tabla = activities_filtered_by_icons;
    console.log(tabla);
}

