<?php
header("Location: index.html");
$nombre = $_POST["nombre"];
$fp = fopen("users.txt", "a");
fwrite($fp, $nombre."\n");
fclose($fp);
?>