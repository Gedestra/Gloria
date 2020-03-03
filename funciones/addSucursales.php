<?php
    include("funciones/session.php");
    $query="SELECT rol FROM usuarios WHERE username='$username'";
    $resultado = $conexion->query($query);
    $row=$resultado->fetch_assoc();
    $sesion=$row['rol']; 
    if ($sesion !='Administrador' && $sesion !='Empleado') {
        header("location: index.php");
    }
    //Fetching Values from URL
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];

    //Insert query
    $query = "INSERT INTO sucursales (id_sucursal, nombre, direccion, estatus) VALUES (NULL, '$nombre', '$direccion', 'Activo');";
    $resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
    mysql_close($connection);
?>