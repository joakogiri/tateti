<?php

$coleccionDeJuegos = [
    ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 5, "puntosCirculo" => 0], 
    ["jugadorCruz" => "a", "jugadorCirculo" => "b", "puntosCruz" => 1, "puntosCirculo" => 4],
    ["jugadorCruz" => "c", "jugadorCirculo" => "a", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "b", "jugadorCirculo" => "c", "puntosCruz" => 2, "puntosCirculo" => 1],
    ["jugadorCruz" => "d", "jugadorCirculo" => "a", "puntosCruz" => 1, "puntosCirculo" => 1]
];


function mostrarJuego($juegosColeccion) {

    echo "Número de juego a mostrar: ";
    $flag = true;

    do {

        $numeroJuego = trim(fgets(STDIN));

        if (is_numeric($numeroJuego) && $numeroJuego > 0 && $numeroJuego < count($juegosColeccion)) {

            if ($juegosColeccion[($numeroJuego - 1)]["puntosCruz"] > $juegosColeccion[($numeroJuego - 1)]["puntosCirculo"] ) {
    
                $resultado = "gana X";
        
            } elseif ($juegosColeccion[($numeroJuego - 1)]["puntosCruz"] < $juegosColeccion[($numeroJuego - 1)]["puntosCirculo"]) {
        
                $resultado = "gana O";
        
            } else {
        
                $resultado = "empate";
        
            }
        
            echo "**********************\n";
            echo "Juego TATETI: ".$numeroJuego." (".$resultado.")\n";
            echo "Jugador X: ".$juegosColeccion[(($numeroJuego - 1))]["jugadorCruz"]." obtuvo ".$juegosColeccion[(($numeroJuego - 1))]["puntosCruz"]." puntos\n";
            echo "Jugador O: ".$juegosColeccion[(($numeroJuego - 1))]["jugadorCirculo"]." obtuvo ".$juegosColeccion[(($numeroJuego - 1))]["puntosCirculo"]." puntos\n";
            echo "**********************\n";

            $flag = false;

        } else {
            echo "Debes ingresar un número válido: ";
        }
        
    } while ($flag);

    
}

mostrarJuego($coleccionDeJuegos);