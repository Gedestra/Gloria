var checkedActivity;
var empleadosActivos;
var sucursal; 
var empleadosTableContent;

$(document).ready(function(){
    empleadosTableContent = contentTable;
    $("#filtroActividad").click(()=>{
        if($("#filtroActividad").is(':checked')){
            checkedActivity = true;
            filterByActivity();
        }else{
            checkedActivity = false;
            printTable(empleadosTableContent);
        }
    });
    
});

function filterByActivity(){
    let activos = [];
    empleadosTableContent.forEach(empleado=>{
        if(empleado.estatus == 'Activo'){
            activos.push(empleado);
        }
    });
    printTable(activos);
}

function filterByValue(){
    this.empleadosTableContent = [];
    sucursal = document.getElementById("kt_select2_1").options[document.getElementById("kt_select2_1").selectedIndex].text;
    
    if(sucursal == 'todas'){
        empleadosTableContent = contentTable;
    }else{
        contentTable.forEach(empleado => {
            if(empleado.sucursal == sucursal){
                if($("#filtroActividad").is(':checked')){
                    if(empleado.estatus == 'Activo'){
                        empleadosTableContent.push(empleado);
                    }
                }else{
                    empleadosTableContent.push(empleado);
                }
            }
        });
    }

    printTable(empleadosTableContent);
}

function printTable(content){
    HTMLtable.innerHTML = "";
    let contadorEmpleados = 0;
    if(content.length == 0){
        let row = document.createElement('tr');
        row.style.textAlign = "center";
        row.style.color = "red";
        row.innerHTML = "sin resultados";
        HTMLtable.innerHTML = "";
        HTMLtable.appendChild(row);
    }else{
        content.forEach(empleado => {
            contadorEmpleados++;
            let row = document.createElement('tr');
            row.setAttribute('id','empleado'+contadorEmpleados);
            let empleadoRow = {
                nombre: document.createElement('td'),
                correo: document.createElement('td'),
                telefono: document.createElement('td'),
                sucursal: document.createElement('td'),
                estatus: document.createElement('td')
            }
    
            empleadoRow.nombre.innerHTML = empleado.nombre + " " + empleado.apellido;
            empleadoRow.correo.innerHTML = empleado.correo;
            empleadoRow.telefono.innerHTML = empleado.telefono;
            empleadoRow.sucursal.innerHTML = empleado.sucursal;
    
            if(empleado.estatus == 'Activo'){
                empleadoRow.estatus.innerHTML = "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-success'>"+ empleado.estatus +"</span>";
            }else{
                empleadoRow.estatus.innerHTML = "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-danger'>"+ empleado.estatus +"</span>";
            }
    
            //-----------------------------------------acciones table data------------------------------------------------------------------------
            let acciones = document.createElement('td');
            acciones.setAttribute('id','acciones'+contadorEmpleados);
    
            let btn_group = document.createElement('div');
            btn_group.setAttribute('class', 'btn-group');
            btn_group.setAttribute('role', 'group');
    
            let link = document.createElement('a');
            link.setAttribute('href','#');
            link.setAttribute('data-toggle','dropdown');
            link.setAttribute('aria-haspopup','true');
            link.setAttribute('aria-expanded','false');
    
            let linkicon = document.createElement('i');
            linkicon.setAttribute('class', 'la la-ellipsis-h');
            link.appendChild(linkicon);
    
            let drop_menu = document.createElement('div');
            drop_menu.setAttribute('class','dropdown-menu');
            drop_menu.setAttribute('aria-labelledby','btnGroupVerticalDrop1');
    
            //sub menu 1
            let sub_menu1 = document.createElement('a');
            sub_menu1.setAttribute('class','dropdown-item');
            sub_menu1.setAttribute('href','#');
            sub_menu1.setAttribute('data-toggle','modal');
            sub_menu1.setAttribute('data-target','#kt_modal_5');
            sub_menu1.setAttribute('onclick', 'agregaform('+'empleado'+contadorEmpleados+')');
            let sub_icon1 = document.createElement('i');
            sub_icon1.setAttribute( 'class','la la-eye');
            sub_menu1.appendChild(sub_icon1);
            let description1 = document.createElement('p');
            description1.innerHTML = "ver detalles";
            sub_menu1.appendChild(description1);
    
            //sub menu 2
            let sub_menu2 = document.createElement('a');
            sub_menu2.setAttribute('class','dropdown-item');
            sub_menu2.setAttribute('href','#');
            sub_menu2.setAttribute('data-toggle','modal');
            sub_menu2.setAttribute('data-target','#kt_modal_4');
            sub_menu2.setAttribute('onclick', 'editarform('+'empleado'+contadorEmpleados+')');
            let sub_icon2 = document.createElement('i');
            sub_icon2.setAttribute( 'class','la la-edit');
            sub_menu2.appendChild(sub_icon2);
            let description2 = document.createElement('p');
            description2.innerHTML = "editar empleado";
            sub_menu2.appendChild(description2);
    
            drop_menu.appendChild(sub_menu1);
            drop_menu.appendChild(sub_menu2);
    
            btn_group.appendChild(link);
            btn_group.appendChild(drop_menu);
    
            acciones.appendChild(btn_group);
    
            //-----------------------------------------acciones table data------------------------------------------------------------------------
    
            row.appendChild(empleadoRow.nombre);
            row.appendChild(empleadoRow.correo);
            row.appendChild(empleadoRow.telefono);
            row.appendChild(empleadoRow.sucursal);
            row.appendChild(empleadoRow.estatus);
            row.appendChild(acciones);
    
            HTMLtable.appendChild(row);        
        });
    }
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