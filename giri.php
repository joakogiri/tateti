<?php
include 'tateti.php';

// Colleccion de ejemplo para probar funciones
$coleccionDeJuegos = [
    ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 5, "puntosCirculo" => 0], ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 1, "puntosCirculo" => 4],["jugadorCruz" => "c", "jugadorCirculo" => "a", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "b", "jugadorCirculo" => "c", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "d", "jugadorCirculo" => "a", "puntosCruz" => 1, "puntosCirculo" => 1]
];


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


echo "ingrese nombre de jugador \n";
$nJ = trim(fgets(STDIN));
echo indicePrimerJuegoGanador($nJ, $coleccionDeJuegos);


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
    
    $promX = $contadorX * 100 / $contadorTotal;
    $promO = $contadorO * 100 / $contadorTotal;
    
    if ($simbolo == "X") {
        echo "Juegos totales con ganador: ".$contadorTotal."\n";
        echo "El promedio de X fue de $promX% \n";
    } else if ($simbolo == "O") {
        echo "Juegos totales con ganador: ".$contadorTotal."\n";
        echo "El promedio de O fue de $promO%\n";
    }
}


echo "Ingresar símbolo: \n";
$simb = trim(fgets(STDIN));
porcentajeJuegosGanados($simb, $coleccionDeJuegos);