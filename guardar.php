<?php

//debo asegurarme de que el usuario no existe en users.txt

header("Location: index.html");
$nombre = argv[1];
$fp = fopen("users.txt", "a");
fwrite($fp, $nombre."\n");
fclose($fp);

if (mkdir("/users/{$nombre}/notas", 0777, true)) {
    //crear menu.html con javascript recibiendo $nombre como parametro, y tambien una nota de ejemplo.
} else {
    echo "Hubo un error al intentar crear el archivo.";
}


?>
