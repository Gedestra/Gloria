var HTMLtable = document.getElementById("tableBody");
var contentTable;
var table = $.ajax({
    type : "GET",
    url : "funciones/empleados.table.php",
    beforesend: function() {},
    success : res => {
        /*res = JSON.parse(res);
        res.forEach(element => {
            let data = {
                nombre: element[0],
                apellido: element[1],
                correo: element[2],
                telefono: element[3],
                sucursal: element[4],
                sucursal: element[5]
            }
            console.log(data);
        })*/
        createTable(res);
    },
    error : err => {
        console.error(err);     
    }
});
var empleado;

function createTable(res){
    res = JSON.parse(res);
    let empleados =[];
    res.forEach(element => {
        let empleado = {
            nombre: element[0],
            apellido: element[1],
            correo: element[2],
            telefono: element[3],
            sucursal: element[4],
            estatus: element[5],
            id: element[6]
        }
        empleados.push(empleado);
    });

    //se guarda la informacion de los empleados en una tabla genérica para que se trate la información después
    contentTable = empleados;

    let contadorEmpleados = 0;
    empleados.forEach(empleado => {
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

async function agregaform(item){
    let nombre = item.childNodes[0].innerHTML;
    let empleadoAuxiliar;
    

    contentTable.forEach(element => {
        if(element.nombre+" "+element.apellido == nombre){
            empleadoAuxiliar = element;
        }

    })
    await $.ajax({
        type : "GET",
        url : "funciones/getEmpleado.php",
        data: {
            id_empleado : empleadoAuxiliar.id
        },
        beforesend: function() {},
        success : res => {
            
            this.empleado = JSON.parse(res);      
        },
        error : err => {
            console.error(err);     
        }
    })

    $('#nombre').text(empleado.nombre_empleado + " " + empleado.apellido);
    $('#puesto').text(empleado.puesto);
    $('#correo').text(empleado.correo);
    $('#telefono').text(empleado.telefono);
    $('#sexo').text(empleado.sexo);
    $('#fecha_nacimiento').text(empleado.fecha_nacimiento);
    
    $('#escolaridad').text(empleado.escolaridad);
    $('#estado_civil').text(empleado.estado_civil);
    $('#numero_hijos').text(empleado.numero_hijos);
    $('#fecha_ingreso').text(empleado.fecha_ingreso);
    $('#numero_imss').text(empleado.numero_imss);
    $('#curp').text(empleado.curp);
    $('#rfc').text(empleado.rfc);
    $('#id_sucursal').text(empleado.nombre_sucursal);
    if (empleado.estatus =="Activo") {
        $("#verestatus").empty();
        var parrafo = document.createElement("span");
        var contenido = document.createTextNode("Activo");
        var mostrar=parrafo.appendChild(contenido);
        document.body.appendChild(parrafo);
        var contenedor = document.getElementById("verestatus");
        contenedor.appendChild(parrafo);
        $('#verestatus').removeClass( "btn btn-bold btn-sm btn-font-sm  btn-label-danger" ).addClass( "btn btn-bold btn-sm btn-font-sm  btn-label-success" );
    }else{
        $("#verestatus").empty();
        var parrafo = document.createElement("span");
        var contenido = document.createTextNode("Inactivo");
        var mostrar=parrafo.appendChild(contenido);
        document.body.appendChild(parrafo);
        var contenedor = document.getElementById("verestatus");
        contenedor.appendChild(parrafo);
        $('#verestatus').removeClass( "btn btn-bold btn-sm btn-font-sm  btn-label-success" ).addClass( "btn btn-bold btn-sm btn-font-sm  btn-label-danger" );
    }
    if (empleado.estatus =="Activo") {
        $("#iconcumple").empty();
        $("#iconcumple").show();
        var parrafo = document.createElement("i");
        var contenido = document.createTextNode("");
        var mostrar=parrafo.appendChild(contenido);
        document.body.appendChild(parrafo);
        var contenedor = document.getElementById("iconcumple");
        contenedor.appendChild(parrafo);
        $('#iconcumple').addClass('la la-birthday-cake fa-2x');
        $('#iconcumple').css('color', '#1dc9b7')
        confetti.start(3000);
    }else{
        $("#iconcumple").empty();
        $("#iconcumple").hide();
    }
}

async function editarform(item){

    let nombre = item.childNodes[0].innerHTML;
    let empleadoAuxiliar;
    

    contentTable.forEach(element => {
        if(element.nombre+" "+element.apellido == nombre){
            empleadoAuxiliar = element;
        }

    })

    await $.ajax({
        type : "GET",
        url : "funciones/getEmpleado.php",
        data: {
            id_empleado : empleadoAuxiliar.id
        },
        beforesend: function() {},
        success : res => {
            
            this.empleado = JSON.parse(res);      
        },
        error : err => {
            console.error(err);     
        }
    })

    console.log(this.empleado);
    $('#id_empleado').val(empleado.id);
    $('#upnombre').val(empleado.nombre_empleado);
    $('#upapellido').val(empleado.apellido);
    $('#upcorreo').val(empleado.correo);
    $('#uptelefono').val(empleado.telefono);
    $('#uppuesto').val(empleado.puesto);
    $('#upsucursal').val(empleado.id_sucursal);
    if (empleado.estatus=="Activo") {
        $("#upestatus").prop("checked", true);
    }else{
        $("#upestatus").prop("checked", false);
    }
}