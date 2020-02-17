    $(document).ready(function() {

        modaladdactiviti();

        $('#example tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Buscar'+title+'" />' );
        } );


        var table = $('#example').DataTable({
            "language": {
                search: 'Buscar:',
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Sin datos",
                "info": "",
                "infoEmpty": "Sin registros",
                "infoFiltered": "(filtrados de _MAX_)",
                paginate: {
                    first: 'Primero',
                    previous: 'Anterior',
                    next: 'Siguiente',
                    last: 'Último',
                }
            }
        });
        table.columns().every( function () {
            var that = this;

        } );
    } );

    function agregaform(datos){

        d=datos.split('||');
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
        lugar=document.getElementById('btnshowclie').appendChild(boton);
    }

    function modaladdactiviti(response){

        var fecha = moment().format("MM/DD/YYYY");
        $(".addfechaactual").val(fecha);
        $('.addfechaactual').trigger("change");
        
        if (response!=undefined) {
            $('#nombre_cliente').val(response);
            $('#nombre_cliente').trigger("change");
            $('.cambiotitle').text("");
            $('.cambiotitle').text("Agregar Próxima Actividad");
        }else{
            $('.cambiotitle').text("");
            $('.cambiotitle').text("Agregar Actividad");
        }
        $('#icontipo').empty();
        <?php
        $conexion->query("SET NAMES 'utf8'");
        $query = "SELECT * FROM tipo_actividad WHERE estatus='Activo'";
        $resultado=$conexion->query($query);
        while ($row=$resultado->fetch_assoc()) {
            $datostipoactividad=$row['id_tipo_actividad']."||".$row['nombre_tipo_actividad'];
            $comas='"';
            $idtipoactividad=$row['id_tipo_actividad'];
            $nombre_tipo_actividad=$row['nombre_tipo_actividad'];
            switch ($row['id_icon']) {
                case '1':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-file-text-o btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '2':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-envelope-o btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '3':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-phone btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '4':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-money btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '6':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-bell btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '7':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-briefcase btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '8':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cog btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '9':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cut btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
                case '10':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-eye btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;

                default:
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cart-plus btn btn-secondary testicon';
                input.id='add$idtipoactividad'
                input.setAttribute('onclick','selecticon($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipo').appendChild(input);
                ";
                break;
            }
        }
        ?>
    }

    function modaleditactiviti(datos){
        d=datos.split('||');
        $('#icontipoedit').empty();

        if(document.getElementById(d[5]+"confirmar").getAttribute ('disabled')!=null){
            document.getElementById("editconfirmadoactividad").disabled = true;
        }else{
            document.getElementById("editconfirmadoactividad").disabled = false;
        }

        if($("#"+d[5]+"confirmar").is(':checked')) {

            $("#editconfirmadoactividad").prop("checked", true);

        }else{

            $("#editconfirmadoactividad").prop("checked", false);

        }

        <?php
        $conexion->query("SET NAMES 'utf8'");
        $query = "SELECT * FROM tipo_actividad WHERE estatus='Activo'";
        $resultado=$conexion->query($query);
        while ($row=$resultado->fetch_assoc()) {
            $datostipoactividad=$row['id_tipo_actividad']."||".$row['nombre_tipo_actividad'];
            $comas='"';
            $idtipoactividad=$row['id_tipo_actividad'];
            $nombre_tipo_actividad=$row['nombre_tipo_actividad'];
            switch ($row['id_icon']) {
                case '1':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-file-text-o btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '2':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-envelope-o btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '3':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-phone btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '4':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-money btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '6':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-bell btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '7':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-briefcase btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '8':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cog btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '9':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cut btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
                case '10':
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-eye btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;

                default:
                echo $icon="
                var input = document.createElement('button');
                input.type= 'button'
                input.title= '$nombre_tipo_actividad'
                input.className = 'la la-cart-plus btn btn-secondary testiconedit';
                input.id='edit$idtipoactividad'
                input.setAttribute('onclick','selecticonedit($comas$datostipoactividad$comas)');

                lugar=document.getElementById('icontipoedit').appendChild(input);
                ";
                break;
            }
        }
        ?>
        
        document.getElementById('edit'+d[6]).disabled = true;
        document.getElementById('nombre_actividad_edit').value=d[7];
        var fecha=d[8].substring(0,10);
        var year=fecha.substring(0,4);
        var mount=fecha.substring(5,7);
        var day=fecha.substring(8,10);
        var fechavalue=mount+"/"+day+"/"+year;
        $(".testfecha").val(fechavalue);

        var hour=d[8].substring(11,16);
        var hours=hour.substring(0,2);
        var minuts=hour.substring(3,6);
        var houractiviti=hours+":"+minuts;

        var fecha1 = moment(d[8]);
        var fecha2 = moment(d[9]);
        var diff=fecha1-fecha2;
        var duracionedit=(fecha2.diff(fecha1, 'minutes'));

        if (parseInt(hours) > 12) {
            var tiempo="PM"
        }else{
            var tiempo="AM"
        }
        if (tiempo=="PM"||hours=="00") {
            switch (parseInt(hours)) {
              case 13:
              var hora="1:"+minuts+" "+tiempo;
              break;
              case 14:
              var hora="2:"+minuts+" "+tiempo;
              break;
              case 15:
              var hora="3:"+minuts+" "+tiempo;
              break;
              case 16:
              var hora="4:"+minuts+" "+tiempo;
              break;
              case 17:
              var hora="5:"+minuts+" "+tiempo;
              break;
              case 18:
              var hora="6:"+minuts+" "+tiempo;
              break;
              case 19:
              var hora="7:"+minuts+" "+tiempo;
              break;
              case 20:
              var hora="8:"+minuts+" "+tiempo;
              break;
              case 21:
              var hora="9:"+minuts+" "+tiempo;
              break;
              case 22:
              var hora="10:"+minuts+" "+tiempo;
              break;
              case 23:
              var hora="11:"+minuts+" "+tiempo;
              break;
              default:
              var hora="12:"+minuts+" "+tiempo;
          }
      }else{
        var cero=hours.substring(0,1);
        if (cero=="0") {
            var hora=hours.substring(1,4)+":"+minuts+" "+tiempo; 
        }else{
            var hora=hours.substring(0,4)+":"+minuts+" "+tiempo;
        } 
    }

    $(".testhora").val(hora);
    $('.testhora').trigger("change");
    document.getElementById("duracionactividadedit").value=duracionedit;
    $('#duracionactividadedit').trigger("change");
    document.getElementById('nombre_actividad_edit').value=d[7];
    $(".testfecha").val(fechavalue);
    document.getElementById("nombre_empleado_actividadeditar").value=d[10];
    $('#nombre_empleado_actividadeditar').trigger("change");
    document.getElementById("nombre_clienteeditar").value=d[0];
    $('#nombre_clienteeditar').trigger("change");
    var input = document.createElement('input');
    input.type = 'text';
    input.name = 'iconselectactividadedit';
    input.id = 'iconselectactividadedit';
    input.value = d[6];
    $('#inputidiconedit').empty();
    lugar=document.getElementById('inputidiconedit').appendChild(input);
    $("#iconselectactividadedit").css('display','none');

    var inputid_acticidad = document.createElement('input');
    inputid_acticidad.type = 'text';
    inputid_acticidad.name = 'idactividadedit';
    inputid_acticidad.id = 'idactividadedit';
    inputid_acticidad.value = d[5];
    $('#inputidactividadedit').empty();
    lugar=document.getElementById('inputidactividadedit').appendChild(inputid_acticidad);
    $("#idactividadedit").css('display','none');
}

function selecticonedit(datos){

    d=datos.split('||');
    $(".testiconedit").removeAttr("disabled");
    document.getElementById('edit'+d[0]).disabled = true;
    document.getElementById('nombre_actividad_edit').setAttribute('placeholder',d[1]);
    document.getElementById("iconselectactividadedit").value=d[0];
}

function selecticon(datos){
    d=datos.split('||');
    $(".testicon").removeAttr("disabled");
    document.getElementById('add'+d[0]).disabled = true;
    var input = document.createElement('input');
    input.type = 'text';
    input.name = 'iconselectactividad';
    input.id = 'iconselectactividad';
    input.value = d[0];
    $('#inputidicon').empty();
    lugar=document.getElementById('inputidicon').appendChild(input);
    $("#iconselectactividad").css('display','none');
    var inputnombreactividad=lugar=document.getElementById('nombre_actividad').setAttribute('placeholder',d[1]);
}
<?php 
$query = "SELECT * FROM usuarios AS u INNER JOIN empleados AS e ON u.id_empleado=e.id_empleado WHERE username='$username'";
$resultado=$conexion->query($query);
$row=$resultado->fetch_assoc();
$id_empleado_actividad=$row['id_empleado'];
echo "$('#nombre_empleado_actividad').val('$id_empleado_actividad');";
?>
function btnaddactividad(){



    var confirmoactividadvalue;
    if($("#addconfirmadoactividad").is(':checked')) {  
        confirmoactividadvalue="Confirmada";
    }else{  
        confirmoactividadvalue="No confirmada";
    }
    var nombre_actividad_value=$("#nombre_actividad").val();
    if (nombre_actividad_value=="") {
        if($('#inputidicon').find("#iconselectactividad").length){
            var texttipoactividad=document.getElementById("nombre_actividad").placeholder;
            $("#nombre_actividad").val(texttipoactividad);
            enviardata();
        }else{
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>Seleccione un tipo de actividad seleccionando un icono</strong>');
        }
    }else{
        enviardata();
    }

    function enviardata(){
        var valuetipoactividad=$('#iconselectactividad').val();
        var valuenombreactividad=document.getElementsByName("nombre_actividad")[0].value;
        var valuefecha=document.getElementsByName("fechaactividad")[0].value;
        var valuehora=document.getElementsByName("horaactividad")[0].value;
        var valueduracion=document.getElementsByName("duracionactividad")[0].value;
        var valuecliente=document.getElementsByName("nombre_cliente")[0].value;
        var valueempleado=document.getElementsByName("nombre_empleado")[0].value;
        var valueusuario='<?php echo $id_empleado_actividad; ?>';

        if (valuecliente!=""&&valuefecha!=""&&valueduracion!="") {

            let fecha = valuefecha.split("/");
            let hora;
            if(valuehora.includes("PM") && !valuehora.includes(12)){
                hora = valuehora.substring(0,5);
                hora = hora.split(":");
                hora[0]= (parseInt(hora[0])+12).toString();
            }else{
                hora = valuehora.substring(0,5);
                hora = hora.split(":");
            }
            let iday= fecha[1];
            let imonth = fecha[0];
            let iyear = fecha[2];
            let ihour = hora[0];
            let iminutes = hora[1];
            let iseconds = 00;

            inicio = new Date(iyear, imonth-1, iday, ihour, iminutes, iseconds);
            final = moment(inicio).add(valueduracion, 'm').toDate();

            let fday = final.getDate();
            let fmonth = final.getMonth()+1;
            let fyear = final.getFullYear();
            let fhour = final.getHours();
            let fminutes = final.getMinutes();
            let fseconds = final.getSeconds();

            let srecord = iyear+"-"+imonth+"-"+iday+" "+ihour+":"+iminutes+":"+iseconds;
            let frecord = fyear+"-"+fmonth+"-"+fday+" "+fhour+":"+fminutes+":"+fseconds;

            $.ajax({                        
                type: "POST",                 
                url: "funciones/addactividades.php",     
                data:{
                    idtipoactividad:valuetipoactividad,
                    fechainicial: srecord,
                    fechafinal: frecord,
                    idcliente:valuecliente,
                    idempleado:valueempleado,
                    idusuario:valueusuario,
                    completado:'No completado',
                    nombreactividad:valuenombreactividad,
                    confirmado:confirmoactividadvalue
                },
                beforeSend: function () {
                    document.getElementById("btnguardar").disabled=true;
                    document.getElementById("btnguardar").className = "btn btn-primary kt-spinner kt-spinner--right kt-spinner--md kt-spinner--light";
                },
                success:  function (response) {
                    alertify.set('notifier','position', 'botton-right');
                    alertify.success('<strong>¡Actividad Agregada!</strong>');
                    $("#kt_modal_4").modal("hide");
                    setInterval(function(){
                        location.reload();
                    },900)
                    document.getElementById("btnguardar").disabled=false;
                },
                error: function(xhr, status, err) {
                    alertify.set('notifier','position', 'botton-right');
                    alertify.error('<strong>Problemas con el servidor</strong>');
                }
            })
        }else{
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>No se aceptan campos vacios</strong>');
            document.getElementById("btnguardar").disabled=false;
        }
    }
}

function btneditactividad(){


    var valueeditfecha=document.getElementsByName("editfechaactividad")[0].value;
    var valueedittipoactividad=document.getElementsByName("iconselectactividadedit")[0].value;
    var valueedithora=$(".testhora").val();
    var valueeditduracion=document.getElementsByName("duracionactividadedit")[0].value;
    var valueeditnombreactividad=document.getElementsByName("nombre_actividad_edit")[0].value;
    var valueeditnombreempleado=document.getElementsByName("nombre_empleado_actividadeditar")[0].value;
    var valueeditnombrecliente=document.getElementsByName("nombre_clienteeditar")[0].value;
    var valueeditidactividad=document.getElementsByName("idactividadedit")[0].value;
    var valueusuario='<?php echo $id_empleado_actividad; ?>';
    
    if($("#editconfirmadoactividad").is(':checked')) {

        var valueconfirmadaactividad="Confirmada";

    }else{

        var valueconfirmadaactividad="No confirmada";

    }

    if (valueeditnombreactividad=="") {

        var textvalueeditnombreactividad=document.getElementById("nombre_actividad_edit").placeholder;
        valueeditnombreactividad=textvalueeditnombreactividad;
        
    }

    let fecha = valueeditfecha.split("/");
    let hora;
    if(valueedithora.includes("PM") && !valueedithora.includes(12)){
        hora = valueedithora.substring(0,5);
        hora = hora.split(":");
        hora[0]= (parseInt(hora[0])+12).toString();
    }else{
        hora = valueedithora.substring(0,5);
        hora = hora.split(":");
    }
    let iday= fecha[1];
    let imonth = fecha[0];
    let iyear = fecha[2];
    let ihour = hora[0];
    let iminutes = hora[1];
    let iseconds = 00;

    inicio = new Date(iyear, imonth-1, iday, ihour, iminutes, iseconds);
    final = moment(inicio).add(valueeditduracion, 'm').toDate();

    let fday = final.getDate();
    let fmonth = final.getMonth()+1;
    let fyear = final.getFullYear();
    let fhour = final.getHours();
    let fminutes = final.getMinutes();
    let fseconds = final.getSeconds();

    let srecord = iyear+"-"+imonth+"-"+iday+" "+ihour+":"+iminutes+":"+iseconds;
    let frecord = fyear+"-"+fmonth+"-"+fday+" "+fhour+":"+fminutes+":"+fseconds;

    $.ajax({                        
        type: "POST",                 
        url: "funciones/editactividades.php",     
        data:{
            idtipoactividad:valueedittipoactividad,
            fechainicial: srecord,
            fechafinal: frecord,
            idcliente:valueeditnombrecliente,
            idempleado:valueeditnombreempleado,
            idusuario:valueusuario,
            nombreactividad:valueeditnombreactividad,
            id_actividad:valueeditidactividad,
            confirmada:valueconfirmadaactividad
        },
        beforeSend: function () {
            document.getElementById("editbtnguardar").disabled=true;
            document.getElementById("editbtnguardar").className = "btn btn-primary kt-spinner kt-spinner--right kt-spinner--md kt-spinner--light";
        },
        success:  function (response) {
            document.getElementById("btnguardar").disabled=false;
            alertify.set('notifier','position', 'botton-right');
            alertify.success('<strong>¡Actividad Actualizada!</strong>');
            $("#modaleditactividad").modal("hide");
            setInterval(function(){
                location.reload();
            },900)
        },
        error: function(xhr, status, err) {
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>Problemas con el servidor</strong>');
            document.getElementById("editbtnguardar").disabled=false;
        }
    })

}

function btncompletadoactividad(datos){

    d=datos.split('||');

    $.ajax({                        
        type: "POST",                 
        url: "funciones/completaractividad.php",     
        data:{id_actividad:d[5],id_cliente:d[0]},
        beforeSend: function () {
        },

        success:  function (response) {

            if (response!="Hay otra actividad") {

                modaladdactiviti(response);
                alertify.set('notifier','position', 'botton-right');
                alertify.success('<strong>¡Actividad Completada!</strong>');
                setInterval(function(n){
                    $("#"+d[5]).css("display","none");
                },700)

                $("#kt_modal_4").modal("show");

            }else{

                alertify.set('notifier','position', 'botton-right');
                alertify.success('<strong>¡Actividad Completada!</strong>');
                setInterval(function(n){
                    $("#"+d[5]).css("display","none");
                },700)
            }
        },

        error: function(xhr, status, err) {
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>Problemas con el servidor</strong>');
        }
    })
}
function confiactividad(id_actividad){
    d=id_actividad.split('||');
    const actividad=d[5];
    var confirmaractividad;
    if($("#"+d[5]+"confirmar").is(':checked')) {  
     confirmaractividad="Confirmada";
     updateconfirmado(confirmaractividad, actividad);
 }else{  
    confirmaractividad="No confirmada";
    updateconfirmado(confirmaractividad, actividad);
}
function updateconfirmado(confirmaractividad, actividad){
    $.ajax({                        
        type: "POST",                 
        url: "funciones/confirmaractividad.php",     
        data:{confirmado:confirmaractividad,id_actividad:actividad},
        success:  function (response) {
            alertify.set('notifier','position', 'botton-right');
            alertify.success('<strong>¡Actividad '+confirmaractividad+'!</strong>');
        },
        error: function(xhr, status, err) {
            alertify.set('notifier','position', 'botton-right');
            alertify.error('<strong>Problemas con el servidor</strong>');
        }
    })  
}  
}
