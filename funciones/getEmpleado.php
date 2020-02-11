<?php
  include('conexion.php');
  $conexion->query("SET NAMES 'utf8'");
  $id_empleado = $_GET['id_empleado'];
  $query = "SELECT
    e.id_empleado as id,
    e.id_sucursal as id_sucursal,
    e.nombre as nombre_empleado,
    e.apellidos as apellido,
    e.correo as  correo,
    e.telefono as telefono,
    e.sexo as sexo,
    e.fecha_nacimiento as fecha_nacimiento,
    e.escolaridad as escolaridad,
    e.estado_civil as estado_civil,
    e.numero_hijos as numero_hijos,
    e.fecha_ingreso as fecha_ingreso,
    e.numero_imss as numero_imss,
    e.curp as curp,
    e.rfc as rfc,
    e.puesto as puesto,
    e.estatus as estatus,
    s.nombre as nombre_sucursal
    FROM empleados AS e
    INNER JOIN sucursales AS s
    ON e.id_sucursal = s.id_sucursal
    WHERE id_empleado = $id_empleado
  ";
  $resultado = $conexion->query($query);
  while($res = $resultado->fetch_assoc()){            
      echo json_encode($res);
  }
?>