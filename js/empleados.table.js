var HTMLtable = document.getElementById("tableBody");
var table = $.ajax({
    type : "GET",
    url : "funciones/empleados.table.php",
    beforesend: function() {},
    success : res => {
        createTable(res);
    },
    error : err => {
        console.error(err);     
    }
});

function createTable(res){
    
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
        sub_menu1.setAttribute('onclick', agregaform());
        sub_menu1.addEventListener('click', agregaform());
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
        sub_menu2.setAttribute('onclick', editarform());
        sub_menu2.addEventListener('click', editarform());
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

    function agregaform(){
        console.log("Hola! desde ver form")
        /*d=datos.split('||');
        $('#upusername').val(d[0]);
        $('#acticlinom').text(d[1]);
        $('#acticlitel').text(d[4]);
        $('#acticlicor').text(d[3]);
        var boton = document.createElement('a');
        boton.text = 'Ver Detalles';
        boton.href = "showcliente.php?cliente="+d[0];
        boton.className = 'btn btn-success btn-sm';
        boton.id = 'btnshowclivi';
        boton.setAttribute('target', '_blank');
        $('#btnshowclie').empty();
        lugar=document.getElementById('btnshowclie').appendChild(boton);*/
    }

    function editarform(){
        console.log("Hola desde edicion")
    }

    /*for(let i = 0; i<100; i++){
        let row = document.createElement('tr');
        row.setAttribute('id','row1');
        
        for(let i=0; i<6; i++){
            let data = document.createElement('td');
            data.innerHTML = "lorem";
            row.appendChild(data);
        }
        
        HTMLtable.appendChild(row);
    }*/

    /*res.forEach(element => {
        rowCounter++;
        
        dataTable.push("<tr>" + "<td>" + element[0] + "</td>" + 
                        "<td>" + element[1] + "</td>" 
                        + "<td>" + element[2] + "</td>" +
                        "<td>" + element[3] + "</td>" +
                        "<td>" + element[4] + "</td>"
                        + "</tr>")
    });*/

    //let print = "";
    //dataTable.forEach(element => print = print + element);

    //HTMLtable.innerHTML = print;
}

/*var content = [
    {
        message: "hello",
        content: "hello world!"
    },
    {
        message: "with love",
        content: "with love from me to you"
    },
    {
        message: "can't buy me love!",
        content: "can't buy me love! can't buy me love!"
    },
    {
        message: "help!",
        content: "i need somebody, help!"
    },
];

let datatable = [];
content.forEach(element => {
    datatable.push("<tr>" + "<td>" + element.message + "</td>" + "<td>" + element.content + "</td>" + "</tr>");
})

let print = ""; 
datatable.forEach(element => {
    print = print + element;
});

table.innerHTML = print;*/