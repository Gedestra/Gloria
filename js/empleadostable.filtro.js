var checkedActivity;
var empleadosActivos;
var sucursal; 

$(document).ready(function(){
    $("#filtroActividad").click(()=>{
        if($("#filtroActividad").is(':checked')){
            checkedActivity = true;
            console.log(checkedActivity);
        }else{
            checkedActivity = false;
            console.log(checkedActivity);
        }
    });
});

function filterByValue(){
    sucursal = document.getElementById("kt_select2_1").options[document.getElementById("kt_select2_1").selectedIndex].text;
    console.log(sucursal);
}

/**
 * -----------------------------------------------------------------------------------------------------------------------------
 * funciones que cargan el select
 */
function cargarSelect(){
    var table = $.ajax({
        type : "GET",
        url : "funciones/empleadostable.select.php",
        beforesend: function() {},
        success : res => {
            setSelectFilterByValue(JSON.parse(res));
            
        },
        error : err => {
            console.error(err);     
        }
    });
}

function setSelectFilterByValue(res){
    let counter = 1;
    let todos = document.createElement('option');
    todos.innerHTML = "todas";
    document.getElementById("kt_select2_1").appendChild(todos);
    res.forEach(element => {
        let option = document.createElement('option');
        option.setAttribute('value', counter);
        option.innerHTML = element.nombre;
        document.getElementById("kt_select2_1").appendChild(option);
        counter++;
    });
}

cargarSelect();

/**
 * --------------------------------------------------------------------------------------------------------------------------------------------
 */