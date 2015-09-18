<?php 
include_once '../db.php';
$result = $MySQLiconn->query("SELECT * FROM invitado3d ");
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
                                $val = $row['x'];
                                $conv=$val*37.795276;
                                $x=round($conv);
                                echo $x;
                                echo " "; 
                                
                                $val = $row['y'];
                                $conv=$val*37.795276;
                                $y=round($conv);
                                echo $y;
                                echo " ";
                                
                                $val = $row['z'];
                                $conv=$val*37.795276;
                                $z=round($conv);
                                echo $z;
                                echo " ";

                                $val = $row['rotx'];
                                $conv=$val*37.795276;
                                $rotx=round($conv);
                                echo $rotx;
                                echo " ";

                                $val = $row['roty'];
                                $conv=$val*37.795276;
                                $roty=round($conv);
                                echo $roty;
                                echo " ";

                                $val = $row['rotz'];
                                $conv=$val*37.795276;
                                $rotz=round($conv);
                                echo $rotz;
                                echo " ";

                                $val = $row['trax'];
                                $conv=$val*37.795276;
                                $trax=round($conv);
                                echo $trax;
                                echo " ";

                                $val = $row['tray'];
                                $conv=$val*37.795276;
                                $tray=round($conv);
                                echo $tray;
                                echo " ";
                                }else{
                                echo $row['x'];
                                echo " ";
                                echo $row['y'];
                                echo " ";
                                echo $row['z'];
                                echo " ";
                                echo $row['rotx'];
                                echo " ";
                                echo $row['roty'];
                                echo " ";
                                echo $row['rotz'];
                                echo " ";
                                echo $row['trax'];
                                echo " ";
                                echo $row['tray'];
                                echo " ";
                                }
                                echo $row['col'];
                                echo " ";
                                echo "\n";               
$i++;
}
?>