<?php

$contraseña = "root";
$usuario = "postgres";
$nombreBaseDeDatos = "SAC";
$rutaServidor = "localhost";
$puerto = "5432";
try {
    //Coneccion
    $conn = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexion correcta";
    } catch (Exception $e) {    
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>
