<?php
include_once "conf.php";
include "modelos/Provincia.php";
require_once('layouts/layout.php');
Provincia::eliminar($_GET["proid"]);
?>

<a href="provincias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia eliminada correctamente</button></a>