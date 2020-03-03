<?php
    include("conexion.php");
    //Fetching Values from URL
    $nombre=$_POST['nombre'];
    $passwordU=$_POST['contraseña'];
    $rol = $_POST['rol'];
    $id_empleado = $_POST['id_empleado'];

    //Insert query
    $query = "INSERT INTO usuarios (id_usuario, username, password, rol, id_empleado) VALUES (NULL, '$nombre', '$passwordU', '$rol', '$id_empleado');";
    $resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
    if($resultado){
        echo $resultado;
    }
?>