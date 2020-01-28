<?php


// ESTAS CREDENCIALES LAS TIENES QUE CAMBIAR POR LAS DE TU LOCALHOST QUEDARIA EL TUYO ASI $conexion = new mysqli("localhost","root","","crm"); 
$conexion = new mysqli("localhost","root","","crm");

if ($conexion) {
	//echo "conectado";
}else{
	echo "conexion fallida";
}

?>