<?php
include_once "conf.php";
include "modelos/Provincia.php";
$nombre=$_POST["proNombre"];
$provincia = new Provincia($nombre);
$provincia->guardar();
require_once('layouts/layout.php');
?>

<a href="provincias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia agregada correctamente</button></a>
