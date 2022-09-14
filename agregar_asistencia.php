<?php
session_start();
include "conf.php";
include "modelos/RegistroAsistencia.php";
include "modelos/Asistencia.php";
require_once('layouts/layout.php');
$resasiid = $_GET["resasiid"];
$asifecha = $_GET["asifecha"];
$estasiid = $_GET["estasiid"];
$asiobservacion = $_GET["asiobservacion"];
$detmatid = $_GET["detmatid"];
$detalle= number_format($detmatid, 0); 
echo $detmatid; 


$asistencia = new RegistroAsistencia($estasiid, $resasiid,$asifecha,$asiobservacion);
$asistencia->guardar();
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="asistencia.php?detmatid=<?php echo  $_GET["detmatid"];  ?>" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Asistencia agregada correctamente</button></a>
    </div>
</div>