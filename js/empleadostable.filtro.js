var checkedActivity;

function filterByValue(){
    console.log($("#kt_select2_1").val());
}

$(document).ready(function(){
    $("#filtroActividad").click(()=>{
        if($("#filtroActividad").is(':checked')){
            checkedActivity = true;
            console.log(checkedActivity);
            console.log(contentTable);
        }else{
            checkedActivity = false;
            console.log(checkedActivity);
        }
    });
});


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
    res.forEach(element => {
        let option = document.createElement('option');
        option.setAttribute('value', counter);
        option.innerHTML = element.nombre;
        document.getElementById("kt_select2_1").appendChild(option);
        counter++;
    });
}

cargarSelect();