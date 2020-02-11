async function updateEmployee(){
    let empleado = {
        id: $('#id_empleado').val(),
        nombre: $('#upnombre').val(),
        apellido: $('#upapellido').val(),
        correo: $('#upcorreo').val(),
        telefono: $('#uptelefono').val(),
        puesto: $('#uppuesto').val(),
        sucursal: $('#upsucursal').val(),
        estatus: $('#upestatus').is(':checked')
    }
    
    await $.ajax({
        type: 'POST',
        url : "funciones/updateempleado.php",
        data: JSON.stringify(empleado),
        success: res => {
            location.reload();
        }
    });
}