<?php
include 'tateti.php';

// Colleccion de ejemplo para probar funciones
$colleccionDeJuegos = [
    ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 5, "puntosCirculo" => 0], ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 1, "puntosCirculo" => 4],["jugadorCruz" => "c", "jugadorCirculo" => "a", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "b", "jugadorCirculo" => "c", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "d", "jugadorCirculo" => "a", "puntosCruz" => 1, "puntosCirculo" => 1]
];


// 3) mostrar primer juego ganador de cierto jugador

function primerJuegoGanador($nombreJugador, $colleccionDeJuegos) {
    $i = 0;
    
    while ($i < count($colleccionDeJuegos)) {
        if ($nombreJugador == $colleccionDeJuegos[$i]["jugadorCruz"] && $colleccionDeJuegos[$i]["puntosCruz"] > $colleccionDeJuegos[$i]["puntosCirculo"]) {
            return $i;
            
        } elseif ($nombreJugador == $colleccionDeJuegos[$i]["jugadorCirculo"] && $colleccionDeJuegos[$i]["puntosCruz"] < $colleccionDeJuegos[$i]["puntosCirculo"]) {
            return $i;
        }
        $i++;
    }

    return -1;
}


echo "ingrese nombre de jugador \n";
$nJ = trim(fgets(STDIN));
echo primerJuegoGanador($nJ, $colleccionDeJuegos);


// 4) mostrar porcentaje de juegos ganados

echo "Ingresar símbolo: \n";
$simb = trim(fgets(STDIN));

$contadorTotal = 0;
$contadorX = 0;
$contadorO = 0;

for ($i = 0; $i < count($colleccionDeJuegos); $i++) {
    if ($colleccionDeJuegos[$i]["puntosCruz"] > $colleccionDeJuegos[$i]["puntosCirculo"] || $colleccionDeJuegos[$i]["puntosCruz"] < $colleccionDeJuegos[$i]["puntosCirculo"]) {
        $contadorTotal++;
        if($colleccionDeJuegos[$i]["puntosCruz"] > $colleccionDeJuegos[$i]["puntosCirculo"]) {
            $contadorX++;
        } else {
            $contadorO++;
        }
    }
}

$promX = $contadorX * 100 / $contadorTotal;
$promO = $contadorO * 100 / $contadorTotal;

if ($simb == "X") {
    echo "Juegos totales con ganador: ".$contadorTotal."\n";
    echo "El promedio de X fue de $promX% \n";
} else if ($simb == "O") {
    echo "Juegos totales con ganador: ".$contadorTotal."\n";
    echo "El promedio de O fue de $promO%\n";
}