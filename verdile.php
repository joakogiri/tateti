<?php

$coleccionJuegos = [
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 0, "puntosCirculo" => 2],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 1],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 1, "puntosCirculo" => 1],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 1, "puntosCirculo" => 1],
];


$n = count ($coleccionJuegos);
$i = 0;
$flag = true;
$cruzWin = 0;
$circuloWin= 0;
$cruzLose = 0;
$circuloLose= 0;
$cruzDraw = 0;
$puntosTotal = 0;
$puntosCirculo = 0;

echo "menu de opciones 1 , 2 , 3 , 4 , 5";
echo "\n";
echo "que submenu desea solicitar?";
echo "\n";
$menuDeseado = trim(fgets(STDIN));
if ($menuDeseado == "5")
 { 
   echo "ingrese nombre de jugador \n";
   $nombreJugador = trim(fgets(STDIN));
   //$nombreJugador = strtoupper ($nombreJugador);
   while ($i < $n and $flag == true ) {
       if ($nombreJugador == $coleccionJuegos[$i]["jugadorCruz"]) {
          if ($coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"]) {
          
           $cruzWin++;
           $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCruz"];
           $i++;
           
           
       }   
       elseif ($nombreJugador == $coleccionJuegos[$i]["jugadorCruz"]) {
        if ($coleccionJuegos[$i]["puntosCruz"] == $coleccionJuegos[$i]["puntosCirculo"]) {
          
          $cruzDraw++;
          $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCruz"];
          $i++;
          
         
        }
       else {
                $cruzLose++;
                $i++;
              }    

   } 
   }
   elseif ($nombreJugador == $coleccionJuegos[$i]["jugadorCirculo"]) {
        if ($coleccionJuegos[$i]["puntosCruz"] < $coleccionJuegos[$i]["puntosCirculo"]) {
        
           $cruzWin++;
           $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCirculo"];
           $i++;
           
       
         }
         elseif ($nombreJugador == $coleccionJuegos[$i]["jugadorCirculo"]) {
          if ($coleccionJuegos[$i]["puntosCruz"] == $coleccionJuegos[$i]["puntosCirculo"]) {
            
            $cruzDraw++;
            $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCirculo"];
            $i++;
            
            }
         else {
             $cruzLose++;
             $i++;
             
         }
         }
   

        
   }
   
   echo "Jugador ", $nombreJugador ," " ,"gano ", $cruzWin." "."juegos\n";
   echo "Jugador ", $nombreJugador ," " ,"perdio ", $cruzLose." "."juegos\n";
   echo "Jugador ", $nombreJugador ," " ,"empato ", $cruzDraw." "."juegos\n";
   echo "Jugador ", $nombreJugador ," " ,"puntos ", $puntosTotal." "."puntos\n";
   }





}

else 
{echo "cagaste mi loco, aun no implementamos esa funcion jeje";}


    
                


