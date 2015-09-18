<?php 
include_once '../db.php';
$result = $MySQLiconn->query("SELECT * FROM invitado2d ");
$i=0;
while($row = mysqli_fetch_assoc($result)) {
if($i%2==0)
$classname="";
else
$classname="";
if(isset($classname)) echo $classname;
                                echo $row['tipo'];
                                echo " ";
                                $med = $row['medida'];
                                echo $med;
                                echo " ";
if ($med=="cm") {
                                $val = $row['x1'];
                                $conv=$val*37.795276;
                                $x1=round($conv);
                                echo $x1;
                                echo " "; 

                                $val = $row['y1'];
                                $conv=$val*37.795276;
                                $y1=round($conv);
                                echo $y1;
                                echo " "; 

                                $val = $row['x2'];
                                $conv=$val*37.795276;
                                $x2=round($conv);
                                echo $x2;
                                echo " "; 

                                $val = $row['y2'];
                                $conv=$val*37.795276;
                                $y2=round($conv);
                                echo $y2;
                                echo " ";

                                $val = $row['x3'];
                                $conv=$val*37.795276;
                                $x3=round($conv);
                                echo $x3;
                                echo " "; 

                                $val = $row['y3'];
                                $conv=$val*37.795276;
                                $y3=round($conv);
                                echo $y3;
                                echo " ";

}else{
                                echo $row['x1'];
                                echo " ";
                                echo $row['y1'];
                                echo " ";
                                echo $row['x2'];
                                echo " ";
                                echo $row['y2'];
                                echo " ";
                                echo $row['x3'];
                                echo " ";
                                echo $row['y3'];
                                echo " ";
}
                                
                                echo $row['col'];
                                echo " ";
                                echo "\n";
                      
$i++;
}
?>	