<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$fp = fopen("users.txt", "r");
$nombre = $_POST["nombre"];
$max = strlen($nombre);
$pos = 0;
$esta = false;

function avanzar ($archivo) {
    $chr = fgetc($archivo);
    while ($chr != "\n") {
        $chr = fgetc($archivo);
    }
}

$c = fgetc($fp);
$seguir = true;
while ($seguir) {
    if ($c !== false) {
        if ($pos != $max) {
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