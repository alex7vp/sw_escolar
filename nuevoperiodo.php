<?php
session_start();
include "conf.php";
include "modelos/Periodo.php";
require_once('layouts/layout.php');
$pernombre = $_POST["pernombre"];
$periodo = new Periodo($pernombre);
$periodo->guardar();
?>

<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="periodos.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Periodo agregado correctamente</button></a>
    </div>
    
</div>