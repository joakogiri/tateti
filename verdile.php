<?php
// cargo 7 juegos de ejemplo en el array para poder usar en la funcion
$arrayDeEjemplo = [
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "f" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "a" , "jugadorCirculo" => "c" , "puntosCruz" => 2, "puntosCirculo" => 0],
["jugadorCruz" => "e" , "jugadorCirculo" => "c" , "puntosCruz" => 0, "puntosCirculo" => 2],
["jugadorCruz" => "a" , "jugadorCirculo" => "b" , "puntosCruz" => 2, "puntosCirculo" => 1],
["jugadorCruz" => "b" , "jugadorCirculo" => "a" , "puntosCruz" => 1, "puntosCirculo" => 1],
["jugadorCruz" => "b" , "jugadorCirculo" => "d" , "puntosCruz" => 1, "puntosCirculo" => 1],
];


// Punto 5)

//empieza la función
//@param array $coleccionJuegos
function resumenJugador($coleccionJuegos) { 
//inicializo las variables
    $n = count ($coleccionJuegos);
    $i = 0;
    $flag = true;
    $puntosGanar = 0;
    $puntosPerder = 0;
    $puntosEmpatar = 0;
    $puntosTotal = 0;
  
   echo "ingrese nombre de jugador \n";
   $nombreJugador = trim(fgets(STDIN));
  // estructura repetitiva que se ejecuta cuando la cantidad de juegos sea mayor a 0
   for ($i = 0; $i < $n; $i++) {
  //estructura del tipo si que evalua coincidencias en el nombre del jugador con el registro de juegos y asigna un contador por cada resultado posible
  //se les agrega un contador para aumentar el valor con el que se comparan la cantidad de juegos y usarlo de stop
    if ($nombreJugador == $coleccionJuegos[$i]["jugadorCruz"] || $nombreJugador == $coleccionJuegos[$i]["jugadorCirculo"]) {
       
      if ($nombreJugador == $coleccionJuegos[$i]["jugadorCruz"]) {

        if ($coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"]) {
   
           $puntosGanar++;
           $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCruz"];
   
        } elseif ($coleccionJuegos[$i]["puntosCruz"] == $coleccionJuegos[$i]["puntosCirculo"]) {
   
           $puntosEmpatar++;
           $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCruz"];
   
        } else {
   
           $puntosPerder++;
   
        }
   
      } elseif ($nombreJugador == $coleccionJuegos[$i]["jugadorCirculo"]) {
   
        if ($coleccionJuegos[$i]["puntosCirculo"] > $coleccionJuegos[$i]["puntosCruz"]) {
   
          $puntosGanar++;
          $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCirculo"];
   
        } elseif ($coleccionJuegos[$i]["puntosCirculo"] == $coleccionJuegos[$i]["puntosCruz"]) {
   
          $puntosEmpatar++;
          $puntosTotal = $puntosTotal + $coleccionJuegos[$i]["puntosCirculo"];
   
        } else {
   
          $puntosPerder++;
          
        }
   
      }
    }

  }
  // se crea un array para almacenar el nombre y el registro de juegos del jugador
  $nombreJugador = array(
    "nombre" => $nombreJugador,
    "juegosGanados" => $puntosGanar,
    "juegosPerdidos" => $puntosPerder,
    "juegosEmpatados" => $puntosEmpatar,
    "puntosAcumulados" => $puntosTotal,
  );
  //retorno el nombre del jugador en cuestion.
  return $nombreJugador;
}
                


//var_dump(resumenJugador($arrayDeEjemplo));


// ------------------------------------------
// Punto 6)

function ordenadoPorO($coleccionDeJuegos) {

  function cmp($a, $b) {

    return strcmp($a['jugadorCruz'], $b['jugadorCirculo']);
}

  uasort($coleccionDeJuegos, 'cmp');
  print_r($coleccionDeJuegos);
}

ordenadoPorO($arrayDeEjemplo);

//echo $arrayDeEjemplo[2]["jugadorCirculo"];
