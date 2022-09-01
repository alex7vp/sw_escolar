<?php
session_start();
include "conf.php";
include "modelos/EstadoAsistencia.php";
require_once('layouts/layout.php');
$estasinombre = $_POST["estasinombre"];
$estado = new EstadoAsistencia($estasinombre);
$estado->guardar();
?>

<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="estadoasistencia.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Estado de Asistencia agregado correctamente</button></a>
    </div>    
</div>