<?php
session_start();
include "conf.php";
include "modelos/Paralelo.php";
require_once('layouts/layout.php');
$parnombre = $_POST["parnombre"];
$paralelo = new Paralelo($parnombre);
$paralelo->guardar();
?>

<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="paralelos.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Paralelo agregado correctamente</button></a>
    </div>
    
</div>