<?php
    include("conexion.php");
    $empleados = array();
    //$query = "SELECT s.nombre as nombre_sucursal, e.nombre as nombre_cliente, e.correo  FROM empleados AS e INNER JOIN sucursales AS s ON e.id_sucursal = s.id_sucursal ";
    $query = "SELECT 
        e.nombre as nombre_empleado,
        e.apellidos as apellido,
        e.correo as correo,
        e.telefono as telefono,
        s.nombre as nombre_sucursal,
        e.estatus as estatus
        FROM empleados AS e
        INNER JOIN sucursales AS s
        ON e.id_sucursal = s.id_sucursal
        ";
    $resultado = $conexion->query($query);
    while($res = $resultado->fetch_assoc()){
      $row = array(
            $res['nombre_empleado'],
            $res['correo'],
            $res['telefono'],
            $res['nombre_sucursal'],
            $res['estatus']
        );
        array_push($empleados, $row);
    }

    echo json_encode($empleados);
?>