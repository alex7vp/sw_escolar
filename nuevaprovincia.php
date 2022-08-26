<?php
session_start();
include "conf.php";
include "modelos/Provincia.php";
require_once('layouts/layout.php');
$nombre=$_POST["proNombre"];
$provincia = new Provincia($nombre);
$provincia->guardar();
?>

<a href="provincias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia agregada correctamente</button></a>
