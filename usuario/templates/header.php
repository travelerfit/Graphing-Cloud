<?php 
ob_start();
session_start();
require_once '../config.php'; 
if(!isset($_SESSION['logged_in'])){
  header('Location: ../../../entrar/');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Graficación en la nube es un proyecto escolar que utiliza la computación en la nube (Cloud computing) y, ésta a su vez, la graficación en 2D y 3D. Gracias a la computación en la nube, aplicada a la graficación se puede generar contenido multimedia e interactivo, alcanzando así un grado de innovación.">
<meta name="author" content="Graficacion en la nube">
<meta name="googlebot" content="NOODP">
<meta name="robots" content="NOODP">
<meta name="keyword" content="Cloud, Computing, Graficacion, Nube, Gratis, Graficas, Facil, Processing, Dibujos, 2D, 3D, GCI, Quienes, Somos, Nosotros, ITSM, ISC">
<link rel="shortcut icon" href="../assets/img/icono.png">
<title>Graficación en la nube</title>
<link rel="alternate" hreflang="es-MX" href="https://www.graficacionenlanube.com/usuario/inicio/"/>
    <!-- css -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/animations.css" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">

  <!--JavaScript -->
   <script src="../assets/js/jquery.min.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/css3-animate-it.js"></script>
    <script src="../assets/js/jquery.js"></script>
</head>
<body>
  