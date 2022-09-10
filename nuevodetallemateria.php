<?php
session_start();
include "conf.php";
include "modelos/DetalleMateria.php";
require_once('layouts/layout.php');
$curid=$_POST["curid"];
$matid=$_POST["matid"];
$usuid=$_POST["usuid"];
$detmatcodigo=$_POST["detmatcodigo"];
$detallemateria = new DetalleMateria($curid,$matid,$usuid,$detmatcodigo);
$detallemateria->guardar();
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="detallematerias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Materia agregado correctamente al curso</button></a>
    </div>
    
</div>
