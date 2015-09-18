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
           <li><a href="../dibujo-2d/">Visualizar 2D</a></li>
           <li><a href="../formulario-3d/ ">Dibujar 3D</a></li>
           <li  class="active"><a href="../dibujo-3d/">Visualizar 3D</a></li>
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
ArrayList<Forma> formas;
Forma ultimaForma=null;
boolean creandoforma=false;
 
void setup() {
size(screen.width, screen.height, P3D); 
  formas=new ArrayList<Forma>();
  leePHP();
}

void draw() {
   dibujaFormas();  
}

void leePHP() {
  formas=new ArrayList<Forma>();
 println("Presiona Z para borrar todo.");
 println("Presiona S para generar la imágen de tu dibujo.");
 println("Presiona espacio para actualizar el dibujo.");
 println("");
  String[] lineas_texto=loadStrings(URLSERVIDOR+"leer-3d.php");
  for (int i=0;i<lineas_texto.length;i++) {
    String lineatexto=lineas_texto[i];
    println(lineatexto);
    String[] valores=split(lineatexto," ");
    String tipoforma=valores[0];
    String med=valores[1];
    int x=int(valores[2]);
    int y=int(valores[3]);
    int z=int(valores[4]);
    float rotx=float(valores[5]);
    float roty=float(valores[6]);
    float rotz=float(valores[7]);
    int trax=int(valores[8]);
    int tray=int(valores[9]);
    color col=unhex(valores[10]);
    Forma nuevaForma=new Forma(tipoforma,med,x,y,z,rotx,roty,rotz,trax,tray,col);
    formas.add(nuevaForma);
  }
  dibujaFormas();
}

 
void borraTodo() {
  String url=URLSERVIDOR+"borrar-3d.php";
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
  String med;
  int x;
  int y;
  int z;
  float rotx;
  float roty;
  float rotz;
  int trax;
  int tray;
  color col;
  
  Forma (String tipo, String med, int x, int y, int z, float rotx,float roty,float rotz, int trax, int tray, color col) {
    this.x=x;
    this.y=y;
    this.z=z;
    this.rotx=rotx;
    this.roty=roty;
    this.rotz=rotz;
    this.trax=trax;
    this.tray=tray;
    this.tipo=tipo;
    this.med=med;
    this.col=col;
  }
  
  void dibuja() {
    fill(col, 70);
    stroke(col, 255);
    lights ();
translate(trax, tray, 0);
rotateX(rotx);
rotateY(roty);
rotateZ(rotz);


 if (tipo.equals("esfera")) {
    sphere(x);
    }else
    if (tipo.equals("cubo")) {
    box(x);
    }
 
   else if(tipo.equals("rectangulo")){
   box(x,y,z);
   }
  else if(tipo.equals("triangulo")){
beginShape(TRIANGLES); // front face
vertex(x, y, 0);
vertex(-x, y, 0);
vertex(0, 0, 0);
endShape(CLOSE);
 
beginShape(TRIANGLES); // right face
vertex(x, y, 0);
vertex(0, y, z);
vertex(0, 0, 0);
endShape(CLOSE);
 
beginShape(TRIANGLES); // back face
vertex(-x, y, 0);
vertex(0, y, z);
vertex(0, 0, 0);
endShape(CLOSE);
   }

   else if(tipo.equals("piramide")){
 
beginShape(TRIANGLES); // front face
vertex(-x, y, z);
vertex(x, y, z);
vertex(0, -y, 0);
endShape(CLOSE);
 
beginShape(TRIANGLES); // right face
vertex(x, y, z);
vertex(x, y, -z);
vertex(0, -y, 0);
endShape(CLOSE);
 
beginShape(TRIANGLES); // back face
vertex(x, y, -z);
vertex(-x, y, -z);
vertex(0, -y, 0);
endShape(CLOSE);
 
beginShape(TRIANGLES); // left face
vertex(-x, y, -z);
vertex(-x, y, z);
vertex(0, -y, 0);
endShape(CLOSE);
   }
  }
}
</script><canvas style="margin-top: 70px;" width="screen.width" height="screen.height "></canvas>
<?php require_once 'templates/sidebar.php';?>
<?php require_once 'templates/footer.php';?>