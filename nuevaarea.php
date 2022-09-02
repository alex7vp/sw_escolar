<?php
session_start();
include "conf.php";
include "modelos/Area.php";
require_once('layouts/layout.php');
$nombre = $_POST["arenombre"];
$area = new Area($nombre);
$area->guardar();
?>

<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="areas.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Area de estudio agregada correctamente</button></a>
    </div>
    
</div>