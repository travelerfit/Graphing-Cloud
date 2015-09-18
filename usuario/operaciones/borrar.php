<?php
ob_start();
session_start();
require_once '../config.php'; 
if(!isset($_SESSION['logged_in'])){
  header('Location: ../../entrar/');
}
include_once '../conexion.php';
$u_act=$_SESSION['user_id'];
$query = mysqli_query($connection, "DELETE FROM 2D WHERE user_id ='$u_act'");
echo "BORRADO";
?>