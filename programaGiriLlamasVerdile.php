<?php 
include "tateti.php";

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * (PUNTO 1)
 * Se generan 10 juegos resueltos de ejemplos.
 * @return array
 */
function cargarJuegos()
{
    $juegosEjemplos = [];

    $juegosEjemplos[0] = ["jugadorCruz" => "majo", "jugadorCirculo" => "pepe", "puntosCruz" => 5, "puntosCirculo" => 0];
    $juegosEjemplos[1] = ["jugadorCruz" => "juan", "jugadorCirculo" => "brisa", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosEjemplos[2] = ["jugadorCruz" => "ana", "jugadorCirculo" => "lisa", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosEjemplos[3] = ["jugadorCruz" => "brisa", "jugadorCirculo" => "pepe", "puntosCruz" => 3, "puntosCirculo" => 0];
    $juegosEjemplos[4] = ["jugadorCruz" => "brisa", "jugadorCirculo" => "majo", "puntosCruz" => 0, "puntosCirculo" => 1];
    $juegosEjemplos[5] = ["jugadorCruz" => "ana", "jugadorCirculo" => "brisa", "puntosCruz" => 2, "puntosCirculo" => 1];
    $juegosEjemplos[6] = ["jugadorCruz" => "majo", "jugadorCirculo" => "sebastian", "puntosCruz" => 0, "puntosCirculo" => 3];
    $juegosEjemplos[7] = ["jugadorCruz" => "sebastian", "jugadorCirculo" => "majo", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosEjemplos[8] = ["jugadorCruz" => "sebastian", "jugadorCirculo" => "lisa", "puntosCruz" => 0, "puntosCirculo" => 1];
    $juegosEjemplos[9] = ["jugadorCruz" => "sebastian", "jugadorCirculo" => "brisa", "puntosCruz" => 0, "puntosCirculo" => 5];
    
    return $juegosEjemplos;
}

// $juegosJugados[0] = ["jugadorCruz" => $jugarJuego["jugadorCruz"], "jugadorCirculo" => $jugarJuego["jugadorCirculo"]];


function inicializar() {
    $opcion = seleccionarOpcion();

    if ($opcion == 1) {
        $jugarJuego = jugar();
        imprimirResultado($jugarJuego);

        inicializar(); 
    }
    if ($opcion == 2) {
        echo "Funcion 2\n";

    }
    if ($opcion == 3) {
        echo "Introduce nombre de jugador: \n";
        $nombreJugador = trim(fgets(STDIN));
        echo indicePrimerJuegoGanador($nombreJugador, cargarJuegos());
        inicializar();
    }
    if ($opcion == 4) {        
        echo "Ingresar símbolo (X/O): ";
        $simb = trim(fgets(STDIN));
        porcentajeJuegosGanados($simb, cargarJuegos());
    }
    if ($opcion == 5) { 
        echo "funcion 5\n";
    }
    if ($opcion == 6) {
        echo "funcion 6\n";
    }
    if ($opcion == 7) {
        exit("Gracias por jugar!");
    }
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

/**
 * (PUNTO 3)
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

// 3) mostrar primer juego ganador de cierto jugador

function indicePrimerJuegoGanador($nombreJugador, $arrayJuegos) {
    $i = 0;
    
    while ($i < count($arrayJuegos)) {
        if ($nombreJugador == $arrayJuegos[$i]["jugadorCruz"] && $arrayJuegos[$i]["puntosCruz"] > $arrayJuegos[$i]["puntosCirculo"]) {
            return $i;
            
        } elseif ($nombreJugador == $arrayJuegos[$i]["jugadorCirculo"] && $arrayJuegos[$i]["puntosCruz"] < $arrayJuegos[$i]["puntosCirculo"]) {
            return $i;
        }
        $i++;
    }

    return -1;
}

// 4) mostrar porcentaje de juegos ganados

function porcentajeJuegosGanados($simbolo, $arrayJuegos) {

    $contadorTotal = 0;
    $contadorX = 0;
    $contadorO = 0;
    
    for ($i = 0; $i < count($arrayJuegos); $i++) {
        if ($arrayJuegos[$i]["puntosCruz"] > $arrayJuegos[$i]["puntosCirculo"] || $arrayJuegos[$i]["puntosCruz"] < $arrayJuegos[$i]["puntosCirculo"]) {
            $contadorTotal++;
            if($arrayJuegos[$i]["puntosCruz"] > $arrayJuegos[$i]["puntosCirculo"]) {
                $contadorX++;
            } else {
                $contadorO++;
            }
        }
    }
    
    $promX = round(($contadorX * 100 / $contadorTotal), 1);
    $promO = round(($contadorO * 100 / $contadorTotal), 1);
    
    if ($simbolo == "X") {
        echo "Juegos totales con ganador: ".$contadorTotal."\n";
        echo "El promedio de X fue de $promX% \n";
    } else if ($simbolo == "O") {
        echo "Juegos totales con ganador: ".$contadorTotal."\n";
        echo "El promedio de O fue de $promO%\n";
    }
}

inicializar();