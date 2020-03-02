function validarFecha(dateString){
    // convertir los numeros a enteros
    var parts = dateString.split("/");
    var year = parseInt(parts[2], 10);
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    console.log(month, day, year);
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

$(document).ready(function(){
    $("#btnagregar").click(function(){
        var nombre = $("input[name='nombre1']").val();
        var apellido = $("input[name='apellido']").val();
        var correo = $("input[name='correo']").val();
        var telefono = $("input[name='telefono']").val();
        var sexo = $("input[name='sexo']").val();
        var fecha_nacimiento = $("input[name='fecha_nacimiento']").val();
        var pruebaFechaNac = nuevaFecha(fecha_nacimiento);
        var fechacorrecta = validarFecha(pruebaFechaNac);
        var ocupacion = $("input[name='ocupacion']").val();
        var direccion = $("input[name='direccion']").val();
        var estado = $("#addestado").val();
        var pais = $("#addpais").val();
        var municipio = $("#addmunicipio").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'nombre='+ nombre + '&apellido='+ apellido + '&correo='+ correo + '&telefono='+ telefono 
        + '&sexo='+ sexo + '&fecha_nacimiento='+ pruebaFechaNac + '&ocupacion='+ ocupacion + '&direccion='+ direccion
        + '&estado='+ estado + '&pais='+ pais + '&municipio='+ municipio;
        if(nombre==''||correo==''||telefono==''||apellido=='')
        {
            alert("Please Fill All Fields");
        }else if(!fechacorrecta){
            alert("La fecha introducida es incorrecta");
        }
        else
        {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "funciones/addclientes.php",
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

    $("#btneditar").click(function(){
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var correo = $("#correo").val();
        var telefono = $("#telefono").val();
        var ocupacion = $("#ocupacion").val();
        var direccion = $("#colonia").val();
        var estado = $("#estado").val();
        var pais = $("#uppais").val();
        var municipio = $("#municipio").val();
        var id = $("#id_cliente").val();
        console.log("HOLA");        
        var dataString = 'nombre='+ nombre + '&apellido='+ apellido + '&correo='+ correo + '&telefono='+ telefono + '&ocupacion='+ ocupacion + '&direccion='+ direccion
        + '&estado='+ estado + '&pais='+ pais + '&municipio='+ municipio + '&id_cliente='+ id;
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "funciones/updatecliente.php",
            data: dataString,
            success: function(result){
                alert("Datos actualizados correctamente");
                location.reload();
            }
        });
        console.log("Adios");
        return false;
    });
});

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



// $conexion->query("SET NAMES 'utf8'");
// $nombre=$_POST['nombre'];
// $apellido=$_POST['apellido'];
// $correo=$_POST['correo'];
// $telefono=$_POST['telefono'];
// $sexo=$_POST['sexo'];
// $fecha_nacimiento=Date_create($_POST['fecha_nacimiento']);
// $new_date = Date_format($fecha_nacimiento, "Y-m-d");
// $ocupacion=$_POST['ocupacion'];
// $direccion=$_POST['direccion'];
// $estado=$_POST['estado'];
// $pais=$_POST['pais'];
// $municipio=$_POST['municipio'];