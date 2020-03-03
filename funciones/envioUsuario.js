$(document).ready(function(){
    $("#btnguardar").click(function(){
        var nombre = $("#nombreus").val();
        var password = $("#pasw").val();
        var confirmPass = $("#paswconf").val();
        var rol = $("#roluser").val();
        var id_empleado = $("#id_empleado").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'nombre='+ nombre + '&contraseña='+ password + '&confirmPass='+ confirmPass
        +'&rol='+ rol + '&id_empleado='+ id_empleado;
        // AJAX Code To Submit Form.
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "funciones/addusuario.php",
            data: dataString,
            cache: false,
            success: function(result){
                alert("El usuario ha sido agregado exitosamente");
                location.reload();
            }
        });
        return false;
    });

    $("#editbttn").click(function(){
        var nombre = $("#upusername").val();
        var rol = $("#uprol").val();
        var userid = $("#upid").val();

        var dataString = 'nombre='+ nombre + '&userid=' + userid + '&rol='+ rol;

        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "funciones/updateusuario.php",
            data: dataString,
            success: function(result){
                alert("Datos actualizados correctamente");
                location.reload();
            }
        });
        return false;
    });
});