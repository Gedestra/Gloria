<?php
    include("conexion.php");

    $query = "SELECT * FROM sucursales";
    $sucursales = array();
    $respuesta = $conexion->query($query);
    while($sucursal = $respuesta->fetch_assoc()){
        array_push($sucursales, $sucursal);
    }
    echo json_encode($sucursales);

?>