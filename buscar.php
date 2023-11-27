<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// PRE: el scritp debe recibir al menos un argumento de tipo string

$nombre = $argv[1];
$fp = fopen("users.txt", "r");
$largoNombre = strlen($nombre);
$pos = 0;
$esta = false;

//Mueve el puntero de archivo a la siguiente linea
function sigLinea ($fp) {
    while ($c !== "\n") {
        $c = fgetc($fp);
    }
}

$c = fgetc($fp);
$seguir = true;
while ($seguir) {
    if ($c !== false) {
        if ($pos != $largoNombre) {
            if ($c == $nombre[$pos]) {
                $pos++;
                $c = fgetc($fp);
            } else {
                avanzar($fp);
                $pos = 0;
                $c = fgetc($fp);
            }
        } else {
            if ($c == "\n") {
                $esta = true;
                $seguir = false;
            } else {
                avanzar($fp);
                $pos = 0;
                $c = fgetc($fp);
            }
        }
    } else {
        $seguir = false;
    }
}

if ($esta) {
    echo "el jugador esta en el registro";
} else {
    echo "el jugador no esta en el registro";
}

fclose($fp);
?>
