<?php 
include('conexion.php');
session_start();
$username = $_SESSION['login_user'];

$ses_sql = mysqli_query($conexion,"SELECT username FROM usuarios WHERE 'username' = '$username'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];

if(empty($_SESSION['login_user'])){
	header("Location: index.php");
}
?>