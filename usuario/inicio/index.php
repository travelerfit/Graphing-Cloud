<?php require_once '../templates/header.php'; ?>
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
 
          <li class="active"><a href="../inicio/">Inicio</a></li>
           <li><a href="../formulario-2d/ ">Dibujar 2D</a></li>
           <li><a href="../dibujo-2d/">Visualizar 2D</a></li>
           <li><a href="../formulario-3d/ ">Dibujar 3D</a></li>
           <li><a href="../dibujo-3d/">Visualizar 3D</a></li>
          </ul>
          <ul style="margin-top:8px;"class="nav navbar-nav navbar-right">
            
           <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
           Más opciones
            <?php if($_SESSION['logged_in']) { ?>
           <span class="caret"></span></a>
            
            <ul class="dropdown-menu" role="menu">
              <li><a href="../salir/">Cerrar sesión</a></li>
            </ul>
            <?php } ?>
          </li>

          </ul>
        </div> 
      </div>
    </nav>

<section id="intro">
<div class="container">
<div class="row">
 <div class="col-lg-12">
<h1 align="center" style="margin-top:120px;"class="page-header">Bienvenido <?php echo $_SESSION['name']; ?>
</h1>
<p style="text-align : justify;">
Graficación en la nube funciona muy fácil solo incia sesión, y puedes comenzar a dibujar en 2D y 3D. Los datos introducidos en
el formulario son medidos en px. A continuacion puedes ver un pequeño tutorial de como usar el sitio.</p>
</div>

  <div style="margin-top:-150px;" class="col-lg-12">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
     <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="../../assets/slides/1.jpg" alt="...">
      <div class="carousel-caption">
          <h3 style="color: #000000;"></h3>
      </div>
    </div>
    <div class="item">
      <img src="../../assets/slides/2.jpg" alt="...">
      <div class="carousel-caption">
            
      </div>
    </div>
    <div class="item">
      <img src="../../assets/slides/3.jpg" alt="...">
      <div class="carousel-caption">
           
      </div>
    </div>
<div class="item">
      <img src="../../assets/slides/4.jpg" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
  <div class="item">
      <img src="../../assets/slides/5.jpg" alt="...">
      <div class="carousel-caption">
          
      </div>
    </div>


  </div>
</div> <!-- Carousel -->
</div>
<div style="margin-bottom:30px;" class="col-lg-12">
</div>

</div>  
<hr>
</div>
</section>
 
<?php require_once '../templates/sidebar.php';?>
 
<?php require_once '../templates/footer.php';?>
	
