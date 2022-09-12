<?php
session_start();
include "conf.php";
include "modelos/rMatriculacion.php";
require_once('layouts/layout.php');
$usuid = $_POST["usuid"];
$perid = $_POST["perid"];
$curid = $_POST["curid"];
$rmatestado="Matriculado";
$matricula = new rMatriculacion($perid, $usuid, $curid, $rmatestado);
$matricula->guardar();
?>

<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="rmatriculas.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Usuario matriculado correctamente</button></a>
    </div>    
</div>