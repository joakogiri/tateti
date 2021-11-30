<?php
include 'tateti.php';

// Colleccion de ejemplo para probar funciones
$coleccionDeJuegos = [
    ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 5, "puntosCirculo" => 0], ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 1, "puntosCirculo" => 4],["jugadorCruz" => "c", "jugadorCirculo" => "a", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "b", "jugadorCirculo" => "c", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "d", "jugadorCirculo" => "a", "puntosCruz" => 1, "puntosCirculo" => 1]
];

/** 3) Mostrar primer juego ganador de un jugador determinado
 * Funcion que se encarga de buscar entre el array de juegos la primera partida ganada del jugador
 * @param string $nombreJugador
 * @param array $arrayJuegos
 * @return int $i
 */

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

echo "ingrese nombre de jugador \n";
$nJ = trim(fgets(STDIN));
echo indicePrimerJuegoGanador($nJ, $coleccionDeJuegos);


/** 4) mostrar porcentaje de juegos ganados
 * funcion que se encarga de mostrar el porcentaje de juegos ganados según símbolo (X o O)
 * @param string $simbolo
 * @param array $arrayJuegos
 */

function porcentajeJuegosGanados($simbolo, $arrayJuegos) {

    $contadorTotal = 0;
    $contadorX = 0;
    $contadorO = 0;
    

    // Loop definido que agrega unidades a los contadores según si el juego tiene un ganador y que símbolo es
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
    
    // Calculo de promedios
    $promX = $contadorX * 100 / $contadorTotal;
    $promO = $contadorO * 100 / $contadorTotal;
    
    // Determinar que información mostrar
    if (strtoupper($simbolo) == "X") {
        echo "Juegos totales con ganador: ".$contadorTotal."\n";
        echo "El promedio de X fue de $promX% \n";
    } else if (strtoupper($simbolo) == "O") {
        echo "Juegos totales con ganador: ".$contadorTotal."\n";
        echo "El promedio de O fue de $promO%\n";
    } else {
        echo "Este símbolo no existe. Debes introducir X o O";
    }
}

echo "Ingresar símbolo: \n";
$simb = trim(fgets(STDIN));
porcentajeJuegosGanados($simb, $coleccionDeJuegos);


/* SWITCH
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
break; sirve para cortar la continuidad del código dada la evaluación. De otra forma, al momento de ser $i = 2, se ejecutaria el caso 2 y luego el caso 3 dado que no hay nada que impida que el código se continúe leyendo y ejecutando.

Esta estructura de control es de tipo alternativa


*/