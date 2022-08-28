<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
Ciudad::eliminar($_GET["ciuid"]);
?>

<a href="ciudades.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Ciudad eliminada correctamente</button></a>