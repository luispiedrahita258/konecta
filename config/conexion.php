<?php

$servidor = "localhost";
$usuario = "root";
$password = "";

try{
    $conexion = new PDO("mysql:host=$servidor;dbname=konecta", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion Realizada con exito";
}

catch (PDOException $e) {
    echo "La conexión ha fallado: ".$e->getMessage();
}


?>