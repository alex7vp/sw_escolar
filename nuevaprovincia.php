<?php
session_start();
include "conf.php";
include "modelos/Provincia.php";
require_once('layouts/layout.php');
$nombre = $_POST["proNombre"];
$provincia = new Provincia($nombre);
$provincia->guardar();
?>

<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="provincias.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia agregada correctamente</button></a>
    </div>
    
</div>