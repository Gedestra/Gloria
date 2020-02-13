<?php
    include("conexion.php");
    $conexion->query("SET NAMES 'utf8'");
    $query = "SELECT * FROM empleados";
    $empleados = array();
    $resultado = $conexion->query($query);
    while($res = $resultado->fetch_assoc()){
        array_push($empleados, $res);
    }
    echo json_encode($empleados);
?>