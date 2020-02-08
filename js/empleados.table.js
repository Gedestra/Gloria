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
            estatus: element[5]
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
        sub_menu1.setAttribute('onclick', 'agregaform()');
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
        sub_menu2.setAttribute('data-target','#kt_modal_5');
        sub_menu2.setAttribute('onclick', 'editarform()');
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

//var activeFiltro = document.getElementById("activeFilter");
//activeFiltro.setAttribute("checked",false);

/*function createTable(res){
    
    res = JSON.parse(res);
    contentTable = res;
    let rowCounter = 0;
    res.forEach(element => {
        rowCounter ++;
        let row = document.createElement('tr');
        row.setAttribute('id', 'row'+rowCounter);
        let datacounter = 0;

        element.forEach(subelement => {
            datacounter++;
            data = document.createElement('td');
            data.setAttribute('id', 'data'+datacounter);

            if(subelement.toString() == 'Activo' || subelement.toString() == 'Inactivo'){
                if(subelement == 'Activo'){
                    data.innerHTML = "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-success'>Activo</span>"
                }else{
                    data.innerHTML = "<span class='btn btn-bold btn-sm btn-font-sm  btn-label-danger'>Inactivo</span>";
                }
            }else{
                data.innerHTML = subelement;
            }
            row.appendChild(data);
        })

        let acciones = document.createElement('td');

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
        sub_menu1.setAttribute('onclick', 'agregaform()');
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
        sub_menu2.setAttribute('data-target','#kt_modal_5');
        sub_menu2.setAttribute('onclick', 'editarform()');
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

        row.appendChild(acciones);
        HTMLtable.appendChild(row);
    })
}*/

function agregaform(datos){
    console.log("Hola mundo!");
    /*d=datos.split('||');
    $('#nombre').text(d[1]);
    $('#puesto').text(d[14]);
    $('#correo').text(d[3]);
    $('#telefono').text(d[4]);
    $('#sexo').text(d[5]);
    $('#fecha_nacimiento').text(d[6]);
    $('#escolaridad').text(d[7]);
    $('#estado_civil').text(d[8]);
    $('#numero_hijos').text(d[9]);
    $('#fecha_ingreso').text(d[10]);
    $('#numero_imss').text(d[11]);
    $('#curp').text(d[12]);
    $('#rfc').text(d[13]);
    $('#id_sucursal').text(d[17]);
    if (d[15]=="Activo") {
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
    if (d[18]=="Activo") {
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
    }*/
}

function editarform(datos){
    console.log("Hola mundo! desde edicion!");
    /*d=datos.split('||');
    $('#id_empleado').val(d[0]);
    $('#upnombre').val(d[1]);
    $('#upapellido').val(d[2]);
    $('#upcorreo').val(d[3]);
    $('#uptelefono').val(d[4]);
    $('#uppuesto').val(d[14]);
    $('#upsucursal').val(d[16]);
    if (d[15]=="Activo") {
        $("#upestatus").prop("checked", true);
    }else{
        $("#upestatus").prop("checked", false);
    }*/
}