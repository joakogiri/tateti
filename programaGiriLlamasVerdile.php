<?php 
include "tateti.php";

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... Verdile Marcos FAI 3184 - TUDW - marcosverdile@gmail.com - github: @NightFawkes...*/
/* ... Giri Joaquín FAI 3538 - TUDW - joaquin.giri@est.fi.uncoma.edu.ar - github: @joakogiri ...*/
/* ... Llamas Yamila  - FAI-1925 - mail:yamila.llamas@est.fi.uncoma.edu.ar - github: yamillalu...*/



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * (PUNTO 1)
 * Función que carga una serie de 10 juegos al array de juegos
 * @return array
 */
function cargarJuegos()
{
    $arrayJuegos = [
        ["jugadorCruz" => "majo", "jugadorCirculo" => "pepe", "puntosCruz" => 5, "puntosCirculo" => 0],
        ["jugadorCruz" => "juan", "jugadorCirculo" => "brisa", "puntosCruz" => 1, "puntosCirculo" => 1],
        ["jugadorCruz" => "ana", "jugadorCirculo" => "lisa", "puntosCruz" => 1, "puntosCirculo" => 1],
        ["jugadorCruz" => "brisa", "jugadorCirculo" => "pepe", "puntosCruz" => 3, "puntosCirculo" => 0],
        ["jugadorCruz" => "brisa", "jugadorCirculo" => "majo", "puntosCruz" => 0, "puntosCirculo" => 1],
        ["jugadorCruz" => "ana", "jugadorCirculo" => "brisa", "puntosCruz" => 2, "puntosCirculo" => 1],
        ["jugadorCruz" => "majo", "jugadorCirculo" => "sebastian", "puntosCruz" => 0, "puntosCirculo" => 3],
        ["jugadorCruz" => "sebastian", "jugadorCirculo" => "majo", "puntosCruz" => 1, "puntosCirculo" => 1],
        ["jugadorCruz" => "sebastian", "jugadorCirculo" => "lisa", "puntosCruz" => 0, "puntosCirculo" => 1],
        ["jugadorCruz" => "sebastian", "jugadorCirculo" => "brisa", "puntosCruz" => 0, "puntosCirculo" => 5]
    ];

    for ($i = 0; $i < count($arrayJuegos); $i++) {

        $arrayJuegos[$i]["jugadorCruz"] = strtoupper($arrayJuegos[$i]["jugadorCruz"]);
        $arrayJuegos[$i]["jugadorCirculo"] = strtoupper($arrayJuegos[$i]["jugadorCirculo"]);
        
    }

    $CAMBIAR_POR_NOMBRE_COLECCION = [];

    $jg1 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg2 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "AMARILIS", "puntosCruz" => 3, "puntosCirculo" => 0];
    $jg3 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "MILOS",    "puntosCruz" => 0, "puntosCirculo" => 4];
    $jg4 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg5 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 5, "puntosCirculo" => 0];
    $jg6 = ["jugadorCruz" => "FEDORA",   "jugadorCirculo" => "CALIXTO",  "puntosCruz" => 0, "puntosCirculo" => 3];
    $jg7 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "AMARILIS", "puntosCruz" => 4, "puntosCirculo" => 0];
    $jg8 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg9 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "FEDORA",   "puntosCruz" => 2, "puntosCirculo" => 0];
    $jg10= ["jugadorCruz" => "MILOS",    "jugadorCirculo" => "ZENDA",   "puntosCruz" => 1, "puntosCirculo" => 1];

    array_push($CAMBIAR_POR_NOMBRE_COLECCION, $jg1, $jg2, $jg3, $jg4, $jg5, $jg6, $jg7, $jg8, $jg9, $jg10);


    return $CAMBIAR_POR_NOMBRE_COLECCION;
}


/**
 * (PUNTO 2)
 * funcion que se encarga de:
 * - mostrar el menu general del juego.
 * - leer un valor de teclado y verificar si este es un valor valido para el manu.
 * @return int 
 */
function seleccionarOpcion()
{
    // mostrando el menu
    echo "Menú de opciones:\n";
    echo "   1) Jugar al tateti\n";
    echo "   2) Mostrar un juego\n";
    echo "   3) Mostrar el primer juego ganador\n";
    echo "   4) Mostrar porcentaje de Juegos ganados\n";
    echo "   5) Mostrar resumen de Jugador\n";
    echo "   6) Mostrar listado de juegos Ordenado por jugador O\n";
    echo "   7) Salir\n";

    // obteniendo un valor valido de las opciones del menu
    $numero = obtenerNumeroValidoMenu();
    return $numero;
}

/** (PUNTO 3)
 * Obtiene un numero valido entre 1 y 7 para el menu general.
 * @return int
 */
function obtenerNumeroValidoMenu()
{
    $valor = 0;
    $isValid = false;
    //ciclo iteractivo que se repetira hasta que el usuario ingrese un valor valido
    do
    {
        echo "ingrese un numero: ";
        $valor = trim(fgets(STDIN));
        //se verifica si el valor ingresado es un numero 
        $isNumber = is_numeric($valor);
        if ($isNumber)
        {
            $valor = (int) $valor;

            if ($valor >= 1 && $valor <= 7)
            {
                //$isValid = true;
                return $valor;
            }
            else
            {
                echo "la opcion a elegir debe estar ser entre 1 y 7 inclusive.\n";
                $isValid = true;
            }
        }
        else
        {
            echo "El valor ingresado no es un numero.\n";
            $isValid = true;
        }
    } while ($isValid);

    //return $valor;
}

/** (PUNTO 4)
 *  Función que busca un juego determinado en el array de juegos en base al número que provea el usuario
 *  Y lo imprime en pantalla
 * @param array $juegosColeccion
*/
function mostrarJuego($juegosColeccion, $nroJuego) {
   


    if ($juegosColeccion[($nroJuego)]["puntosCruz"] > $juegosColeccion[($nroJuego)]["puntosCirculo"] ) {
    
        $resultado = "gana X";

    } elseif ($juegosColeccion[($nroJuego )]["puntosCruz"] < $juegosColeccion[($nroJuego )]["puntosCirculo"]) {

        $resultado = "gana O";

    } else {

        $resultado = "empate";

    }

    echo "**********************\n";
    echo "Juego TATETI: ".($nroJuego + 1)." (".$resultado.")\n";
    echo "Jugador X: ".$juegosColeccion[(($nroJuego))]["jugadorCruz"]." obtuvo ".$juegosColeccion[(($nroJuego))]["puntosCruz"]." puntos\n";
    echo "Jugador O: ".$juegosColeccion[(($nroJuego))]["jugadorCirculo"]." obtuvo ".$juegosColeccion[(($nroJuego))]["puntosCirculo"]." puntos\n";
    echo "**********************\n";

    
}


/** (PUNTO 5)
* Agrega un juego a la colección y retorna la colección modificada
* @param array $datosJuego
* @param array $arrayDondeGuardar
* @return array
*/
function agregarJuego($datosJuego, $arrayDondeGuardar) {

    $n = count($arrayDondeGuardar);
    
    $arrayDondeGuardar[$n] = $datosJuego;

    return $arrayDondeGuardar;
}

/** (PUNTO 6) 
 * Mostrar primer juego ganador de un jugador determinado
 * Funcion que se encarga de buscar entre el array de juegos la primera partida ganada del jugador
 * @param string $nombreJugador
 * @param array $arrayJuegos
 * @return int
 */

function indicePrimerJuegoGanador($nombreJugador, $arrayJuegos) {
   
    //$i < count($arrayJuegos)
    $n = count ($arrayJuegos);
    $j = 0;
    $i = 0;
    $flag = true;
    
    do {
        if ($nombreJugador == $arrayJuegos[$i]["jugadorCruz"] && $arrayJuegos[$i]["puntosCruz"] > $arrayJuegos[$i]["puntosCirculo"]) {
            $j=$i;
            $flag = false;
            
         } 
        elseif ($nombreJugador == $arrayJuegos[$i]["jugadorCirculo"] && $arrayJuegos[$i]["puntosCruz"] < $arrayJuegos[$i]["puntosCirculo"]) {
            $j=$i;
            $flag = false;
        }
         else{$j= -1;}
        $i++;
    }
    while ($flag == true);
    return $j;

}

/** (PUNTO 7)
 * Función que genera y guarda el resumen de un jugador
 * @param array $arrayDatosJuegos
 * @return array
 */
function resumenJugador($juegosArray) { 
    //inicializo las variables
        $n = count ($juegosArray);
        $i = 0;
        $flag = true;
        $puntosGanar = 0;
        $puntosPerder = 0;
        $puntosEmpatar = 0;
        $puntosTotal = 0;
      
       echo "ingrese nombre de jugador \n";
       $nombreJugador = strtoupper(trim(fgets(STDIN)));
      // estructura repetitiva que se ejecuta cuando la cantidad de juegos sea mayor a 0
       for ($i = 0; $i < $n; $i++) {
      //estructura del tipo si que evalua coincidencias en el nombre del jugador con el registro de juegos y asigna un contador por cada resultado posible
      //se les agrega un contador para aumentar el valor con el que se comparan la cantidad de juegos y usarlo de stop
        if ($nombreJugador == $juegosArray[$i]["jugadorCruz"] || $nombreJugador == $juegosArray[$i]["jugadorCirculo"]) {
           
          if ($nombreJugador == $juegosArray[$i]["jugadorCruz"]) {
    
            if ($juegosArray[$i]["puntosCruz"] > $juegosArray[$i]["puntosCirculo"]) {
       
               $puntosGanar++;
               $puntosTotal = $puntosTotal + $juegosArray[$i]["puntosCruz"];
       
            } elseif ($juegosArray[$i]["puntosCruz"] == $juegosArray[$i]["puntosCirculo"]) {
       
               $puntosEmpatar++;
               $puntosTotal = $puntosTotal + $juegosArray[$i]["puntosCruz"];
       
            } else {
       
               $puntosPerder++;
       
            }
       
          } elseif ($nombreJugador == $juegosArray[$i]["jugadorCirculo"]) {
       
            if ($juegosArray[$i]["puntosCirculo"] > $juegosArray[$i]["puntosCruz"]) {
       
              $puntosGanar++;
              $puntosTotal = $puntosTotal + $juegosArray[$i]["puntosCirculo"];
       
            } elseif ($juegosArray[$i]["puntosCirculo"] == $juegosArray[$i]["puntosCruz"]) {
       
              $puntosEmpatar++;
              $puntosTotal = $puntosTotal + $juegosArray[$i]["puntosCirculo"];
       
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


/** (PUNTO 8)
 * función que solicita símbolo X o O al usuario
 *  @return string
 */

 function solicitarSimbolo() {

    echo "Ingresar símbolo (X/O): ";
    $flag = true;

    do {
        
        $simb = trim(fgets(STDIN));

        if (strtoupper($simb) == 'X' || strtoupper($simb) == 'O') {
            return strtoupper($simb);
            $flag = false;

        } else {
            echo "Los símbolos válidos son X y O: ";
        }
    } while ($flag);

    
 }

/** (PUNTO 9) Retornar cantidad de juegos ganados
 *  calcula la totalidad de juegos ganados que hay en el array de juegos
 * @param array $arrayConJuegos
 * @return int
*/

function cantidadJuegosGanados($arrayConJuegos) {
    $contadorTotal = 0;

    for ($i = 0; $i < count($arrayConJuegos); $i++) {
        if ($arrayConJuegos[$i]["puntosCruz"] > $arrayConJuegos[$i]["puntosCirculo"] || $arrayConJuegos[$i]["puntosCruz"] < $arrayConJuegos[$i]["puntosCirculo"]) {
            $contadorTotal++;
        }
    }

    return $contadorTotal;
}


/** (PUNTO 10) mostrar cuantos juegos ganó el símbolo elegido
 * @param string $simbolo
 * @param array $arrayJuegos
 * @return int
 */

function juegosGanadosPorSimbolo($simbolo, $arrayJuegos) {

    $contadorX = 0;
    $contadorO = 0;    

    // Loop definido que agrega unidades a los contadores según si el juego tiene un ganador y que símbolo es
    for ($i = 0; $i < count($arrayJuegos); $i++) {

        if($arrayJuegos[$i]["puntosCruz"] > $arrayJuegos[$i]["puntosCirculo"]) {
            $contadorX++;

        } elseif ($arrayJuegos[$i]["puntosCruz"] < $arrayJuegos[$i]["puntosCirculo"]) {

            $contadorO++;
        }
    }
    
    // Evaluación del símbolo
    if ($simbolo == "X") {

        return $contadorX;

    } elseif ($simbolo == "O") {

        return $contadorO;
    }
}

/** (PUNTO 11)
 * Compara los strings en las claves "jugadorCirculo" de cada array
 * @param array $coleccionDeJuegos
*/
function ordenadoPorO($coleccionDeJuegos) {

    
  
    uasort($coleccionDeJuegos, 'cmp');
    print_r($coleccionDeJuegos);
  }
  
  function cmp($a, $b) {
  
    return strcmp($a['jugadorCirculo'], $b['jugadorCirculo']);
  }
/** 
 *se les asigna un numero a los elementos del array para ser ordenados (-1 , 0 y 1)
 * posteriormente la funcion compara los valores de a 2 y modifica su orden de forma creciente
 *se retorna el nuevo orden de los elementos , esto solo se visualiza en el print_r ya que no se modifica el array en si
 */


/** 12)
 *  a-
*/

$coleccionJuegos = cargarJuegos();

/** 12)
 * b- y c-
 */

do {

    $opcion = seleccionarOpcion();


    if ($opcion == 1) {

        $jugarJuego = jugar();

        imprimirResultado($jugarJuego);

        $coleccionJuegos = agregarJuego($jugarJuego, $coleccionJuegos);

    }


    elseif ($opcion == 2) {

        echo "Número de juego a mostrar: ";
        $flag = true;


    // Este loop va a funcionar de forma indefinida mientras el número de juego NO sea válido.
     do {

        $numeroJuego = trim(fgets(STDIN)) - 1;

        if (is_numeric($numeroJuego) && $numeroJuego >= 0 && $numeroJuego <= count($coleccionJuegos)) {

            mostrarJuego($coleccionJuegos, $numeroJuego);

            
            $flag = false;

        } else {
            echo "Debes ingresar un número válido: ";
        }
        
        } while ($flag);
        

    }


    elseif ($opcion == 3) {
        echo "Introduce nombre de jugador: \n";
        $nombreJugador = strtoupper(strval(trim(fgets(STDIN))));
        $indice = indicePrimerJuegoGanador($nombreJugador, $coleccionJuegos);


        mostrarJuego($coleccionJuegos, $indice);
        /*
        if($indice == -1) {

            echo "El jugador ".$nombreJugador." no ha ganado ningún juego.\n";

        } else {
            
            if ($coleccionJuegos[$indice]["jugadorCruz"] == $nombreJugador) {
        
                $simboloJugador = "X";
        
            } else {
        
                $simboloJugador = "O";
            }
            
            echo "**********************\n";
            echo "Juego TATETI: " .($indice + 1)." (ganó ".$simboloJugador.")\n";
            echo "Jugador X: " .$coleccionJuegos[$indice]["jugadorCruz"]." obtuvo ".$coleccionJuegos[$indice]["puntosCruz"]." puntos\n";
            echo "Jugador X: " .$coleccionJuegos[$indice]["jugadorCirculo"]." obtuvo ".$coleccionJuegos[$indice]["puntosCirculo"]." puntos\n";
            echo "**********************\n";
            
        }*/
    }

        


    elseif ($opcion == 4) {
        
        $simbolo = solicitarSimbolo();

        $juegosGanadosTotal = cantidadJuegosGanados($coleccionJuegos);

        $ganadosPorSimbolo = juegosGanadosPorSimbolo($simbolo, $coleccionJuegos);

        $promedio = round($ganadosPorSimbolo * 100 / $juegosGanadosTotal, 2);

        echo "**********************\n";
        echo $simbolo." ganó el ".$promedio."% de los juegos ganados.\n";
        echo "**********************\n";
    }


    elseif ($opcion == 5) { 
        $resumen = resumenJugador($coleccionJuegos);
        
        echo "**********************\n";
        echo "Jugador: ".$resumen["nombre"]."\n";
        echo "Ganó: ".$resumen["juegosGanados"]." juegos\n";
        echo "Perdió: ".$resumen["juegosPerdidos"]." juegos\n";
        echo "Empató: ".$resumen["juegosEmpatados"]." juegos\n";
        echo "Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos\n";
        echo "**********************\n";
    }


    elseif ($opcion == 6) {
        ordenadoPorO($coleccionJuegos);
    }

    elseif ($opcion == 7) {
        echo "Gracias por jugar!";
    }

} while ($opcion != 7);



/** 12) 
 *  d-

 SWITCH
La sentencia switch tiene un funcionamiento similar a una sucesión de sentencias IF.
La ventaja de switch sobre if es que nos permite comparar la misma variable o expresión con muchos
valores diferentes si necesidad de escribir de nuevo la sentencia por cada valor a comprara.

Ejemplo de IF:
if ($i = 1) {
    echo "1";
} elseif ($i = 2) {
    echo "2";
} elseif ($i = 3) {
    echo "3";
}

Mismo caso en SWITCH
switch ($i) {
    case 1:
        echo "1";
        break;
    case 2:
        echo "2";
        break;
    case 3:
        echo "3";
        break;
}
""break;" sirve para cortar la continuidad del código dada la evaluación. De otra forma, al momento de ser $i = 2, se ejecutaria el caso 2 y luego el caso 3 dado que no hay nada que impida que el código se continúe leyendo y ejecutando.

Esta estructura de control es de tipo alternativa.

*/


