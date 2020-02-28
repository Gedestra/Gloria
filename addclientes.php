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
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $sexo=$_POST['sexo'];
    $fecha_nacimiento=date_create($_POST['fecha_nacimiento']);
    $new_date = date_format($fecha_nacimiento, "Y-m-d");
    $ocupacion=$_POST['ocupacion'];
    $direccion=$_POST['direccion'];
    $estado=$_POST['estado'];
    $pais=$_POST['pais'];
    $municipio=$_POST['municipio'];
    //Insert query
    if($fecha_nacimiento === "" ){
        $query = "INSERT INTO clientes(id_cliente, nombres, apellidos, correo, telefono, sexo, fecha_nacimiento, ocupacion, direccion, estado, municipio, estatus, pais) VALUES (NULL, '$nombre', '$apellido', '$correo', '$telefono', '$sexo', NULL, '$ocupacion', '$direccion', '$estado', '$municipio', 'Activo', '$pais');";
        $resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));

    }else{
        $query = "INSERT INTO clientes(id_cliente, nombres, apellidos, correo, telefono, sexo, fecha_nacimiento, ocupacion, direccion, estado, municipio, estatus, pais) VALUES (NULL, '$nombre', '$apellido', '$correo', '$telefono', '$sexo', '$new_date', '$ocupacion', '$direccion', '$estado', '$municipio', 'Activo', '$pais');";
        $resultado = $conexion->query($query) || die ("ha ocurrido un error no se guarda los datos".mysqli_error($conexion));
    }
    // if ($_GET['cliente']=='update') {
    // 	echo "<script>alertify.set('notifier','position', 'botton-right');
    // 	alertify.success('<strong>¡Cliente Actualizado!</strong>');</script>";
    // }else if($_GET['cliente']=='delete'){
    //   	echo "<script>alertify.set('notifier','position', 'botton-right');
    //   	alertify.error('<strong>Cliente Eliminado!</strong>');</script>";
    // } 
    
    echo "Form Submitted Succesfully";
    //mysql_close($connection); // Connection Closed
    
?>