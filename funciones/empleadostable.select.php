<?php
    include("conexion.php");
    $sucursales = array();
    $query = "SELECT * FROM sucursales";
    $resultado = $conexion->query($query);
    while($res = $resultado->fetch_assoc()){
        array_push($sucursales, $res);
    }
    echo json_encode($sucursales);
    
?>