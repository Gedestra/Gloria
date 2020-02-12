var actividades;       //variable que se queda fija y no se debe alterar para almacenar todas las actividades
var tabla;             //variable cambiante para que pueda reescribirse la tabla
var FilterIcon;
var filter = false;
var activities_filtered_by_icons = [];
var completado = document.getElementById('completado');

//$('#completado').checked(false);

//filtro por completado
completado.addEventListener('change', ()=>{
    if(completado.checked){
        console.log('debo filtrar por completados');
    }else{
        console.log('no debo filtrar por completados');
    }
})


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
            }else{
                tabla = actividades;
                console.log(tabla);
            }
        }else{
            FilterIcon = id_icon;
            filter = true;
            iconFilter(id_icon);
        }
    }else{
        FilterIcon = id_icon;
        filter = !filter;
        iconFilter(id_icon);
    }
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

