<?php
session_start();
include "conf.php";
include "modelos/Provincia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
Provincia::eliminar($_GET["proid"]);
?>

<a href="provincias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia eliminada correctamente</button></a>