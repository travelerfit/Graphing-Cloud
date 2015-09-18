<?php
include_once '../db.php';
$mensaje=" "; 
if (isset($_POST['submit'])) {
$cas=$_POST['casilla'];  
$tipo=$_POST['seleccion'];  
$x1=$_POST['x1'];
$y1=$_POST['y1'];
$x2=$_POST['x2'];
$y2=$_POST['y2'];
$x3=$_POST['x3'];
$y3=$_POST['y3'];
$c=$_POST['favcolor'];
$col=substr($c, -6);
if($cas=="1"){
if($tipo=="triangulo"){
$query = $MySQLiconn->query("INSERT INTO invitado2d(tipo,medida,x1,y1,x2,y2,x3,y3,col) VALUES('$tipo','px','$x1','$y1','$x2','$y2','$x3','$y3','ff$col')");
$mensaje = '<div class="alert alert-success"><h4>¡Bien hecho!</h4 style="text-align : justify;">Tu figura ha sido agregada correctamente. <a href="../dibujo-2d/">
VISUALIZAR AQUÍ</a><button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}else {
$SQL = $MySQLiconn->query("INSERT INTO invitado2d(tipo,medida,x1,y1,x2,y2,x3,y3,col) VALUES('$tipo','px,'$x1','$y1','$x2','$y2','0','0','ff$col')");
$mensaje = '<div class="alert alert-success"><h4>¡Bien hecho!</h4 style="text-align : justify;">Tu figura ha sido agregada correctamente. <a href="../dibujo-2d/">
VISUALIZAR AQUÍ</a><button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}
}else{
if($tipo=="triangulo"){
$query = $MySQLiconn->query("INSERT INTO invitado2d(tipo,medida,x1,y1,x2,y2,x3,y3,col) VALUES('$tipo','cm','$x1','$y1','$x2','$y2','$x3','$y3','ff$col')");
$mensaje = '<div class="alert alert-success"><h4>¡Bien hecho!</h4 style="text-align : justify;">Tu figura ha sido agregada correctamente. <a href="../dibujo-2d/">
VISUALIZAR AQUÍ</a><button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}else {
$SQL = $MySQLiconn->query("INSERT INTO invitado2d(tipo,medida,x1,y1,x2,y2,x3,y3,col) VALUES('$tipo','cm','$x1','$y1','$x2','$y2','0','0','ff$col')");
$mensaje = '<div class="alert alert-success"><h4>¡Bien hecho!</h4 style="text-align : justify;">Tu figura ha sido agregada correctamente. <a href="../dibujo-2d/">
VISUALIZAR AQUÍ</a><button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}
}

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
<meta name="keyword" content="Cloud, Computing, Formulario, Graficacion, Nube, Gratis, Graficas, Facil, Processing, Dibujos, 2D, 3D, GCI, Quienes, Somos, Nosotros, ITSM, ISC">
<link rel="shortcut icon" href="../../usuario/assets/img/icono.png">
<title>Formulario 2D</title>
<link rel="alternate" hreflang="es-MX" href="https://www.graficacionenlanube.com/usuario/formulario-2d/"/>
 
<link href="../../usuario/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../../usuario/assets/css/animations.css" rel="stylesheet">
<link href="../../usuario/assets/css/style.css" rel="stylesheet">
<script src="../../usuario/assets/js/jquery.min.js"></script>
<script src="../../usuario/assets/js/bootstrap.min.js"></script>
<script src="../../usuario/assets/js/css3-animate-it.js"></script>
<script src="../../usuario/assets/js/jquery.js"></script>


</head>
<body>
<nav class="navbar navbar-inverse  navbar-fixed-top">
<div class="container">
<div class="navbar-header"style="margin-top: 17px;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul  style="margin-top:8px;"class="nav navbar-nav">
 
          <li><a href="../inicio/">Inicio</a></li>
           <li class="active"><a href="../formulario-2d/ ">Dibujar 2D</a></li>
           <li><a href="../dibujo-2d/">Visualizar  2D</a></li>
          <li><a href="../formulario-3d/ ">Dibujar 3D</a></li>
           <li><a href="../dibujo-3d/">Visualizar 3D</a></li>
          </ul>
          <ul style="margin-top:8px;"class="nav navbar-nav navbar-right">
            
           <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
           Más opciones
                                  <span class="caret"></span></a>
            
            <ul class="dropdown-menu" role="menu">
              <li><a href="../salir/">Cerrar sesión</a></li>
            </ul>
                      </li>

          </ul>
        </div> 
      </div>
    </nav>
<script type="text/javascript">
function mostrar(id) {
	if (id == "triangulo") {
		$("#tercer").show();
	}
	if (id == "linea") {
		$("#tercer").hide();
	}
	
	if (id == "rectangulo") {
		$("#tercer").hide();
	}
	
	if (id == "elipse") {
		$("#tercer").hide();
	}
}
</script>
<div id="login-page">
<div class="container">
<form style="margin-top: 120px; margin-bottom: 60px;"  action="" method="post" class="form-login login">	  	
<h2 style="font-family: 'Ruda', sans-serif;"  class="form-login-heading">Figura en 2D</h2>
<div class="login-wrap">
<?php echo $mensaje; ?>
<div class="alert alert-info" style="text-align : justify;">
   La resolución de tu pantalla es 
 <script language="JavaScript" type="text/javascript">
document.writeln(screen.width,'x',screen.height,'.')  
  </script>Recomendación: No utilices coordenadas negativas.
<button type="button" class="close" data-dismiss="alert">&times;</button></div>

<select  style="font-family: 'Ruda', sans-serif; font-size:13px;" id="seleccion" name="seleccion" class="form-control" onChange="mostrar(this.value);" autofocus>
        <option style="font-family: 'Ruda', sans-serif; font-size:13px;"  value="linea">Linea</option>
        <option style="font-family: 'Ruda', sans-serif; font-size:13px;"  value="elipse">Elipse</option>
        <option style="font-family: 'Ruda', sans-serif; font-size:13px;"  value="rectangulo">Cuadrado/Rectangulo</option>
         <option style="font-family: 'Ruda', sans-serif; font-size:13px;"  value="triangulo">Triangulo</option>
</select>

<label style="font-family: 'Ruda', sans-serif; font-size:13px; margin-top: 10px;">Unidad de medida <a  data-toggle="modal" data-target="#myModal">(?)</a></label>
<div>
<label class="radio-inline" style="font-family: 'Ruda', sans-serif; font-size:13px;" ><input type="radio" name="casilla" value="1" checked required>Píxel</label>
<label class="radio-inline" style="font-family: 'Ruda', sans-serif; font-size:13px;" ><input type="radio" name="casilla" value="2" required>Centimetro</label>
</div>


<label style="font-family: 'Ruda', sans-serif; font-size:13px; margin-top: 10px;">Primer extremo</label>
<input style="margin-top: 5px;" class="form-control" type="number" min="0" id="x1" name="x1" placeholder="x1" required>
<input style="margin-top: 10px;" class="form-control" type="number" min="0" id="y1" name="y1" placeholder="y1" required>

<label style="font-family: 'Ruda', sans-serif; font-size:13px; margin-top: 10px;">Segundo extremo</label>
<input style="margin-top: 5px;" class="form-control" type="number" min="0" id="x2" name="x2" placeholder="x2" required>
<input style="margin-top: 10px;" class="form-control" type="number" min="0" id="y2" name="y2" placeholder="y2" required>

<div id="tercer" class="element" style="display: none;">
<label style="font-family: 'Ruda', sans-serif; font-size:13px; margin-top: 10px;">Tercer extremo</label>
<input style="margin-top: 5px;" class="form-control" type="number" min="0" id="x3" name="x3" placeholder="x3">
<input style="margin-top: 10px;" class="form-control" type="number" min="0" id="y3" name="y3" placeholder="y3">
</div> 

<label style="font-family: 'Ruda', sans-serif; font-size:13px;  margin-top: 10px;">Selecciona un color</label>
<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getBrowser($user_agent){
if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'exp';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'exp';
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'no';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'no';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "no";
 elseif(strpos($user_agent, 'Opera') !== FALSE)
   return "no";
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "saf";
 else
   return 'no';
}
 
$navegador = getBrowser($user_agent);
if ($navegador=="exp") {
  echo '<select style="font-family: Ruda, sans-serif; font-size:13px;" style="margin-top: 5px;" id="favcolor" name="favcolor" class="form-control" >
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#1e90ff">Azul</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#ff0000">Rojo</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#008000">Verde</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#ffd700">Amarillo</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#ff4500">Anaranjado</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#483d8b">Morado</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#000000">Negro</option>
</select>';
}
if ($navegador=="saf") {
  echo '<select style="font-family: Ruda, sans-serif; font-size:13px;" style="margin-top: 5px;" id="favcolor" name="favcolor" class="form-control" >
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#1e90ff">Azul</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#ff0000">Rojo</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#008000">Verde</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#ffd700">Amarillo</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#ff4500">Anaranjado</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#483d8b">Morado</option>
        <option style="font-family: Ruda, sans-serif; font-size:13px;" value="#000000">Negro</option>
</select>';
}
if ($navegador=="no") {
echo '<input type="color" class="form-control" name="favcolor" id="favcolor" value="#ff0000">';
}
 
?>

<label class="checkbox">
<input style="font-family: 'Ruda', sans-serif;" class="btn btn-theme btn-block"  type="submit" id="submit" name="submit" value="Dibujar figura">
</div>
</form>
  	</div>
	  </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
               ¿Qué es un píxel?
            </h4>
         </div>
         <div class="modal-body" style="text-align : justify;">
          Un pixel es la menor unidad en color que forma parte de una imagen digital, ya sea una fotografía, un fotograma de vídeo o un gráfico. El pixel es la abreviatura de Picture Element, y se puede observar al ampliar una imagen digital. 
Los pixeles aparecen como pequeños cuadrados o rectángulos en color, en blanco y negro o en matices de gris. 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">Cerrar
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
   $(function () { $('#myModal').modal({
      keyboard: true
   })});
</script>
<script>
   $(function () { $('#myModal').modal({
      keyboard: true
   })});
</script>
     <script type="text/javascript" src="../../usuario/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../../usuario/assets/img/fondo.jpg", {speed: 400});
    </script>
 

</body>
</html>
	
