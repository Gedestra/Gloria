<?php
    include("conexion.php");
    $conexion->query("SET NAMES 'utf8'");
    $query = "SELECT 
    a.id_actividad              AS id_actividad,
    a.nombre_actividad          AS nombre_actividad,
    a.fecha_hora_inicio         AS fecha_inicio,
    a.fecha_hora_termino        AS fecha_termino,
    a.id_tipo_actividad         AS id_tipo_actividad,
    a.id_cliente                AS id_cliente,
    a.id_empleado               AS id_empleado,
    a.id_usuario                AS id_usuario,
    a.gcal_evento_id            AS gcal_evento_id,
    a.sincronizar_actividad     AS sincronizar_actividad,
    a.id_transaccion            AS id_transaccion,
    a.completado                AS completado,
    a.confirmado                AS confirmado,
    c.nombres                   AS nombre_cliente,
    c.apellidos                 AS apellido_cliente,
    e.nombre                    AS nombre_empleado,
    e.apellidos                 AS apellido_empleado,
    e.id_sucursal               AS id_sucursal,
    s.nombre                    AS nombre_sucursal,
    t.id_icon                   as id_icon,
    t.nombre_tipo_actividad     as nombre_tipo_actividad
    FROM actividades AS a
    INNER JOIN clientes AS c ON  a.id_cliente  = c.id_cliente
    INNER JOIN empleados AS e ON a.id_empleado = e.id_empleado
    INNER JOIN tipo_actividad AS t ON a.id_tipo_actividad = t.id_tipo_actividad
    INNER JOIN sucursales AS s ON s.id_sucursal = e.id_sucursal";
    $actividades = array();
    $resultado = $conexion->query($query);
    while($res = $resultado->fetch_assoc()){
        array_push($actividades, $res);
    }

    echo json_encode($actividades)
?> 