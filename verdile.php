<?php

$arrayDeEjemplo = [
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 0, "puntosCirculo" => 2],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 1],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 1, "puntosCirculo" => 1],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 1, "puntosCirculo" => 1],
];


// Punto 5)

function resumenJugador($coleccionJuegos) { 

    $n = count ($coleccionJuegos);
    $i = 0;
    $flag = true;
    $puntosGanar = 0;
    $puntosPerder = 0;
    $puntosEmpatar = 0;
    $puntosTotal = 0;

   echo "ingrese nombre de jugador \n";
   $nombreJugador = trim(fgets(STDIN));

   for ($i = 0; $i < $n; $i++) {

    if ($nombreJugador == $coleccionJuegos[$i]["jugadorCruz"] || $nombreJugador == $coleccionJuegos[$i]["jugadorCruz"]) {
        
   
      if ($nombreJugador == $coleccionJuegos[$i]["jugadorCruz"]) {

         if ($coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"]) {
        
          $puntosGanar++;
          $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCruz"];
          $i++;
          
          
        } elseif ($nombreJugador == $coleccionJuegos[$i]["jugadorCruz"]) {

          if ($coleccionJuegos[$i]["puntosCruz"] == $coleccionJuegos[$i]["puntosCirculo"]) {
           
            $puntosEmpatar++;
            $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCruz"];
            $i++;
           
           
          } else {

              $puntosPerder++;
              $i++;
              
            }    
              
        } 
      } elseif ($nombreJugador == $coleccionJuegos[$i]["jugadorCirculo"]) {

        if ($coleccionJuegos[$i]["puntosCruz"] < $coleccionJuegos[$i]["puntosCirculo"]) {
        
           $puntosGanar++;
           $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCirculo"];
           $i++;
        
        } elseif ($nombreJugador == $coleccionJuegos[$i]["jugadorCirculo"]) {

          if ($coleccionJuegos[$i]["puntosCruz"] == $coleccionJuegos[$i]["puntosCirculo"]) {
            $puntosEmpatar++;
            $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCirculo"];
            $i++;
            
          } else {
            
             $puntosPerder++;
             $i++;

            }

        }
        
      }

    }

  }

  $nombreJugador = array(
    "nombre" => $nombreJugador,
    "juegosGanados" => $puntosGanar,
    "juegosPerdidos" => $puntosPerder,
    "juegosEmpatados" => $puntosEmpatar,
    "puntosAcumulados" => $puntosTotal,
  );

  return $nombreJugador;
}
                


//var_dump(resumenJugador($arrayDeEjemplo));


// ------------------------------------------
// Punto 6)

function ordenadoPorO($coleccionDeJuegos) {

  function cmp($a, $b) {
    if($a['jugadorCirculo'] == $b['jugadorCruz']) {
        return 0;
    }
    return ($a['jugadorCirculo'] > $b['jugadorCruz']) ? -1 : 1;
}


  print_r(uasort($coleccionDeJuegos, 'cmp'));
}

ordenadoPorO($arrayDeEjemplo);