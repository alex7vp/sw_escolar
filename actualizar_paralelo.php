<?php
session_start();
include "conf.php";
    include "modelos/Paralelo.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $parnombres=$_POST["parnombres"];
    $parid= $_POST["parid"];
    $paraleloupdate = new Paralelo($_POST["parnombres"], $_POST["parid"]);
    $paraleloupdate->actualizar($parnombres, $parid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="paralelos.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Paralelo actualizado correctamente</button></a>
    </div>    
</div> 