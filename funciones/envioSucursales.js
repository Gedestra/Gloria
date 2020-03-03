$(document).ready(function(){
    $("#bttonSubmit").click(function(){
        var nombre = $("input[name='nombre1']").val();
        var direccion = $("input[name='direccion']").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'nombre='+ nombre + '&direccion='+ direccion;
        if(nombre==''||direccion=='')
        {
            alert("Porfavor llene todos los campos");
        }
        else
        {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "funciones/addSucursales.php",
                data: dataString,
                cache: false,
                success: function(result){
                    alert("Sucursal registrada exitosamente");
                    location.reload();
                }
            });
        }
        location.reload();
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
        $.ajax({
            type: "POST",
            url: "funciones/updatesucursal.php",
            data: dataString,
            success: function(result){
                alert("Datos actualizados correctamente");
                location.reload();
            }
        });
        
        return false;
    });
});

