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
 
          <li><a href="../inicio/">Inicio</a></li>
           <li><a href="../formulario-2d/ ">Dibujar 2D</a></li>
           <li class="active"><a href="../dibujo-2d/">Visualizar 2D</a></li>
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

<script language="javascript" src="../assets/js/processing.js"></script>
<script type="application/processing">
String URLSERVIDOR="https://www.graficacionenlanube.com/usuario/operaciones/";
color colorActual=#000000;
String tipoFormaActual="rectangulo";
ArrayList <Forma> formas;
Forma ultimaForma=null;
boolean creandoforma=false;

void setup() {
size(screen.width-10, screen.height-220); 
  formas=new ArrayList<Forma>();
  background(255);
  leePHP();
 }

void draw() {
}

void leePHP() {
  formas=new ArrayList<Forma>();
  String[] lineas_texto=loadStrings(URLSERVIDOR+"leer.php");
 println("Presiona Z para borrar todo.");
 println("Presiona S para generar la imágen de tu dibujo.");
 println("Presiona espacio para actualizar el dibujo.");
 println("");
for (int i=0;i<lineas_texto.length;i++) {
    String lineatexto=lineas_texto[i];
    println(lineatexto);
    String[] valores=split(lineatexto," ");
    String tipoforma=valores[0];
    String medida=valores[1];
    int x1=int(valores[2]);
    int y1=int(valores[3]);
    int x2=int(valores[4]);
    int y2=int(valores[5]);
    int x3=int(valores[6]);
    int y3=int(valores[7]);
    color col=unhex(valores[8]);
    Forma nuevaForma=new Forma(tipoforma,medida,x1,y1,x2,y2,x3,y3,col);
    formas.add(nuevaForma);
  }
  dibujaFormas();
}

void borraTodo() {
  String url=URLSERVIDOR+"borrar.php";
  println("Enviando: "+url);
  String[] respuesta=loadStrings(url);
  println("Respuesta: "+respuesta[0]);
  leePHP();
}

void dibujaFormas() {
  background(255);
  for (int i=0;i<formas.size();i++) {
    formas.get(i).dibuja();
  }
} 

void keyPressed() {
  switch (key) {
    case ' ': leePHP(); break;
    case 'z': borraTodo(); break;
    case 's': guardar(); break;
    case 'Z': borraTodo(); break;
    case 'S': guardar(); break;
  }
} 
void guardar() { 
      save("img.png");
}

class Forma {
  String tipo;
  String medida;
  int x1;
  int y1;
  int x2;
  int y2;
  int x3;
  int y3;
  color col;
  
  Forma (String tipo,  String medida, int x1, int y1, int x2, int y2, int x3, int y3, color col) {
    this.x1=x1;
    this.y1=y1;
    this.x2=x2;
    this.y2=y2;
    this.x3=x3;
    this.y3=y3;
    this.tipo=tipo;
    this.medida=medida;
    this.col=col;
  }
  
  void dibuja() {
    fill(col, 80);
    stroke(col, 255);
    rectMode(CORNER);
    ellipseMode(CORNER);
    if (tipo.equals("rectangulo")) rect(x1,y1,x2-x1,y2-y1);
    else if (tipo.equals("elipse")) ellipse(x1,y1,x2-x1,y2-y1);
    else if (tipo.equals("linea")) line(x1,y1,x2,y2);
    else if (tipo.equals("triangulo")) triangle(x1,y1,x2,y2,x3,y3);    
  }
    
}
</script><canvas style="margin-top: 70px;" width="screen.width" height="screen.height "></canvas>
<?php require_once '../templates/sidebar.php';?>
<?php require_once '../templates/footer.php';?>
	