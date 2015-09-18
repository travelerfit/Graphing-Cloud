<?php 
ob_start();
session_start();
require_once '../usuario/config.php'; 
//initalize user class
$user_obj = new Cl_User();
/*******Google ******/
require_once '../usuario/Google/src/config.php';
require_once '../usuario/Google/src/Google_Client.php';
require_once '../usuario/Google/src/contrib/Google_PlusService.php';
require_once '../usuario/Google/src/contrib/Google_Oauth2Service.php'; 
 $client = new Google_Client();
$client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
$client->setApprovalPrompt('auto');

$plus       = new Google_PlusService($client);
$oauth2     = new Google_Oauth2Service($client);
//unset($_SESSION['access_token']);

if(isset($_GET['code'])) {
  $client->authenticate(); // Authenticate
  $_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if(isset($_SESSION['access_token'])) {
  $client->setAccessToken($_SESSION['access_token']);
}

if ($client->getAccessToken()) {
  $_SESSION['access_token'] = $client->getAccessToken();
  $user         = $oauth2->userinfo->get();
  try {
    $user_obj->google_login( $user );
  }catch (Exception $e) {
    $error = $e->getMessage();
  }
}  
/*******Google ******/
?>
<?php 
  if( !empty( $_POST )){
    try {
      
      $data = $user_obj->login( $_POST );
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
        header('Location: ../usuario/inicio/');
      }
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
  }
  //print_r($_SESSION);
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
    header('Location: ../usuario/inicio/');
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
<meta name="keyword" content="Cloud, Iniciar, Login, Sesión, Iniciar sesion, Entrar, Facebook, Google, Computing, Graficacion, Nube, Gratis, Graficas, Facil, Processing, Dibujos, 2D, 3D, GCI, Quienes, Somos, Nosotros, ITSM, ISC">
<link rel="shortcut icon" href="../assets/img/icono.png">
<title>Iniciar sesión</title>
<link rel="alternate" hreflang="es-MX" href="https://www.graficacionenlanube.com/entrar/"/>
    <!-- css -->
 
<link href="../assets/css/bootstrap.min.css" rel='stylesheet'>
<link href="../assets/css/bootstrap-social.css" rel='stylesheet' type='text/css' />
<link href="../assets/css/style.css" rel="stylesheet">
<link href="../assets/css/animations.css" rel="stylesheet">
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-inverse  navbar-fixed-top" >
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
            <li><a href="../../">Inicio</a></li>
            <li><a href="../nosotros/">Nosotros</a></li>
            <li><a href="../ayuda/">Ayúda</a></li>
           <li class="active"><a href="../entrar/">Iniciar sesión</a></li>
          </ul>
          <ul style="margin-top:8px;"class="nav navbar-nav navbar-right">
            <li><a href="../comentarios/">Comentarios</a></li>
          </ul>
        </div> 
        </div> 
      </div>
    </nav>

<section id="intro">
<?php require_once '../usuario/templates/ads.php';?>
<div class="container">
<div class="row"> 
<?php require_once '../usuario/templates/message.php';?>
<h1 align="center" style="margin-top:120px;"class="page-header">Iniciar sesión
</h1>
<div class="col-lg-4">
</div>

  <div align="center" style="margin-top:30px;" class="col-lg-4">
    <p>&nbsp;</p>

        <form id="login-form" method="post" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
           <div class="social-sizes">
            <p></p>
      <p>&nbsp;</p>           
             
            <a class="btn btn-block btn-social btn-lg btn-google-plus" href="<?php echo $client->createAuthUrl();?>">
              <i class="fa fa-google-plus"></i>
              Iniciar sesión con Google
            </a>
           
        </div>
      </form>

<a href="https://www.graficacionenlanube.com/invitado/inicio/">

 <button type="submit" style="margin-top:10px;" class="btn btn-primary btn-lg btn-block">Iniciar sesión como Invitado</button>
</a>
    </div>


<div class="col-lg-4">
</div>
</div>  

</section>
   <footer class="footer">
      <div align="center" class="container">
       <p>&copy; Todos los derechos reservados 2015.</p>
      </div>
    </footer>

  <!--JavaScript -->
   <script src="../assets/js/jquery.min.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/css3-animate-it.js"></script>
    <script src="../usuario/js/jquery.validate.min.js"></script>
    <script src="../usuario/js/login.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>