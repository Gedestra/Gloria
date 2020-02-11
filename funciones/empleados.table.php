<?php
    include("conexion.php");
    $conexion->query("SET NAMES 'utf8'");
    $empleados = array();
    //$query = "SELECT s.nombre as nombre_sucursal, e.nombre as nombre_cliente, e.correo  FROM empleados AS e INNER JOIN sucursales AS s ON e.id_sucursal = s.id_sucursal ";
    $query = "SELECT 
        e.id_empleado as id,
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
          $nombre_empleado = $res['nombre_empleado'],
          $apellido = $res['apellido'],
          $correo = $res['correo'],
          $telefono = $res['telefono'],
          $sucursal = $res['nombre_sucursal'],
          $estatus = $res['estatus'],
          $id = $res['id']
      );

      //echo $res['apellido'];

      array_push($empleados, $row);
    }

    echo json_encode($empleados);
?>