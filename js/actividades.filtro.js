var actividades;       //variable que se queda fija y no se debe alterar para almacenar todas las actividades
var tabla;             //variable cambiante para que pueda reescribirse la tabla
var FilterIcon;
var filter = false;
var activities_filtered_by_icons = [];
var activities_filtered_by_completed = [];
var filtro_especifico = [];
var completado = document.getElementById('completado');
var activities_filtered_by_date = [];

//filtro por rango de fecha
function pickDateRange(){
    activities_filtered_by_date = [];
    let dates = document.getElementById('rangoBusqueda').value.split('/');
    begin = dates[0].substring(0, dates[0].length -1)
    end = dates[1].substring(1, dates[0].length );
    begin = new Date(begin);
    end = new Date(end);
    tabla.forEach(element => {
        let auxDate = element.fecha_inicio;
        auxDate = auxDate.split(" ");
        auxDate = auxDate[0];
        auxDate = new Date(auxDate);
        if(auxDate.getTime() > begin.getTime() || auxDate.getTime < end.getTime()){
            activities_filtered_by_date.push(element);
        }
    });
    console.log(activities_filtered_by_date);
}

//filtro por select variado
//primero obtendre la lista de las sucursales y de los empleados para poder hacer el filtro 
async function filterBySelect(){
    filtro_especifico = [];
    
    let filter = document.getElementById('kt_select2_1').options[document.getElementById("kt_select2_1").selectedIndex].text;
    
    tabla.forEach(element => {
        if(element.nombre_empleado+" "+element.apellido_empleado == filter || element.nombre_sucursal == filter){
            filtro_especifico.push(element);
        }
    });

    printTable(filtro_especifico);

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
    
    activities_filtered_by_completed = [];
    tabla.forEach(element => {
        if(element.completado == 'Completado'){
            activities_filtered_by_completed.push(element);
        }
    });
    printTable(activities_filtered_by_completed);
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
    if(FilterIcon != null){
        if(id_icon == FilterIcon){
            filter = !filter;
            if(filter){
                iconFilter(id_icon);
                setIconColor(id_icon);                
            }else{
                tabla = actividades;
                printTable(tabla);
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
    printTable(tabla);
}

function printTable(content){
    let table = document.getElementById('content');
    console.log(table);
    console.log(content);
}