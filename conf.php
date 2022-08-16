<?php
$contraseña = "root";
$usuario = "postgres";
$nombreBaseDeDatos = "SW_Escolar";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "localhost";
$puerto = "5432";
try {
    //Coneccion
    $conn = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexion correcta";
    
    //SQL solo en minisculas
    //Select
    /*$sentencia = $conn->query("select * from provincias");
    $provincias = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($provincias as $provincia){        
        echo $provincia ->proid;
        echo $provincia ->pronombre;
    }

    //Select condicional
    $sql = $conn->query("Select * from provincias where proid=1");
    
    $provinciaId= $sql -> fetch(PDO::FETCH_OBJ);
    echo $provinciaId ->proid;
    echo $provinciaId ->pronombre;*/

    } catch (Exception $e) {
    
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>
