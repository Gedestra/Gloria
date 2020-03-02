$(document).ready(function(){
    $("#bttnSaveEmp").click(function(){
        var nombre = $("#nombre1").val();
        var apellido = $("#apellido").val();
        var correo = $("#kt_inputmask_9").val();
        var telefono = $("#kt_inputmask_3").val();
        var sexo = $("input[name='sexo']").val();
        var fecha_nacimiento= $("#kt_inputmask_1").val();
        var pruebaFechaNac = nuevaFecha(fecha_nacimiento);
        var fechacorrecta1 = validarFecha(pruebaFechaNac);
        var escolaridad = $("#escolaridadChoose").val();
        var estado_civil = $("input[name='estado_civil']").val();
        var hijos = $("#hijos").val();
        var fecha_ingreso = $("#kt_datepicker_4_1").val();
        // var pruebaFechaIng = nuevaFecha(fecha_ingreso);
         var fechacorrecta2 = validarAño(fecha_ingreso);
        var numero_imss = $("#IMSS").val();
        var curp = $("#curpEmp").val();
        var rfc = $("#rfcEmp").val();
        var sucursal = $("#sucursalEmp").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'nombre='+ nombre + '&apellidos='+ apellido + '&correo='+ correo + '&telefono='+ telefono + 
        '&sexo='+ sexo + '&fecha_nacimiento='+ pruebaFechaNac + 'escolaridad='+ escolaridad + '&estado_civil='+ estado_civil + 
        '&hijos='+ hijos + '&fecha_ingreso='+ fecha_ingreso + '&numero_IMSS='+ numero_imss + '&curp='+ curp + 
        '&rfc='+ rfc + '&sucursal='+ sucursal;
        if(!fechacorrecta1){
            alert("La fecha de nacimiento introducida es invalida");
        }
        else if(!fechacorrecta2){
            alert("La fecha de ingreso introducida es invalida");
        }else{
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "funciones/addempleados.php",
                data: dataString,
                cache: false,
                success: function(result){
                    alert(result);
                    location.reload();
                }
            });
        }
        return false;
    });

    $("#submitEdit").click(function(){
        var nombre = $("#upnombre").val();
        var direccion = $("#updireccion").val();
        var status = $('input:checkbox[name=estatus]:checked').val();
        var id = $("#upid").val();
                
        if (status === "activo"){
            var dataString = 'id_sucursal='+id + '&nombre='+ nombre + '&direccion='+ direccion + '&estatus='+ status;
        }else{
            var dataString = 'id_sucursal='+id + '&nombre='+ nombre + '&direccion='+ direccion + '&estatus=' + "nuller";
        }
        
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "funciones/updateempleado.php",
            data: dataString,
            success: function(result){
                alert("Datos actualizados correctamente");
                location.reload();
            }
        });
        
        return false;
    });
});


function validarAño(dateString){
    var parts = dateString.split("-");
    var year = parseInt(parts[2], 10);
    var today = new Date();
    var yearNow = today.getFullYear();
    if(year<yearNow - 50){
        return false;
    }
    return year>(yearNow - 50);
}

function validarFecha(dateString){
    // convertir los numeros a enteros
    var parts = dateString.split("/");
    var year = parseInt(parts[2], 10);
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    // Revisar los rangos de año y mes
    var today = new Date();
    var yearNow = today.getFullYear();
    if( (year < yearNow-100) || (year > yearNow) || (month == 0) || (month > 12) )
        return false;
    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
    // Ajustar para los años bisiestos
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;
    // Revisar el rango del dia
    return day > 0 && day <= monthLength[month - 1];
};

function nuevaFecha(fecha_nacimiento){
    fecha_nacimiento2 = fecha_nacimiento.split('');
    var fecha_nacimiento3 = fecha_nacimiento.split('');
    fecha_nacimiento2[2] = '/';
    for(var i = 3; i < 9; i++){
        fecha_nacimiento2[i] = fecha_nacimiento3[i-1];
    }
    fecha_nacimiento2[5] = '/';
    for(var i = 6; i < 10; i++){
        fecha_nacimiento2[i] = fecha_nacimiento3[i-2];
    }
    return fecha_nacimiento2.join("");
};